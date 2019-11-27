@extends('admin.layouts.admin')
@section('content')
<section class="wrapper">
    <section class="section">
        <div class="container is-fluid">
            <div class="columns columnsholder is-block">
                <div class="column columnfull">
                    <div class="normalbox formbox" id="messagesform">
                        <div class="normalcorner">
                            <div class="field">
                                <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left">Kirim Pesan</h1>
                            </div>
                        </div>
                        <div class="body">
                        <form action="{{route('manage-pesan.store')}}" method="POST" id="form-compose">
                         {{csrf_field()}}
                         <input type="hidden" name="untuk" id="untuk-nama">
                        <input type="hidden" name="dari" value="admin">
                                <div class="field row rowmessagesmembersto">
                                    <label class="label" for="messagesmembersto">Untuk</label>
                           
                                    <div class="field" style="width:400px;">
                                        <p class="control has-icons-right is-dark">
                                            <input  type="text" id="untuk-siapa" name="id_user" maxlength="100" value=""  class="input" style="border-color:white;" autocomplete="off" placeholder="Id User Atau Nama User" required="required">
                                            <img id="user-foto" style="width:100px;"  class="is-hidden"> 
                                            <br>
                                            <span id="wadah-untuk" class="tag is-medium is-hidden">
                                             
                                                    <span class="tag-label" id="taro-untuk" style="max-width: 960px;"></span>
                                                    <button id="hapus-taro" class="delete is-small"></button>
                                                </span>
                                                <span class="icon is-small is-right " id="tmbl_search">
                                                        <svg class="fa icon-light-search">
                                                           <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-search"></use>
                                                        </svg>
                                                     </span>
                                        </p>
                                      
                                    </div>
                                    <div class="search-suggest" style="position:relative">
                                        <div id="suggest-search" class="dropdown-menu" style="display: none;">
                                            <div class="dropdown-content">
                                                <muncul></muncul>
                                            </div>
                                        </div>
                                    </div>
                                  
                                  
                                </div>
                                <div class="field row rowmessagesname rowrequired">
                                    <label class="label" for="messagesname">
                                        Subjek<em>*</em>
                                    </label>
                                    <div class="field">
                                        <p class="control">
                                            <input type="text" name="subjek" maxlength="100" value="" id="messagesname" class="input" required="required">
                                        </p>
                                    </div>
                                </div>
                                <div class="field row rowmessagesdescription rowrequired">
                                    <label class="label" for="messagesdescription">
                                        Isi Pesan<em>*</em>
                                    </label>
                                    <div class="field">
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
                                                toolbar1: "undo redo | styleselect | bold italic removeformat | bullist numlist aligncenter blockquote hr | link unlink "
                                              //   toolbar1: "undo redo | styleselect | bold italic removeformat | bullist numlist aligncenter blockquote hr | link unlink | image media mycode | code"
                                            });
                                        </script>
                                        <p class="control">
                                            <textarea name="isi" cols="80" rows="10"  class="textarea mceEditor" required="required" placeholder="Reply to thread"></textarea>
                                        </p>
                                    </div>
                                </div>
                                <div class="field row">
                                    <div class="field is-grouped-right is-grouped">
                                       
                                        <p class="control">
                                            <a  class="button is-primary" id="kirim-pesan">Send message</a>
                    
                                        </p>
                                       
                                    </div>
                                </div>
                            </form>
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
   
    $('#hapus-taro').click(function(e){
            $('#untuk-siapa').removeClass('is-hidden');
         $('#wadah-untuk').addClass('is-hidden');
         $('#taro-untuk').text('');
         $('#untuk-siapa').val('');
         $('#tmbl_search').removeClass('is-hidden');
         $('#user-foto').addClass('is-hidden');
         $('#user-foto').attr('src','');
    });
    $('#untuk-siapa').on('keyup',function(e){
        if($(this).val()!="")
        {
            $('#tmbl_search').addClass('is-loading');
            $.ajax({
            type: "GET",
            url: "/admin/manage-pesan/cariuser/sekarang",
            timeout: 2000,
            dataType: "json",
            data: {
                q:$('#untuk-siapa').val(),
       
            },
            error: function(response, error, exception) {
                console.log(error);
                
            },
            success: function(response) {
      
                $('#suggest-search').attr('style','display:block;');
                $('muncul').html(response.gas);
                $('#user-cari').on('click',function(){
                var id = $(this).find('#user-cari-id').val();
                var nama = $(this).find('#user-cari-nama').val();
                var gambar = $(this).find('#user-cari-gambar').val();
                         $('#untuk-siapa').addClass('is-hidden');
                        $('#wadah-untuk').removeClass('is-hidden');
                         $('#taro-untuk').text(nama);
                         $('#untuk-nama').val(nama);
                         $('#untuk-siapa').val(id);
                         $('#suggest-search').attr('style','display:none;');
                         $('#tmbl_search').addClass('is-hidden').removeClass('is-loading');
                         $('#user-foto').removeClass('is-hidden');
                         $('#user-foto').attr('src',gambar);
                         
                });
            }
        });
        }else{
            $('#tmbl_search').removeClass('is-loading');
            $('#suggest-search').attr('style','display:none;');
           
        }
         
    });
    $('#kirim-pesan').on('click',function(){
        $('#form-compose').submit();
    });
      
        </script>
@endsection