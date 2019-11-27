<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\User;
use Auth;
class BarangController extends Controller
{
    public function cariAjaxKilat(Request $request){
        if($request->q)
        {
            $cari_nama=$request->q;
        
        $query = Barang::query();
        $koloms = ['nama', 'slug', 'merk', 'kategori','keyword'];
        foreach($koloms as $kolom){
        $query->orWhere($kolom, 'LIKE', '%' . $cari_nama . '%');   
        }
        $caris = $query->paginate(10);
        $total=$caris->count();
        if($total >0)
        {
            foreach($caris as $c)
            {
                $route=route('barang.show',$c->slug);
                $gas[]='
                <a href="'.$route.'" class="dropdown-item">
                    <span class="">'.$c->nama.'</span>
                </a>';
            }
            
        }else{
            $gas=' 
                <a  class="dropdown-item">
                <span class="">Tidak Ada Data</span>
                </a>';
        }
           
        }else{
            $gas="";
        }
        $data=array('kilat'=>$gas);
        return response($data);
    }
    //api hanay utntuk scan data
    public function caribarang(Request $request)
    {       
        $cari_nama=$request->q;
        
        $query = Barang::query();
        $koloms = ['nama', 'slug', 'merk', 'kategori','keyword'];
        foreach($koloms as $kolom){
        $query->orWhere($kolom, 'LIKE', '%' . $cari_nama . '%');   
        }
        $caris = $query->paginate(10);
        return response($caris);
    }
    //api dapetin item

    
    public function index(Request $request)
    {
        return redirect()->route('slug.converter',['slug'=>$request->slug]);
    }
    public function slug(Request $request)
    {
        

        if($request->slug=="all")
        {
            $barangs=Barang::all();
            $info=$request->slug;
        }elseif($request->status=="pencarian"){
            $cari_nama=$request->slug;
            
            $query = Barang::query();
            $koloms = ['nama', 'slug', 'merk', 'kategori','keyword'];
            foreach($koloms as $kolom){
            $query->orWhere($kolom, 'LIKE', '%' . $cari_nama . '%');   
            }
            $barangs = $query->paginate(10);
            $info=$request->status;
        }else{
            $barangs=Barang::where('kategori',$request->slug)->paginate(10);
            $info=$request->slug;
        }
        
        return view('barang.index',[
            'datas'=>$barangs,
            'info'=>$info,
             'pencarian'=>$info=="pencarian" ? $request->slug : null,
        ]);
        // return response($barangs);
    }

  
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($slug)
    {
        // $barang=Barang::where('slug',$id)->first();
      
    
        $b=Barang::where('slug',$slug)->first();
        //logik harga
        $langganan="3,5,7";
        foreach(explode(',',$langganan) as $n){
          
            if($n=3)
            {
                $pot3hari=5/100;
                $ns3hari=$b->harga*$n;
                $jadi3hari=$ns3hari*$pot3hari;
                $harga3hari=$ns3hari-$jadi3hari;
                
            }
            if($n=5)
            {
                $pot5hari=10/100;
                $ns5hari=$b->harga*$n;
                $jadi5hari=$ns5hari*$pot5hari;
                $harga5hari=$ns5hari-$jadi5hari;
            }
            if($n=7)
            {
                $pot7hari=25/100;
                $ns7hari=$b->harga*$n;
                $jadi7hari=$ns7hari*$pot7hari;
                $harga7hari=$ns7hari-$jadi7hari;
            }
           
        }
        if(Auth::check())
        {
            $user=User::find(Auth::User()->id);
            //deteksi user pernah lihat barang ini atau tidak
            $user_deteksi=User::where('id',$user->id)->where('dilihat','like',"%$b->id%")->get();
            
                // kalo ga ada tambah data +1 di kolom lihat
                if(count($user_deteksi)==0)
                {
                    
                    $user->dilihat=$user->dilihat==null?$b->id:$user->dilihat.",$b->id";

                    $b->dilihat=$b->dilihat+1;
                    
                    $user->save();
                    $b->save();
                    // return response($user);
                }
                // return response($user_deteksi);
        }
         //dilihat logik change class merah kuning hijau
        $status_dilihat="";
        if($b->dilihat)
        {
            if($b->dilihat >= 1 && $b->dilihat < 30){
                $status_dilihat="is-danger";
            }elseif($b->dilihat >= 30 && $b->dilihat < 70){
                $status_dilihat="is-warning";
            }elseif($b->dilihat >= 70 && $b->dilihat <= 100 || $b->dilihat>100){
                $status_dilihat="is-success";
            }
        }
        //tersewa logik change class merah kuning hijau
        $status_tersewa="";
        if($b->tersewa)
        {
            if($b->tersewa >= 1 && $b->tersewa < 30){
                $status_tersewa="is-danger";
            }elseif($b->tersewa >= 30 && $b->tersewa < 70){
                $status_tersewa="is-warning";
            }elseif($b->tersewa >= 70 && $b->tersewa <= 100 || $b->tersewa>100){
                $status_tersewa="is-success";
            }
        }

        return view('barang.show',[
            'b'=>$b,
            'info'=>$b->nama,
            'status_tersewa'=>$status_tersewa,
            'status_dilihat'=>$status_dilihat,
            'harga3hari'=>$harga3hari,
            'harga5hari'=>$harga5hari,
            'harga7hari'=>$harga7hari
        ]);
    }

    
    public function edit($id)
    {
        
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
