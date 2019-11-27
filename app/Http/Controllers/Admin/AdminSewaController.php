<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sewa;
use App\Barang;
use Session;
class AdminSewaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function carisewa(Request $request)
    {
        $cari_nama=$request->sewa;
        
        $query = Sewa::query();
        $koloms = ['kodesewa'];
        foreach($koloms as $kolom){
        $query->orWhere($kolom, 'LIKE', '%' . $cari_nama . '%');   
        }
        $caris = $query->paginate(10);
        return response($caris);
    }
    public function sucPencarian(Request $request)
    {

         $sewas=Sewa::where('kodesewa','LIKE',"%$request->slug%")->orderBy('created_at','DESC')->paginate(10);
        return view('admin.sewa.index',[
            'sewas'=>$sewas,
            'status'=>"Pencarian $request->slug"
        ]);
    }
    public function index()
    {
        $sewas=Sewa::where('status','unverified')->orderBy('created_at','DESC')->paginate(10);
        return view('admin.sewa.index',[
            'sewas'=>$sewas,
            'status'=>'unverified'
        ]);
    }

    public function indexSewa(Request $request){
        if($request->status=="verified")
        {   
            $sewas=Sewa::where('status','verified')
            ->orderBy('created_at','DESC')
            ->paginate(10);
            return view('admin.sewa.index',[
                'sewas'=>$sewas,
                'status'=>$request->status
            ]);
        }elseif($request->status=="struk"){
            $sewas=Sewa::where('status','unverified')
            ->where('struk','!=',null)
            ->orderBy('created_at','DESC')
            ->paginate(10);
            return view('admin.sewa.index',[
                'sewas'=>$sewas,
                'status'=>$request->status
            ]);
        }
    }
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $verified=Sewa::find($id);
        if($request->status){
            $verified->status=$request->status;
            $verified->save();
            if($verified->status=="verified")
            {
                $barang=Barang::find($verified->id_barang);
              
                $barang->tersewa=$barang->tersewa+1;
                $barang->save();
            }
          
            Session::flash('berhasil','Sewa Telah Di Verifikasi');
            return redirect()->route('manage-sewa.status',['status'=>'verified']);
        }elseif($request->status_pengiriman){
            

            $verified->status_pengiriman=$request->status_pengiriman;
            $verified->save();
            Session::flash('berhasil',"Status Pengiriman Berhasil Di Rubah");
            return redirect()->back();
        }
       
     
       
     
        // return response($request);
    }

    
    public function destroy($id)
    {
        //
    }

}
