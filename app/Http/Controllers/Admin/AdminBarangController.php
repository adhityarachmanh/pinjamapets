<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use storage;
use Session;
use App\Barang;
class AdminBarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }
    public function stockHabis(Request $request){
        $barangs=Barang::where('quantity',0)->paginate();
        return view('admin.barang.index',[
            'status'=>'stock habis',
            'barangs'=>$barangs
        ]);
    }
   
    public function store(Request $request)
    {
        // return response($request);
        $tambah=new Barang();
        if(
            !empty(
                $request->nama && 
                $request->merk &&
                $request->hasFile('gambar') &&
                $request->kategori &&
                $request->harga &&
                $request->stock 
             
                ) 
            
            )
        {
            $t=new Barang();
          
                if (!file_exists("images/items/$request->kategori/$request->merk/$t->id")) {
                    mkdir("images/items/$request->kategori/$request->merk/$t->id", 0777, true);
                }   
            //replace str spasi simbol menjadi -
            $slugs=preg_replace("/[^A-Za-z0-9?![:space:]]/","-",$request->nama);
            $slug=str_replace(' ','-',$slugs);
            $t->nama=$request->nama;
            $t->save();
            $gambar = $request->file('gambar');
            $nama_file = $slug.'.' .$gambar->getClientOriginalExtension();
            $lokasi = public_path("images/items/$request->kategori/$request->merk/$t->id",$nama_file);
            $gambar->move($lokasi,$nama_file);
            $t->gambar=$nama_file;
            
            $t->slug=$slug;
            $t->merk=$request->merk;
            $t->kategori=$request->kategori;
            $t->harga=str_replace('.','',$request->harga);
            $t->quantity=$request->stock;

            $t->save();
            Session::flash('berhasil',"Barang Di Tambah Kedalam Kategori $request->kategori");
            return redirect()->back();
        }else{
            Session::flash('gagal','Isi Data Dengan Lengkap');
            return redirect()->back();
        }
       
        
    }

   
    public function show($slug)
    {
        $barangs=Barang::where('kategori',$slug)->orderBy('created_at','DESC')->paginate();
        return view('admin.barang.index',[
            'status'=>$slug,
            'barangs'=>$barangs
        ]);
    }

    
    public function edit($id)
    {
        $barang=Barang::find($id);
        return view('admin.barang.edit',[
            'b'=>$barang,
            'status'=>'Deskripsi',
        ]);
    }

  
    public function update(Request $request, $id)
    {
        $b=Barang::find($id);
        if($request->stock)
        {
            
            $b->quantity=$b->quantity+$request->stock;
            $b->save();
            Session::flash('berhasil','Berhasil Menambah Stock');
        }elseif($request->keyword){
            $b->keyword=$request->keyword;
            $b->save();
            Session::flash('berhasil','Berhasil Mengubah Keyword');
        }elseif($request->deskripsi){

        
            $b->deskripsi=$request->deskripsi;
            $b->save();
            Session::flash('berhasil','Berhasil Mengubah Deskripsi');
        }elseif($request->nama && 
        $request->merk && 
        $request->harga 
    
        ){
     
            $b->nama=$request->nama;
            $b->merk=$request->merk;
            $b->harga=$request->harga;
            //replace str spasi simbol menjadi -
            $slugs=preg_replace("/[^A-Za-z0-9?![:space:]]/","-",$request->nama);
            $slug=str_replace(' ','-',$slugs);
            $b->slug=$slug;
            if($request->hasFile('gambar')){
                if (!file_exists("images/items/$request->kategori/$request->merk/$b->id")) {
                    
                    mkdir("images/items/$request->kategori/$request->merk/$b->id", 0777, true);
                }
                $gambar = $request->file('gambar');
                $nama_file = $slug.'.' .$gambar->getClientOriginalExtension();
                $lokasi = public_path("images/items/$request->kategori/$request->merk/$b->id",$nama_file);
                $gambar->move($lokasi,$nama_file);
                $b->gambar=$nama_file;
                

            }
            $b->save();
            Session::flash('berhasil','Berhasil Di Edit');
        }
        Session::flash('gagal','Data Tidak Lengkap');
        return redirect()->back();
    }

    
    public function destroy($id)
    {
        //
    }
}
