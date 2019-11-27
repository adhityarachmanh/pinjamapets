
<div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title toggleadd is-1 is-cursor-pointer is-size-1-touch">
                PINJAM.<span>APET</span>
            </h1>
            <form action="#" method="post" id="barang-form" class="field has-addons has-addons-centered">
                <p class="control is-expanded is-dark is-large">
                    <input type="text" name="nameid" maxlength="20" id="input_cari" value="" placeholder="Cari Barang Anda..." class="input has-text-right is-large" autocomplete="off" required="required">
                  
                </p>
                <p class="control">
                    <button type="submit" value="" id="tmbl_cari" class="button is-primary is-large">Cari</button>
               
                </p>
               
               
                
            </form>
   
            <div class="search-suggest is-hidden" style="position:absolute;width:10%; z-index:10000;width:40%;margin:0 50% 0 30%">
                    <div class="dropdown-menu" style="display: block;">
                        <div class="dropdown-content" id="cari-kilat" >
                          
                            </div>
                        </div>
                    </div>
            <div class="field fieldmsg has-text-centered">
                
                <a href="#" class="is-opaque25">Peminjaman Alat Pendakian Terpercaya</a>
                
            </div>
            
        </div>
    </div>
   
    <div class="hero-foot background is-primary is-primary-gradient">
        <div class="container has-text-centered">
            <div class="columns is-centered">
                <div class="column is-3">
                    <span class="button is-huge is-text">
                        <span class="icon iconbg is-huge is-marginless">
                            <svg class="fa icon-custom-modio-cog">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-modio-cog"></use>
                            </svg>
                        </span>
                        <span class="icon is-centered-text is-huge is-marginless">
                            <i class="fa fa-headphones"></i>
                        </span>
                    </span>
                    <h3 class="title">Customer Support</h3>
                    <h4 class="subtitle is-6">
                        Gratis Biaya Konsultasi. Support 24 Jam. Tanpa Hari Libur.
                    </h4>
                </div>
                <div class="column is-3">
                    <span class="button is-huge is-text">
                        <span class="icon iconbg is-huge is-marginless">
                            <svg class="fa icon-custom-modio-cog">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-modio-cog"></use>
                            </svg>
                        </span>
                        <span class="icon is-centered-text is-huge is-marginless">
                            <i class="fa fa-dashboard"></i>
                        </span>
                    </span>
                    <h3 class="title">Fast Respon</h3>
                    <h4 class="subtitle is-6">Kami juga memberikan Pelayanan Cepat. Call 0812-8283-1996.
                        </h4>
                </div>
                <div class="column is-3">
                    <span class="button is-huge is-text">
                        <span class="icon iconbg is-huge is-marginless">
                            <svg class="fa icon-custom-modio-cog">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-modio-cog"></use>
                            </svg>
                        </span>
                        <span class="icon is-centered-text is-huge is-marginless">
                            <i class="fa fa-map-marker"></i>
                        </span>
                    </span>
                    <h3 class="title">Lokasi</h3>
                    <h4 class="subtitle is-6">
                        Lokasi Kami berada di pusat kota-jakarta.</a>
                        
                    </h4>
                </div>
                <div class="column is-3">
                    <span class="button is-huge is-text">
                        <span class="icon iconbg is-huge is-marginless">
                            <svg class="fa icon-custom-modio-cog">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-modio-cog"></use>
                            </svg>
                        </span>
                        <span class="icon is-centered-text is-huge is-marginless">
                            <i class="fa fa-diamond"></i>
                        </span>
                    </span>
                    <h3 class="title">Negotiable</h3>
                    <h4 class="subtitle is-6">
                        Harga yang kami berikan sesuai dengan kualitas yang akan anda dapatkan.
                    </h4>
                </div>
                
            </div>
            <div class="columns is-centered m-t-50">
                <div class="column is-3">
                    <span class="button is-huge is-text">
                        <span class="icon iconbg is-huge is-marginless">
                            <svg class="fa icon-custom-modio-cog">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-modio-cog"></use>
                            </svg>
                        </span>
                        <span class="icon is-centered-text is-huge is-marginless">
                            <i class="fa fa-shopping-bag"></i>
                        </span>
                    </span>
                    <h3 class="title">Stocks Produk</h3>
                    <h4 class="subtitle is-6">
                        Stock Produk Ready dalam Jumlah Besar.
                    </h4>
                </div>
                <div class="column is-3">
                    <span class="button is-huge is-text">
                        <span class="icon iconbg is-huge is-marginless">
                            <svg class="fa icon-custom-modio-cog">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-modio-cog"></use>
                            </svg>
                        </span>
                        <span class="icon is-centered-text is-huge is-marginless">
                            <i class="fa fa-key"></i>
                        </span>
                    </span>
                    <h3 class="title">Quality Products</h3>
                    <h4 class="subtitle is-6">Kualitas Produk kami selalu di cek setiap minggunya.
                        </h4>
                </div>
            
                
           
        </div>
        <div class="buttonpulse">
            <a href="{{route('slug.converter',['status'=>'items','slug'=>'all'])}}"  class="button is-dark is-medium is-rounded is-padded is-ignored">Ingin Sewa Barang ?</a>
            <span class="button pulse is-dark is-medium is-rounded is-padded is-overlay is-ignored"></span>
        </div>
    </div>
@section('scripts')
    <script>
        $('#input_cari').on('keyup',function(){
            $('.search-suggest').removeClass('is-hidden');
            $('#tmbl_cari').addClass('is-loading');
            var cari = $(this).val();
            $.ajax({
                url:'/api/cari-ajax/kilat',
                type:'GET',
                data:{
                    q:cari,
                },
                timeout:2000,
                dataType:'json',
                error: function(error){
                    console.log(error);
                },
                success: function(response){
                    console.log(response.kilat);
                    if(response.kilat)
                    {
                      
                        $('#cari-kilat').html(response.kilat);
                    }else{
                        $('#tmbl_cari').removeClass('is-loading');
                        $('.search-suggest').addClass('is-hidden');
                    }
                  
                    
                },
            });
        });
        
    </script>
@endsection