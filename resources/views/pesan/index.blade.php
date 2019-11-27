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
                           <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left">Inbox Pesan</h1>
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
                                 <th><a href="#">Subject</a></th>
                                 <th class="is-hidden-touch is-narrow">
                                    <a href="#" class="descicon">
                                       Received 
                                       <span class="icon is-small">
                                          <svg class="fa icon-solid-caret-down">
                                             <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-solid-caret-down"></use>
                                          </svg>
                                       </span>
                                    </a>
                                 </th>
                                 {{-- <th class="has-text-right">Opsi</th> --}}
                              </tr>
                           </thead>
                           <tbody id="pesan-muncul">
                              
                           </tbody>
                        </table>
                        <div class="content nomatches" style="display: none;">
                           <p>No messages were found matching the criteria specified. You can <a href=" a message</a> to other members, <a href="our inbox</a> or <a href="ges</a> you have sent.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </section>
   
   
@endsection