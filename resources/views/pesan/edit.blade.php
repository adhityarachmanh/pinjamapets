@extends('layouts.pesan')
@section('content')
<section class="wrapper">
        <section class="section">
           <div class="container is-fluid">
              <div class="columns columnsholder is-block">
                 <div class="column columnfull">
                    <div class="normalbox commentbox" id="firstmessage">
                       <div class="normalcorner">
                          <div class="field has-addons">
                          <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left">{{$pesan->subjek}}</h1>
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
                          <div class="tablethread tablebrowse">
                             <div class="media row rowcontent">
                                <figure class="media-left is-hidden-touch"><a  class="image is-50x50"><img src="{{filter_var(Auth::User()->foto, FILTER_VALIDATE_URL)?Auth::User()->foto : asset('images/user/'.Auth::User()->id.'/foto/'.Auth::User()->foto)}}"  width="50" height="50" class="" srcset="https://thumb.mod.io/members/a4a2/34653/crop_100x100/avatar.jpg 2x"></a></figure>
                                <div class="media-content">
                                   <div class="formbox" id="messagesform">
                                      <div>
                                      <form action="{{route('pesan.update',Auth::User()->id)}}" method="post" id="form-pesan">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                      <input type="hidden" name="subjek" value="{{$pesan->subjek}}"><input type="hidden" name="untuk" value="admin" id="messagesfriendid">
                                           
                                            <div class="field row rowmessagesdescription rowsub rowrequired">
                                               <div class="field">
                                                  <p class="control">
                                                  <div class="mentions-input" style="display: block;">
                                                     <div class="highlighter" >
                                                        <div class="highlighter-content" style="top: 0px;"></div>
                                                     </div>
                                                     <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                                                     <script>
                                                         fixNewLines = function(content) {
                                                             var codeBlocks = content.match(/<pre.*?>[^]*?<\/pre>/mg);
             
                                                             if (codeBlocks) {
                                                                 for (var index = 0; index < codeBlocks.length; index++) {
                                                                     content = content.replace(codeBlocks[index], codeBlocks[index].replace(/<br\s*\/?>/mgi, "\n"));
                                                                 }
                                                             }
             
                                                             content = content.replace(/&nbsp;/gi, " ");
             
                                                             return content;
                                                         }
                                                         ;
             
                                                         tinymceMessage = function(event) {
                                                             if (event.data.tinymce) {
                                                                 tinymce.activeEditor.windowManager.getParams().callback(event.data.url, event.data);
                                                                 tinymce.activeEditor.windowManager.close();
                                                             }
                                                         }
                                                         ;
             
                                                         window.addEventListener("message", tinymceMessage, false);
             
                                                         triggerTextareaChange = function() {
                                                             $(".mceEditor").change();
                                                         }
                                                         ;
             
                                                         tinymce.init({
                                                             selector: ".mceEditor",
                                                             body_class: "content",
                                                             menubar: false,
                                                             convert_urls: true,
                                                             relative_urls: false,
                                                             remove_script_host: false,
                                                             browser_spellcheck: true,
                                                             media_alt_source: false,
                                                             media_live_embeds: false,
                                                             keep_styles: false,
                                                             statusbar: true,
                                                             image_title: true,
                                                             document_base_url: "",
                                                             file_picker_types: "image",
                                                             skin: "v1",
                                                             autoresize_bottom_margin: 0,
                                                             autoresize_overflow_padding: 0,
                                                             autoresize_min_height: 200,
                                                             autoresize_max_height: (document.documentElement.clientHeight - 200) < 200 ? 200 : (document.documentElement.clientHeight - 200),
                                                             height: 200,
                                                             content_css: "{{asset('css/pesan.css')}}",
                                                             valid_elements: "p," + "-a[name|href|target|title|rel|class|style]," + "span[!class<spoiler?thickbox?ellipsis?bigletter?clear?dummy|!style|!id<autocomplete?autocomplete-delimiter?autocomplete-searchtext]," + "div[!style]," + "figure[class]," + "table[class]," + "thead," + "tbody," + "tfoot," + "tr[class]," + "th[class]," + "td[class]," + "iframe[!src|width|height|frameborder|allowfullscreen|scrolling<auto?no?yes]," +
                                                             "-code[class]," + "-pre," + "img[!src|alt=|title|width|height|class<imgborder?thickbox?clear?first?last?box|align|style]," + "br," + "-acronym," + "-strong/b/h1/h4/h5/h6," + "-h2," + "-h3," + "-em/i," + "-del/strike," + "-u," + "-blockquote[class]," + "-ol," + "-ul," + "-li," + "-sub," + "-sup," + "-center," + "hr",
                                                             style_formats: [{
                                                                 title: "Header 1",
                                                                 block: "h2"
                                                             }, {
                                                                 title: "Header 2",
                                                                 block: "h3"
                                                             }, {
                                                                 title: "Strikethough",
                                                                 inline: "del"
                                                             }, {
                                                                 title: "Underline",
                                                                 inline: "u"
                                                             }, {
                                                                 title: "Spoiler",
                                                                 inline: "span",
                                                                 classes: "spoiler"
                                                             }, {
                                                                 title: "URL Lightbox",
                                                                 selector: "img",
                                                                 classes: "thickbox"
                                                             }, ],
                                                             formats: {
                                                                 underline: {
                                                                     inline: "u"
                                                                 },
                                                                 strikethrough: {
                                                                     inline: "del"
                                                                 },
                                                                 aligncenter: {
                                                                     block: "center",
                                                                     wrapper: true
                                                                 }
                                                             },
                                                             
                                                             paste_preprocess: function(plugin, args) {
                                                                 if (args.content.search(/&lt;.*&gt;.*&lt;\/.*&gt;/gi) >= 0) {
                                                                     args.content = args.content.replace(/&lt;/gi, "<").replace(/&gt;/gi, ">");
                                                                 }
             
                                                                 args.content = args.content.replace(/&nbsp;|\xa0/gi, " ").replace(/&mdash;/gi, "-").replace(/&quot;/gi, "\"").replace(/&rsquo;/gi, "'");
                                                             },
                                                             setup: function(editor) {
                                                                 editor.on("BeforeSetContent", function(e) {
                                                                     e.content = fixNewLines(e.content);
                                                                 });
                                                                 editor.on("SaveContent", function(e) {
                                                                     e.content = fixNewLines(e.content);
                                                                 });
                                                                 editor.on("GetContent", function(e) {
                                                                     e.content = fixNewLines(e.content);
                                                                 });
                                                                 editor.on("change", function(e) {
                                                                     triggerTextareaChange();
                                                                 });
                                                             },
                                                             mentions: {
                                                                 delay: 0,
                                                                 items: 6,
                                                                 queryBy: "value",
                                                                 
                                                               
                                                             },
                                                             plugins: ["autoresize code hr image link lists paste mention mymedia mycode"],
                                                             toolbar1: "undo redo | styleselect | bold italic removeformat | bullist numlist aligncenter blockquote hr | link unlink | media"
                                                           //   toolbar1: "undo redo | styleselect | bold italic removeformat | bullist numlist aligncenter blockquote hr | link unlink | image media mycode | code"
                                                         });
                                                     </script>
                                                   <textarea cols="80" rows="2" id="isi_pesan" 
                                                   class="textarea input ui-autocomplete-input mceEditor" 
                                                   required="required" placeholder="Balas Chat"
                                                   name="isi" 
                                                   autocomplete="off" style="overflow: hidden; overflow-wrap: break-word; resize: none; background-color: white; height: 58.9922px;"></textarea>
                                                     
                                                     <ul class="ui-autocomplete ui-front dropdown-content ui-menu ui-widget ui-widget-content ui-corner-all" id="ui-id-1" tabindex="0" style="display: none;"></ul>
                                                  </div>
                                                  </p>
                                               </div>
                                            </div>
                                            <div class="field row rowmessagesbuttonsgroup buttons">
                                               <div class="field is-grouped-right is-grouped">

                                                  <p class="control"><button onclick="kirim_pesan();" type="submit"   class="button is-primary">Kirim Balasan</button></p>
                                               </div>
                                            </div>
                                         </form>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <chat-live></chat-live>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </section>
     </section>
@endsection
@section('scripts')
    <script>
        setInterval(function(){
    $.ajax({
        url:'/chat-pesan/ajax-inbox/sekarang',
        type:'GET',
        data:{
           id:"{{$pesan->id}}"
        },
        timeout: 2000,
        dataType: "json",
        error:function(error){
        console.log(error);
        },
        success:function(response){
              
                   $('chat-live').html(response.chatlive);
            

        }

        });
},100);


function kirim_pesan(){
    $('#form-pesan').submit();
   
}
    </script>
@endsection