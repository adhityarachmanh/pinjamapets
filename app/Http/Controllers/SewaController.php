<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Sewa;
use Auth;
use Storage;
use File;
use Session;
class SewaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
         //satatus unveri && struk ga ada
        $sv=Sewa::where('id_user',Auth::User()->id)
            ->orderBy('created_at','DESC')
            ->where('status','verified')
            ->where('struk','!=',null)
            ->paginate(10);
        //satatus unveri && struk ada
        $sus=Sewa::where('id_user',Auth::User()->id)
            ->orderBy('created_at','DESC')
            ->where('status','unverified')
            ->where('struk','!=',null)
            ->first();
        //satatus veri && sukses sewa
        $su=Sewa::where('id_user',Auth::User()->id)
            ->orderBy('created_at','DESC')
            ->where('status','unverified')
            ->where('struk',null)
            ->first();
        
        
        $su_item="";
        $notif=false;
        
        if($su!=null )
        {
            $su_item=Barang::find($su->id_barang)->first();
            $notif=true;
        }elseif($sus!=null)
        {
            $su_item=Barang::find($sus->id_barang)->first();
            $notif=true;
        }
     
        return view('sewa.index',[
            'info'=>'history order',
            'sv'=>empty($sv)?$sv=null:$sv,
            'su'=>$su,
            'sus'=>$sus,
            's'=>$su_item,
            'notif'=>$notif,
        ]);
    
    }
    
  
    public function create(Request $request)
    {
        //detekesi blok klo ada trans blom selesai suruh selesaiin
        $su=Sewa::where('id_user',Auth::User()->id)
            ->where('struk',null)
            ->where('status','unverified')->first();
        $sus=Sewa::where('id_user',Auth::User()->id)
            ->where('struk','!=',null)
            ->where('status','unverified')->first();
        if($su!=null || $sus!=null)
        {
            return redirect()->route('sewa.index');
        }else{

        
        $b=Barang::findOrFail($request->id);
        return redirect()->route('sewa.symslug',[
            
            'slug'=>$b->slug,
            'sewa'=>$request->sewa,
        ]);
        }
    }
    public function symSlug(Request $request)
    {

        $b=Barang::where('slug',$request->slug)->first();
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
        // return response($barang);
        return view('sewa.create',[
            'info'=>"$b->slug",
            'b'=>$b,
            'harga3hari'=>$harga3hari,
            'harga5hari'=>$harga5hari,
            'harga7hari'=>$harga7hari,
            'sewa'=>$request->sewa,
        ]);
    }
   
    public function store(Request $request)
    {
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $panjang = 50;
        $panjangChar = strlen($char);
        $acakKode = '';
            for ($i = 0; $i < $panjang; $i++) {
                $acakKode .= $char[rand(0, $panjangChar - 1)];
            }
        $b=Barang::find($request->id_barang);
        $langganan="1,3,5,7";
        $jangka_waktu='1';
            foreach(explode(',',$langganan) as $n){
            
                if($n=3)
                {
                    $pot3hari=5/100;
                    $ns3hari=$b->harga*$n;
                    $jadi3hari=$ns3hari*$pot3hari;
                    $harga3hari=$ns3hari-$jadi3hari;
                    if($harga3hari==$request->harga){
                        $jangka_waktu='3';
                    }
                }
                if($n=5)
                {
                    $pot5hari=10/100;
                    $ns5hari=$b->harga*$n;
                    $jadi5hari=$ns5hari*$pot5hari;
                    $harga5hari=$ns5hari-$jadi5hari;
                    if($harga5hari==$request->harga){
                        $jangka_waktu='5';
                    }
                }
                if($n=7)
                {
                    $pot7hari=25/100;
                $ns7hari=$b->harga*$n;
                $jadi7hari=$ns7hari*$pot7hari;
                $harga7hari=$ns7hari-$jadi7hari;
                    if($harga7hari==$request->harga){
                        $jangka_waktu='7';
                    }
                }
                
            }
        
        $s=new Sewa();
        $s->kodesewa=$acakKode;
        $s->alamat=$request->alamat;
        $s->harga=$request->harga;
        $s->id_barang=$request->id_barang;
        $s->id_user=Auth::User()->id;
        $s->kodesewa= $acakKode;
        $s->phone=$request->phone;
        $s->bank= $request->bank;
        $s->status='unverified';
        
        $s->jangka_waktu=$jangka_waktu;
      
    
            $durasi=24;
            
           
        $waktu_akhir=date('Y-m-d H:i:s',strtotime('+'.$durasi.'hours', strtotime(date('Y-m-d H:i:s'))));
        $s->batas_upload_struk=$waktu_akhir;
        
       
            $s->save();
            //pesan barang stock barang di kurang 1
          $b=Barang::find($s->id_barang);
          $b->quantity=$b->quantity-1;
          $b->save();   
        Session::flash('warning',"Sewa Berhasil Silahkan Upload Struk Pembayaran Anda");
        return redirect()->route('sewa.show',$s->id);
        // return response($jangka_waktu);
    }

 
    public function show($id)
    {
        $sewa=Sewa::find($id);
      
        if($sewa!=null)
        {
            $barang=Barang::find($sewa->id_barang);
            return view('sewa.show',[
                'info'=>'sewa',
                's'=>$sewa,
                'b'=>$barang,
                'status_dilihat'=>null,
                'status_tersewa'=>null
            ]);
        }else{
            return redirect()->route('sewa.index');
        }
    }

   
    public function edit($id)
    {
        //
    }

    public function jangkaUploadStruk(Request $request)
    {
        
        $data=Sewa::where('id_user',Auth::User()->id)
            ->where('status','unverified')
            // ->where('struk',null)
            // ->where('batas_upload_struk','!=',null)
            ->first();
        
          if($data)
          {
        $waktu_sekarang=date('Y-m-d H:i:s');
        
        $batas_upload_struk=$data->batas_upload_struk;
        //simpan session buat deteksi data kedua klo di verified (penghindar error response)
        session(['data_kodesewa'=>$data->kodesewa]);
            if($waktu_sekarang>=$batas_upload_struk)
            {
                $b=Barang::find($data->id_barang);
                $b->quantity=$b->quantity+1;
                $b->save(); 
                
                $data->delete();
     
            }else{
               
               
               
           
                    $waktu_batas_upload=strtotime($batas_upload_struk);
                    $waktu_sekarang_ini=strtotime($waktu_sekarang);
                    $beda=$waktu_batas_upload-$waktu_sekarang_ini;
                    $gas="<span><i class='fa fa-clock'> ".gmdate("H:i:s",$beda)."</span>";
                    return response($gas);
                
            }
        
        }elseif(!empty(session('data_kodesewa')))
        {
            $data_baru=Sewa::where('kodesewa',session('data_kodesewa'))->where('status','verified')->first();
            if($data_baru)
            {
                //berarti sewa masih ada tpi jadi verified statusnya
                return "<span style='font-size:1.4em;'><i class='fa fa-check'>Sewa Anda Sudah Di Verifikasi, Silahkan Cek Di Fitur <a href='".route('sewa.index')."'>History Order</a></span>";
            }else{
                //berarti di delete
           
             
                return "<span style='font-size:1.4em;'><i class='fa fa-remove'>Melebihi Batas Waktu, Pesanan Anda Telah Di Hapus. Ingin Menyewa Barang Lagi? Klik <a href='".route('slug.converter',['status'=>'items','slug'=>'all'])."'>Sewa</a></span>";
            }
            
        }
       
            
        
            
        

     
           
        
     
        
           
        
    }
    public function update(Request $request, $id)
    {
        $data=Sewa::find($id);
        if ($request->hasFile('gambar')) {
            if (!file_exists("images/user/".Auth::User()->id."/data/struk")) {
                mkdir("images/user/".Auth::User()->id."/data/struk", 0777, true);
            }
            $gambar = $request->file('gambar');
            $filename = "struk".$data->id.'.' .$gambar->getClientOriginalExtension();
            $location = public_path("images/user/".Auth::User()->id."/data/struk",$filename);
            $gambar->move($location,$filename);
            $data->struk = $filename;
            // $data->batas_upload_struk=null;
            $data->save();
            //buat sweet alert
         
            Session::flash('berhasil','Struk Telah Di Upload, Pesanan Anda Akan Segera Di Proses');
            return redirect()->route('sewa.index');

        }else{
             //buat sweet alert
          
            Session::flash('gagal','Upload Struk Terlebih Dahulu');
            return redirect()->route('sewa.show',$id);
        }
       
        
        }

        public function delete(Request $request)
        {
        
            return response($request->id_sewa);
        }
        public function destroy($delete)
        {
        $hapus=Sewa::find($delete);
         //buat sweet alert
     
        Session::flash('berhasil',"Sewa Dengan Kode:$hapus->kodesewa Berhasil Di Batalkan");
        //
        //batal pesan stock barang di tambah lagi
        $b=Barang::find($hapus->id_barang);
        $b->quantity=$b->quantity+1;
        $b->save(); 
        $hapus->delete();
        
         
        return redirect()->route('sewa.index');
        

        }
    //referensi detek dir
    // if (file_exists("images/data/$data->kategori/$data->id/$data->gambar")) {
    //     //hapus gambar
    //     unlink("images/data/$data->kategori/$data->id/$data->gambar");
    //     //hapus directory
    //     if (is_dir("images/data/$data->kategori/$data->id/")) {
    //         rmdir("images/data/$data->kategori/$data->id/");
    //     }
       
    // }
}
