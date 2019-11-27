


@extends('layouts.app')
@section('content')

<section class="wrapper">
   
<section class="section sectionprofile">
    <div class="container">
    <div class="columns columnsholder is-block">
        <div class="column columnfull">
            <h2 class="title is-3 has-text-centered" id="sdktools">
                Barang Sewa  <a href="#">Terbaru</a>
            </h2>
            <div class="normalbox browsebox">
                <div class="body">
                    <div class="tablegrid tablebrowse columns is-multiline is-mobile is-centered is-slick is-slick1">
                        
                        @foreach($barangs as $b)
                        <div class="column row rowcontent is-dynamic">
                            <div  class="card is-fullwidth">
                                <div class="card-image">
                                    <div class="card-actions field inverttooltips has-addons">
                                        <p class="control">
                                            <a rel="nofollow" class="button subscribebutton csstooltip is-small is-danger" title="new">
                                                <span class="subscribecount local">NEW</span>
                                                <span class="icon is-small">
                                                    <svg class="fa icon-light-eye">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-eye"></use>
                                                    </svg>
                                                </span>
                                            </a>
                                        </p>
                                    </div>
                                    <a href="{{route('barang.show',$b->slug)}}" class="image is-16by9">
                                    <img src='{{asset("images/items/$b->kategori/$b->merk/$b->id/$b->gambar")}}' alt="tes doang">
                                        <span class="card-overlay is-overlay is-scrollable is-hidden-touch">
                                        {!!$b->deskripsi!!}<br>
                                            <br>
                                            <div class="tags">
                                              
                                            <span class="tag is-opaque50">{{$b->merk}}</span>
                                            
                                            </div>
                                        </span>
                                    </a>
                                </div>
                                
                                <header class="card-header">
                                    <a href="{{route('barang.show',$b->slug)}}" class="card-header-title">
                                        <span class="icon staff csstooltip" title="Asuransi">
                                            <svg class="fa icon-custom-badge-check">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-badge-check"></use>
                                            </svg>
                                        </span>
                                    <span class="truncate">{{$b->nama}}</span>
                                    </a>
                                    <a  class="card-header-icon">
                                       
                                        <span title="Downloads" class=" button csstooltip is-text is-nolink is-paddingless is-small is-opaque75">
                                           Tersedia :
                                        <span style="font-weight:bolder;">{{$b->quantity}}</span>
                                        </span>
                                    </a>
                                </header>
                            </div>
                        </div>
                        @endforeach
                    </div>
                  
                    <div class="paginationurls has-text-centered">
                        <p>
                        <a class="button is-dark is-medium is-rounded is-padded" href="{{route('slug.converter',['status'=>'items','slug'=>'all'])}}">
                                <span class="icon">
                                    <i class="fa fa-cube"></i>
                                </span>
                                <span>Lihat Semua Barang</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
<section class="hero benefits is-dark is-shadowless is-clipped">
<div class="background is-dark"></div>
<div class="background is-primary is-primary-gradient"></div>
<style>
.benefits svg.fa {
    fill: url(#primarygrad);
}

.comein {
    transform: translateX(-800px);
}

@keyframes comein {
    to {
        transform: translateX(0);
    }
}
</style>
<svg style="width: 0; height: 0; overflow: hidden;">
<defs>
    <linearGradient id="primarygrad" x1="0%" y1="0%" x2="100%" y2="100%">
        <stop offset="0%" style="stop-color:rgb(68,191,212);stop-opacity:1"/>
        <stop offset="100%" style="stop-color:rgb(92,205,195);stop-opacity:1"/>
    </linearGradient>
</defs>
</svg>
<div class="hero-body">
<div class="container">
    <div class="columns is-centered is-vcentered">
        <div class="column is-5 is-4-fullhd" id="hero">
            <a  class="media">
                <figure class="media-left media-primary">
                    <span class="icon is-huge">
                        <i class="fa fa-headphones"></i>
                    </span>
                </figure>
                <div class="media-content media-primary">
                    <h3 class="title is-4">Customer Support</h3>
                    <h4 class="subtitle is-6">Gratis Biaya Konsultasi. Support 24 Jam. Tanpa Hari Libur. </h4>
                </div>
                <figure class="media-left media-alt">
                    <span class="icon is-huge">
                        <i class="fa fa-dashboard"></i>
                    </span>
                </figure>
                <div class="media-content media-alt">
                    <h3 class="title is-4">Fast Respon</h3>
                    <h4 class="subtitle is-6"> Call 0812-8283-1996 .</h4>
                </div>
            </a>
            <a  class="media">
                <figure class="media-left media-primary">
                    <span class="icon is-huge">
                        <i class="fa fa-map-marker"></i>
                    </span>
                </figure>
                <div class="media-content media-primary">
                    <h3 class="title is-4">Lokasi</h3>
                    <h4 class="subtitle is-6">Lokasi Kami berada di pusat kota-jakarta.</h4>
                </div>
                <figure class="media-left media-alt">
                    <span class="icon is-huge">
                        <i class="fa fa-diamond"></i>
                    </span>
                </figure>
                <div class="media-content media-alt">
                    <h3 class="title is-4">Negotiable</h3>
                    <h4 class="subtitle is-6">Harga yang kami berikan sesuai dengan kualitas yang akan anda dapatkan. </h4>
                </div>
            </a>
            <a s class="media">
                <figure class="media-left media-primary">
                    <span class="icon is-huge">
                        <i class="fa fa-shopping-bag"></i>
                    </span>
                </figure>
                <div class="media-content media-primary">
                    <h3 class="title is-4">Stocks Produk</h3>
                    <h4 class="subtitle is-6">Stock Produk Ready dalam Jumlah Besar. </h4>
                </div>
                <figure class="media-left media-alt">
                    <span class="icon is-huge">
                        <i class="fa fa-key"></i>
                    </span>
                </figure>
                <div class="media-content media-alt">
                    <h3 class="title is-4">Quality Products</h3>
                    <h4 class="subtitle is-6">Kualitas Produk kami di cek setiap minggunya.</h4>
                </div>
            </a>
        </div>
        <div class="column is-7 has-text-centered">
            <figure class="image is-16by9">
            <img src="{{asset('images/homesewa.jpg')}}">
            </figure>
        </div>
    </div>
</div>
</div>
</section>

</section>



@endsection
