@extends('layouts.pesan')
@section('content')
<section class="wrapper">
        <section class="section">
           <div class="container is-fluid">
              <div class="columns columnsholder is-block">
                 <div class="column columnfull">
                    <div class="normalbox browsebox">
                       <div class="normalcorner">
                          <div class="field has-addons">
                             <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left">Terkirim</h1>
                             <p class="control">
                             <a href="{{route('pesan.create')}}" class="button csstooltip is-dark is-large addicon" title="Compose Message">
                                   <span class="icon ">
                                      <svg class="fa icon-light-plus">
                                         <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-plus"></use>
                                      </svg>
                                   </span>
                                </a>
                             </p>
                            
                          </div>
                       </div>
                       
                      
                       <div class="body">
                          <table class="table tablebrowse is-narrow is-marginless is-hoverable">
                             <thead>
                                <tr class="rowtitle">
                                   <th class="is-narrow"></th>
                                   <th><a >Subjek</a></th>
                                   <th class="is-hidden-touch is-narrow">
                                      <a  class="descicon">
                                         Terkirim 
                                         <span class="icon is-small">
                                            <svg class="fa icon-solid-caret-down">
                                               <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-solid-caret-down"></use>
                                            </svg>
                                         </span>
                                      </a>
                                   </th>
                                   <th class="has-text-right">Opsi</th>
                                </tr>
                             </thead>
                             <tbody>
                                 <?php use App\User; ?>
                                 @foreach($pesans as $pesan)
                               
                           
                       
                                <tr class="row rowcontent  is-clickable rowfiltered" style="display: table-row;">
                                   <td>
                                   <a href="{{route('pesan.edit',$pesan->id)}}" class="image is-50x50">
                                    <img src="{{filter_var(Auth::User()->foto, FILTER_VALIDATE_URL)?Auth::User()->foto : asset('images/user/'.Auth::User()->id.'/foto/'.Auth::User()->foto)}}" onerror='this.src="{{asset("images/user.png")}}"'></a>
                  
                                   </td>
                                <td class="titletable"><span class="clampavatar">
                                    <a href="{{route('pesan.edit',$pesan->id)}}" class="titletable" style="font-weight: initial;">{{$pesan->subjek}}</a>
                                    <span class="tablesubtitle is-hidden-touch is-block">
                                    <a href="{{route('pesan.edit',$pesan->id)}}" class="has-text-inherit">{{$pesan->untuk}}</a> - {{$pesan->subjek}}</span></span></td>
                                    <?php 
                                    $waktu_skrg=strtotime(date('Y-m-d H:i:s'));
                                     $waktu_pesan=strtotime($pesan->created_at);
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
                                
                                    ?>
                                    <form action="{{route('pesan.destroy',$pesan->id)}}" id="hapus-pesan-{{$pesan->id}}" method="POST">
                                       {{csrf_field()}}
                                       {{method_field('DELETE')}}
                                    </form>
                                    <td class="is-hidden-touch"><time >{{$waktupesan}}</time></td>
                                   <td class="has-text-right">
                                      <div class="field has-addons">
                        
                                         <p class="control">
                                         <a  class="button csstooltip is-dark is-small deleteicon" rel="nofollow" title="Delete" onclick="$('#hapus-pesan-{{$pesan->id}}').submit();">
                                               <span class="icon is-small">
                                                  <svg class="fa icon-light-trash-alt">
                                                     <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-trash-alt"></use>
                                                  </svg>
                                               </span>
                                            </a>
                                         </p>
                                      </div>
                                   </td>
                                </tr>
                                @endforeach
                             </tbody>
                          </table>
                          <div class="content nomatches" style="display: none;">
                             <p>No messages were found matching the criteria specified. You can <a href="messages/compose">compose a message</a> to other members, <a href="messages/inbox">refresh your inbox</a> or <a href="messages/sent">view messages</a> you have sent.</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </section>
     </section>
@endsection