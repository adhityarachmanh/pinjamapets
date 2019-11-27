<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;
use Session;
class AdminKategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {   
        $kategoris=Kategori::orderBy('created_at','DESC')->paginate();
        return view('admin.kategori.index',[
            'status'=>'kategori',
            'kategoris'=>$kategoris
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug=str_replace(' ','-',$request->nama);
        $deteksi=Kategori::where('nama','LIKE',"%$request->nama%")
        ->where('slug','LIKE',"%$slug%")->count();


        if($deteksi!=0)
        {
            Session::flash('gagal',"tidak dapat menambah $request->nama kategori sudah ada");
        }else{
        $kategori=new Kategori();
        $kategori->nama=$request->nama;
        $kategori->slug=$slug;
        $kategori->save();
        Session::flash('berhasil','kategori berhasil di tambah');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori=Kategori::findOrFail($id)->first();
        return view('admin.kategori.show',[
            'status'=>'kategori',
            'kategori'=>$kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->_method=="PATCH")
        {   
            $slug=str_replace(' ','-',$request->nama);
            $deteksi=Kategori::where('nama','LIKE',"%$request->nama%")
            ->where('slug','LIKE',"%$slug%")->count();
            if($deteksi!=0){
                Session::flash('gagal',"tidak dapat mengubah menjadi $request->nama kategori sudah ada");
            }else{
         
              $update=Kategori::findOrFail($id);
                $update->nama=$request->nama;
                $update->slug=$slug;
                $update->save();
                Session::flash('berhasil','Berhasil Mengedit Kategori');
               
            // return response($request);
            }
            return redirect()->back();
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)

    {
        // return response($request);
        if($request->_method=="DELETE")
        {
            $delete=Kategori::find($id);
            Session::flash('berhasil',"Kategori $delete->nama Berhasil Di Hapus");
            $delete->delete();
            return redirect()->back();
        }
    }
}
