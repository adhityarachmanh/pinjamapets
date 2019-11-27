<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Pesan;
use Session;
class AdminPesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin.pesan.index',[
            'status'=>'inbox'
        ]);
    }
    public function indexKeluar()
    {
        return view('admin.pesan.sent',[
            'status'=>'sent'
        ]);
    }
    public function cariUser(Request $request){
      if($request->q){
            $cari=$request->q;
           
            if($cari!="")
            {
                $query = User::query();
                $koloms = ['name','id'];
                foreach($koloms as $kolom){
                $query->orWhere($kolom, 'LIKE', '%' . $cari . '%');   
                }
                $datas=$query->paginate(1);
            }
            $total=$datas->count();
            if($total>0){
                foreach($datas as $d)
                {
                    if($d->status_login!=null){
                        $gambar=$d->foto;
                    }else{
                        $gambar=asset("images/user/$d->id/foto/$d->foto");
                    }
                    $hasil[]="
                    <a id='user-cari' class='dropdown-item'>
                    <input id='user-cari-id' class='is-hidden' value='$d->id'>
                    <input id='user-cari-nama' class='is-hidden' value='$d->name'>
                    <input id='user-cari-gambar' class='is-hidden' value='$gambar'>
                    $d->name
                    </a>";
                } 
            }else{
                $hasil="<a class='dropdown-item'>Tidak Ada User</a>";
            }
            $gas=array('gas'=>$hasil);
            return response($gas);
        }
    
    }
    public function ajaxInbox(Request $request){
       
        $pesans=Pesan::where('untuk','admin')
        ->orderBy('created_at','DESC')->paginate();
        $total=$pesans->count();
        if($total>0)
        {
            foreach($pesans as $p){
                $d=User::find($p->id_user);
                if($d->status_login!=null){
                    $gambar=$d->foto;
                }else{
                    $gambar=asset("images/user/$d->id/foto/$->foto");
                }
                $waktu_skrg=strtotime(date('Y-m-d H:i:s'));
                $waktu_pesan=strtotime($p->created_at);
                $selisih=$waktu_skrg-$waktu_pesan;
               
                if(gmdate('d',$selisih)>01)
               {
                   $haris=gmdate('d',$selisih)-01;
                   $waktupesan=$haris." Hari Yang Lalu";
               }else{
                   if(gmdate('H',$selisih)!=00)
               {
                   $jams=gmdate('H',$selisih)-00;
                   $waktupesan=$jams." Jam Yang Lalu";
               }else{
                   if(gmdate('i',$selisih)!=00)
                   {
                       $menits=gmdate('i',$selisih)-00;
                       $waktupesan=$menits." Menit Yang Lalu";
                   }else{
                       $detiks=gmdate('s',$selisih)-00;
                       $waktupesan=$detiks." Detik Yang Lalu";
                   }
               
               }
               }
               if($p->status=='unread')
               {
                   $status='unread';
                   $icon='envelope';
                   $warna='success';
               }elseif($p->status=='read'){
                    $status='read';
                    $icon='bolt';
                    $warna='light';
               }
               $route=route('manage-pesan.edit',$p->id);
                $gas[]='<tr class="row rowcontent  is-clickable rowfiltered" style="display: table-row;">
                <td>
                <a href="'.$route.'" class="image is-50x50">
                <img src="'.$gambar.'" ></a>

                </td>
             <td class="titletable"><span class="clampavatar">
                 <a href="'.$route.'" class="has-text-'.$warna.' titletable" style="font-weight: initial;">
                 <span class="icon '.$status.' csstooltip is-pulled-left" title="'.$status.' (online)">
                 <svg class="fa icon-solid-'.$icon.'">
                 <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-solid-'.$icon.'"></use>
                 </svg>
                 </span>
                 '.$p->subjek.'</a>
                 <span class="tablesubtitle is-hidden-touch is-block">
                 <a href="" class="has-text-inherit">'.$p->dari.'</a> - '.$p->isi.'</span></span></td>
            
                 <td class="is-hidden-touch"><time >'.$waktupesan.'</time></td>
                
             </tr>';
            }
           
        }else{
            $gas="";
        }
        $noread=Pesan::where('untuk','admin')
        ->where('status','unread')->count();
        $data=array(
            'muncul'=>$gas,
            'noread'=>$noread
        );
    return response($data);
    }
    public function create()
    {
        return view('admin.pesan.create',[
            'status'=>'compose'
        ]);
    }

    
    public function store(Request $request)
    {
        $pesan=new Pesan();
        $pesan->untuk=$request->untuk;
        $pesan->dari=$request->dari;
        $pesan->id_user=$request->id_user;
        $pesan->subjek=$request->subjek;
        $pesan->slug=str_replace(' ','-',$request->subjek);
        $pesan->isi=$request->isi;
        $pesan->status='unread';
        $pesan->save();
        Session::flash('berhasil','Pesan Telah Di Kirim');
        return redirect()->back();
    }

  
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $pesan=Pesan::find($id);
     
        return view('admin.pesan.edit',[
            'pesan'=>$pesan,
            'status'=>'chat'
           
        ]);
    }

    public function ajaxPesanShow(Request $request){
      if($request->id)
      {
        $pesan=Pesan::find($request->id);
        $pesans=Pesan::where('slug',$pesan->slug)
        ->orderBy('created_at','DESC')
        ->where('id_user',$pesan->id_user)
        ->paginate();
        $total=$pesans->count();
        if($total >0)
        {
            foreach($pesans as $p){
                $d=User::find($p->id_user);
                //pesan dibaca
                if( $p->status=='unread' && $p->untuk=="admin" )
                {
                    $p->status='read';
                    $p->save();
                }
                //deteksi gambar
                if($d->status_login!=null && $p->dari!="admin"){
                    $gambar=asset("images/user/$p->id_user/pesan/foto/$p->id_user.jpg");
                }elseif($p->dari=="admin"){
                    $gambar=asset("images/admin.png");
                }elseif($p->dari!="admin" && $d->status_login==null ){
                    $gambar=asset("images/user/$d->id/foto/$->foto");
                }
                $waktu_skrg=strtotime(date('Y-m-d H:i:s'));
                $waktu_pesan=strtotime($p->created_at);
                $selisih=$waktu_skrg-$waktu_pesan;
               
                if(gmdate('d',$selisih)>01)
               {
                   $haris=gmdate('d',$selisih)-01;
                   $waktupesan=$haris." Hari Yang Lalu";
               }else{
                   if(gmdate('H',$selisih)!=00)
               {
                   $jams=gmdate('H',$selisih)-00;
                   $waktupesan=$jams." Jam Yang Lalu";
               }else{
                   if(gmdate('i',$selisih)!=00)
                   {
                       $menits=gmdate('i',$selisih)-00;
                       $waktupesan=$menits." Menit Yang Lalu";
                   }else{
                       $detiks=gmdate('s',$selisih)-00;
                       $waktupesan=$detiks." Detik Yang Lalu";
                   }
               
               }
               }
                $chat_live[]='  <div  class="media row rowcontent rowonline">
                           
                <figure class="media-left is-hidden-touch">
                    <a class="image is-50x50">
                       
                            <img src="'.$gambar.'"  width="50" height="50" class="">
                       </a></figure>
                        <div class="media-content">
                   <div class="media-heading is-clearfix">
                      <a  class="has-text-success author">
                         <span class="has-text-success icon online csstooltip is-pulled-left" title="Online">
                            <svg class="has-text-success fa icon-solid-bolt">
                               <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-solid-bolt"></use>
                            </svg>
                         </span>
                       asfasfasf
                      </a>
                      <small class="says is-opaque50"><time >'.$waktupesan.'</time></small>
                   </div>
                   <div class="content comment">
                   <p>'.$p->isi.'</p>
                   </div>
                </div>
             </div>';
            }
         
           
        }else{
            $chat_live="";
        }
        $data=array('chatlive'=>$chat_live);
        return response($data);
      }
         
      
    }
    public function update(Request $request, $id)
    {
        $pes=Pesan::find($id);
        $pesan=new Pesan();
        $pesan->untuk=$pes->dari;
        $pesan->dari=$pes->untuk;
        $pesan->id_user=$pes->id_user;
        $pesan->isi=$request->isi;
        $pesan->slug=$pes->slug;
        $pesan->subjek=$pes->subjek;
        $pesan->status='unread';
        $pesan->save();
        Session::flash('berhasil','pesan ditambah');
        return redirect()->back();


    }

   
   
    public function destroy($id)
    {
        //
    }
}
