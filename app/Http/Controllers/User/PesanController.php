<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesan;
use Auth;
use Session;
class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ajaxPesanInboxUser(Request $request){
    $pesans=Pesan::where('untuk',Auth::User()->name)
        ->where('dari','admin')
        ->where('id_user',Auth::User()->id)
        ->orderBy('created_at','DESC')
        ->paginate();
        $total=$pesans->count();
        if($total>0)
        {
            foreach($pesans as $p){
               
             
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
               $route=route('pesan.edit',$p->id);
                $gas[]='<tr class="row rowcontent  is-clickable rowfiltered" style="display: table-row;">
                <td>
                <a href="'.$route.'" class="image is-50x50">
                <img src="'.asset("images/admin.png").'" ></a>

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
        $noread=Pesan::where('untuk',Auth::User()->name)
        ->where('id_user',Auth::User()->id)
        ->where('status','unread')->count();
        $data=array(
            'muncul'=>$gas,
            'noread'=>$noread
        );
        
    return response($data);
    }
    public function index()
    {
      
        return view('pesan.index',[
            'info'=>'pesan inbox',
            
        ]);
    }
    public function indexSent()
    {
        $pesans=Pesan::where('id_user',Auth::User()->id)
        ->where('dari',Auth::User()->name)
        ->orderBy('created_at','DESC')
        ->paginate();
        

        return view('pesan.sent',[
            'info'=>'pesan sent',
            'pesans'=>$pesans,
          
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('pesan.create',[
            'info'=>'pesan compose'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesan=new Pesan();
        $pesan->untuk=$request->untuk;
        $pesan->dari=$request->dari;
        $pesan->subjek=$request->subjek;
        $pesan->status='unread';
        $pesan->isi=$request->isi;
        $pesan->id_user=Auth::User()->id;
        $pesan->slug = preg_replace('/[^A-Za-z0-9\-]/', '-', $request->subjek);
      
        $pesan->save();
        Session::flash('berhasil',"Pesan Berhasil Dengan Subjek $request->subjek Dikirim");
       return redirect()->route('pesan.sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesan=Pesan::find($id);
        // $pesans=Pesan::where('slug',$pesan->slug)
        // ->orderBy('created_at','DESC')
        // ->where('id_user',$pesan->id_user)
        // ->paginate();
        
        return view('pesan.edit',[
            'pesan'=>$pesan,
           
            'info'=>"pesan subjek"
        ]);
        // return response($pesan);
    }
    public function ajaLiveChat(Request $request){
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
                
                //pesan dibaca
                if( $p->status=='unread' && $p->untuk==Auth::User()->name )
                {
                    $p->status='read';
                    $p->save();
                }
                //deteksi gambar
                if(Auth::User()->status_login!=null && $p->dari!="admin"){
                    
                    $gambar=asset("images/user/$p->id_user/pesan/foto/$p->id_user.jpg");
                    
                }elseif($p->dari=="admin"){
                    $gambar=asset("images/admin.png");
                }elseif($p->dari!="admin" && Auth::User()->status_login==null ){
                    $gambar=asset("images/user/".Auth::User()->id."/foto/$->foto");
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
        $pesan = new Pesan();
        $pesan->untuk=$request->untuk;
        $pesan->subjek=$request->subjek;
        $pesan->slug = preg_replace('/[^A-Za-z0-9\-]/', '-', $request->subjek);
        $pesan->dari = Auth::User()->name;
        $pesan->status='unread';
        $pesan->id_user = Auth::User()->id;
        $pesan->isi = $request->isi;
        $pesan->save();
        Session::flash('berhasil','Pesan Berhasil Dikirim');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus=Pesan::find($id);
        $hapus->delete();
        Session::flash('berhasil','Pesan Berhasil Dihapus');
        return redirect()->back();
    }
}
