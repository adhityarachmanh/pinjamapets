@extends('layouts.manage')
@section('content')

       <nav class="navbar is-primary">
           <div class="navbar-brand">
               <a href="https://mod.io" class="navbar-item is-paddingless">
                   <span class="icon is-large">
                       <svg class="fa icon-custom-modio" aria-label="mod.io">
                           <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-modio"></use>
                       </svg>
                   </span>
               </a>
           </div>
       </nav>
       <div class="navscroll is-scrollable inverttooltips">
           <div class="navscroll-content">
               <div class="field fieldsortable is-marginless">
                     <a href="https://apps.mod.io" data-id="1" class="field is-active">
                        <span class="image csstooltipside is-32x32" title="Apps">
                        <img src="{{asset('images/shopping-bag.png')}}" >
                        </span>
                    </a>
                   <div class="field fieldfake" data-id="fake"></div>
               </div>
               <div class="field fieldremove">
                   <span class="image remove is-32x32">
                       <span class="icon is-medium is-centered-text">
                           <svg class="fa icon-light-times" aria-label="Remove shortcut">
                               <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-times"></use>
                           </svg>
                       </span>
                   </span>
               </div>
              
           </div>
       </div>
   </div>
   <div id="appmenu" class="background is-dark">
       <nav class="navbar">
           <div class="navbar-brand">
               <a href="https://apps.mod.io" class="navbar-item navbar-logo">
                   <img src="{{asset('images/logo.png')}}" alt="Apps">
               </a>
           </div>
       </nav>
       <div class="navscroll is-scrollable">
           <div class="navscroll-content">
           
               <div class="field fieldsearch">
                   <form action="" id="search-form" method="get">
                       <div class="field">
                           <p class="control has-icons-right is-dark">
                               <input type="search" name="q" maxlength="500" value="" id="search" class="input" placeholder="Search" required="required">
                               <span class="icon is-small is-right">
                                   <svg class="fa icon-light-search" aria-label="Search">
                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-search"></use>
                                   </svg>
                               </span>
                           </p>
                       </div>
                   </form>
                   <div class="search-suggest" style="position:relative"></div>
               </div>
               <div class="field">
                   <aside class="menu inverttooltips">
                       <ul class="menu-list">
                           <li class="blockmenu">
                               <a href="https://apps.mod.io" class="is-active  is-embed">
                                   <span class="count tag is-pulled-right is-dark">6</span>
                                   Apps
                               </a>
                           </li>
                           
                           <li class="filtermenu ">
                               <a class="is-sublabel">Engines</a>
                               <ul>
                                   <li>
                                       <a href="http://localhost:8000/pencarian/samsungfilter=t&amp;tag[]=Samsung">
                                           <span class="count tag is-pulled-right is-dark">2</span>
                                           <input type="checkbox" name="tag[]" value="Samsung">Samsung
                                       </a>
                                   </li>
                                   <li>
                                       <a href="https://apps.mod.io?filter=t&amp;tag[]=Unreal">
                                           <span class="count tag is-pulled-right is-dark">2</span>
                                           <input type="checkbox" name="tag[]" value="Unreal">Unreal
                                       </a>
                                   </li>
                                   <li>
                                       <a href="https://apps.mod.io?filter=t&amp;tag[]=GameMaker">
                                           <span class="count tag is-pulled-right is-dark">2</span>
                                           <input type="checkbox" name="tag[]" value="GameMaker">GameMaker
                                       </a>
                                   </li>
                                   <li>
                                       <a href="https://apps.mod.io?filter=t&amp;tag[]=RPGMaker">
                                           <span class="count tag is-pulled-right is-dark">1</span>
                                           <input type="checkbox" name="tag[]" value="RPGMaker">RPGMaker
                                       </a>
                                   </li>
                                   <li>
                                       <a href="https://apps.mod.io?filter=t&amp;tag[]=Source">
                                           <span class="count tag is-pulled-right is-dark">1</span>
                                           <input type="checkbox" name="tag[]" value="Source">Source
                                       </a>
                                   </li>
                                   <li>
                                       <a href="https://apps.mod.io?filter=t&amp;tag[]=Lumberyard">
                                           <span class="count tag is-pulled-right is-dark">2</span>
                                           <input type="checkbox" name="tag[]" value="Lumberyard">Lumberyard
                                       </a>
                                   </li>
                               </ul>
                           </li>
                         
                       </ul>
                      
                       <p class="menu-label truncate">Community</p>
                       <ul class="menu-list">
                           <li>
                               <a href="https://apps.mod.io/contact">Contact</a>
                           </li>
                       </ul>
                   </aside>
               </div>
               <footer class="footer is-size-7 is-hidden-mobile has-text-centered">
                   <a href="https://mod.io">&copy;2019 mod.io</a>
                   <div>
                       <a href="https://mod.io/about">About</a>
                       -
      <a href="https://mod.io/report/widget" class="thickbox" rel="iframe=true;innerHeight=700;innerWidth=800" target="_self">DMCA</a>
                       -
      <a href="https://mod.io/terms/widget" class="thickbox" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Terms</a>
                       -
      <a href="https://mod.io/privacy/widget" class="thickbox" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Privacy</a>
                   </div>
               </footer>
           </div>
       </div>
   </div>
   <div id="appcontent" class="background is-dark">
       <nav class="navbar navbartooltips has-shadow is-dark-mobile">
           <div class="navbar-brand">
               <a href="https://apps.mod.io" class="navbar-item navbar-logo is-hidden-tablet" style="margin-right: auto;">
                   <img src="https://image.mod.io/games/c4ca/1/apps.png" alt="Apps">
               </a>
               <a href="https://mod.io/members/adhityarachman58" class="navbar-item is-paddingleft is-hidden-tablet">adhityarachman58</a>
               <div class="navbar-burger burger" style="margin-left: 0;">
                   <span></span>
                   <span></span>
                   <span></span>
               </div>
           </div>
           <div class="navbar-menu">
               <div class="navbar-start">
                   <a class="navbar-item is-paddingless" href="https://mod.io">
                       <span class="icon">
                           <svg class="fa icon-light-home" aria-label="Home">
                               <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-home"></use>
                           </svg>
                       </span>
                   </a>
                   <a class="navbar-item" href="https://mod.io/games">Games</a>
                   <span class="navbar-item is-paddingless">/</span>
                   <a class="navbar-item" href="https://apps.mod.io">Apps</a>
               </div>
          
               <div class="navbar-end">
                   <div class="navbar-item has-dropdown is-hoverable">
                      @if(Auth::guest())
                      <a href="https://mod.io/members/login/widget" class="navbar-item thickbox is-hidden-tablet is-guest" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Login</a>
                      <a href="https://mod.io/members/register/widget" class="navbar-item thickbox is-hidden-tablet is-guest" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Sign Up</a>
                      <div class="navbar-item is-hidden-mobile is-paddingless is-guest">
                         <a href="https://mod.io/members/login/widget" class="button thickbox is-text is-nolink is-uppercase" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self"><span class="icon is-small"><svg class="fa icon-light-sign-in"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-sign-in"></use></svg></span><span>Login</span></a>
                      </div>
                      <span class="navbar-item is-hidden-mobile is-paddingless is-guest">atau</span>
                      <div class="navbar-item is-hidden-mobile is-paddingleft is-guest">
                         <a href="https://mod.io/members/register/widget" class="button thickbox is-primary is-uppercase" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Sign Up</a>
                      </div>
                             
                      @else
                       <a href="https://mod.io/members/adhityarachman58" class="navbar-item is-paddingleft">
                           adhityarachman58												
                           <figure class="avatar image is-top is-32x32 is-hidden-mobile">
                               <img src="https://thumb.mod.io/members/a4a2/34653/crop_50x50/avatar.jpg" srcset="https://thumb.mod.io/members/a4a2/34653/crop_100x100/avatar.jpg 2x" alt="adhityarachman58">
                           </figure>
                       </a>
                       <div class="navbar-dropdown is-boxed is-right">
                           <a href="https://mod.io/messages/inbox" class="navbar-item">
                               <span class="messagescount allowzero">0</span>
                               &nbsp;messages
                           </a>
                           <a href="https://mod.io/messages/updates" class="navbar-item">
                               <span class="updatescount allowzero">0</span>
                               &nbsp;updates
                           </a>
                           <a href="https://mod.io/members/adhityarachman58/edit" class="navbar-item">Profile</a>
                           <a href="https://mod.io/members/logout" class="navbar-item">Logout</a>
                       </div>
                       @endif
                   </div>
               </div>
           </div>
       </nav>
       
       <section class="wrapper">
           <section class="section">
               <div class="container is-fluid">
                   <div class="columns columnsholder is-block">
                       <div class="column columnfull">
                           <div class="notification tooltip is-light">
                               <button class="delete"></button>
                               <div class="content">
                                   <p>
                                       Made a brilliant tool that makes supporting mod.io in Unity, Unreal or another engine easy? <a href="https://apps.mod.io/add">Share it here</a>
                                       . Our SDK is <a href="https://sdk.mod.io" target="_blank">open source</a>
                                       and accessible via <a href="https://mod.io/apikey/widget" class="thickbox" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">OAuth or APIkey</a>
                                       (experiment on our private <a href="https://test.mod.io">test environment</a>
                                       ). We encourage all developers to share the tools they build, and are working on plugins for popular engines to make integration as easy as plug'n'play. Interested in helping? Reach out <a href="mailto:developers@mod.io?subject=Create%20mod.io%20tool">developers@mod.io</a>
                                       we'd love to chat and support your work.
                                   </p>
                               </div>
                           </div>
                           <div class="normalbox browsebox">
                               <div class="normalcorner">
                                   <div class="field has-addons">
                                       <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left">Apps</h1>
                                       <p class="control">
                                           <a href="https://apps.mod.io/add" class="button csstooltip is-dark is-large addicon" title="Add app">
                                               <span class="icon ">
                                                   <svg class="fa icon-light-plus">
                                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-plus"></use>
                                                   </svg>
                                               </span>
                                           </a>
                                       </p>
                                       <p class="control">
                                           <a href="https://rss.mod.io/games/apps/feed/rss.xml" target="_blank" class="button csstooltip is-dark is-large rssicon" title="RSS">
                                               <span class="icon ">
                                                   <svg class="fa icon-light-rss">
                                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-rss"></use>
                                                   </svg>
                                               </span>
                                           </a>
                                       </p>
                                       <p class="control">
                                           <a href="#" class="button csstooltip is-dark is-large presenticon modstogglepresent" rel="nofollow" title="Change layout">
                                               <span class="icon ">
                                                   <svg class="fa icon-light-th">
                                                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-th"></use>
                                                   </svg>
                                               </span>
                                           </a>
                                       </p>
                                   </div>
                               </div>
                               <form action="https://apps.mod.io" name="filterform" class="field filter filter1 has-addons" method="get">
                                   <p class="control is-expanded">
                                       <input type="hidden" name="filter" value="t">
                                       <input type="search" name="kw" maxlength="50" id="modsfilterkw" class="input inputkw" value="" placeholder="Search" autocomplete="off" size="40">
                                   </p>
                                   <p class="control is-hidden-touch">
                                       <span class="select">
                                           <select name="timeframe">
                                               <option value="" selected="selected">Date added</option>
                                               <option value="1">Past 24hours</option>
                                               <option value="2">Past week</option>
                                               <option value="3">Past month</option>
                                               <option value="4">Past year</option>
                                               <option value="5">Year or older</option>
                                           </select>
                                       </span>
                                   </p>
                                   <p class="control is-hidden-tablet is-hidden-mobile is-expanded is-narrowwidth">
                                       <span class="select">
                                           <select name="reason">
                                               <option value="" selected="selected">I've</option>
                                               <option value="developed">Developed</option>
                                               <option value="subscribed">Subscribed</option>
                                               <option value="visited">Visited</option>
                                               <option value="rated">Rated</option>
                                               <option value="mature">Mature content</option>
                                           </select>
                                       </span>
                                   </p>
                                   <p class="control"></p>
                                   <p class="control is-hidden-desktop">
                                       <span class="button showall">
                                           <span class="icon is-small">
                                               <svg class="fa icon-light-bars" aria-label="Advanced">
                                                   <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-bars"></use>
                                               </svg>
                                           </span>
                                       </span>
                                   </p>
                                   <p class="control">
                                       <button type="submit" name="" value="Search" class="button is-primary">
                                           <span class="icon is-small">
                                               <svg class="fa icon-light-search" aria-label="Search">
                                                   <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-search"></use>
                                               </svg>
                                           </span>
                                       </button>
                                   </p>
                               </form>
                               <div class="tabs tabsfilter is-opposite is-boxed is-right">
                                   <ul>
                                       <li class="tabtitle">
                                           <div class="tabcount">6 of 6</div>
                                       </li>
                                       
                                   </ul>
                               </div>
                               <div class="body">
                                   <div class="tablegrid tablebrowse columns is-multiline is-mobile">
                                      <!--fetch data barang-->
                                     @foreach($datas as $b)
                                       <div class="column row rowcontent is-dynamic rowtimeframe4">
                                             <div class="card is-fullwidth">
                                                 <div class="card-image">
                                                     <div class="card-actions field inverttooltips has-addons">
                                                         <p class="control">
                                                             <a href="https://mod.io/messages/ajax/action/?action=subscribe&amp;sitearea=mods&amp;siteareaid=138" rel="nofollow" class="button subscribebutton csstooltip is-small is-danger" title="Subscribe">
                                                             <span class="subscribecount local">{{$b->merk}}</span>
                                                                 
                                                             </a>
                                                         </p>
                                                     </div>
                                                     <a href="https://apps.mod.io/haxe-wrapper" class="image is-16by9">
                                                     <img src="{{asset("images/items/$b->kategori/$b->merk/$b->gambar")}}" alt="HAXE Wrapper">
                                                         <span class="card-overlay is-overlay is-scrollable is-hidden-touch has-text-justified">
                                                         <p class="m-t-30">{{$b->deskripsi}}</p>
                                                             <br>
                                                         <div class="tags"><span class="tag is-opaque50">{{$b->merk}}</span></div>                                                             
                                                         </span>
                                                     </a>
                                                 </div>
                                                 <header class="card-header">
                                                     <a href="https://apps.mod.io/haxe-wrapper" class="card-header-title">
                                                     <span class="truncate">{{$b->nama}}</span>
                                                     </a>
                                                    
                                                 </header>
                                                
                                             </div>
                                         </div>
                                      @endforeach
                                     
                                   </div>
                                   <div class="content nomatches" style="display: none;">
                                       <p>
                                           Tidak Ada Barang 
                                       </p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
       </section>
    

    
@endsection
