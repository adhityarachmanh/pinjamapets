

@extends('admin.layouts.admin')
@section('content')
<section class="wrapper">
   <section class="section">
      <div class="container is-fluid">
         <div class="columns columnsholder is-block">
            <div class="column columnfull">
               <div class="normalbox formbox" id="apiform">
                  <div class="normalcorner">
                     <div class="field">
                        <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left is-capitalized">Lihat / Edit {{!empty($status)?$status:''}}</h1>
                     </div>
                  </div>
                  <div class="field row rowmessagesdescription rowrequired m-t-20">
                        <label class="label" for="messagesdescription">
                                Gambar Barang
                            </label>
                            <div class="field">
                            <img style="width:20%" src="{{asset("images/items/$b->kategori/$b->merk/$b->id/$b->gambar")}}" alt="">
                            </div>
                        <label class="label" for="messagesdescription">
                                Nama Barang
                            </label>
                            <div class="field">
                                {{$b->nama}}
                            </div>
                            <label class="label" for="messagesdescription">
                                    Kategori Barang
                                </label>
                                <div class="field">
                                    {{$b->kategori}}
                                </div>
                                <label class="label" for="messagesdescription">
                                        Merk Barang
                                    </label>
                                    <div class="field">
                                        {{$b->merk}}
                                    </div>
                    <label class="label" for="messagesdescription">
                        Deskripsi Sekarang
                    </label>
                    <div class="field">
                    {!!$b->deskripsi==NULL?'Belum Ada':$b->deskripsi!!}
                    </div>
                  </div>
                  <div class="field row rowmessagesdescription rowrequired m-t-20">
                        <label class="label" for="messagesdescription">
                            Deskripsi Baru
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
                            <form action="{{route('manage-barang.update',$b->id)}}" method="POST" id="deskripsi_form" >
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                            <p class="control">
                            <textarea name="deskripsi" cols="80" rows="10"  class="textarea mceEditor" required="required" placeholder="Reply to thread"></textarea>
                            </p>
                            <p class="control">
                                <button onclick="$('#deskripsi_form').submit();" type="button" class="button is-primary m-t-10">Edit Deskripsi</button>
                            </p>
                        </form>
                        </div>
                    </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</section>
@endsection
@section('scripts')

@endsection

