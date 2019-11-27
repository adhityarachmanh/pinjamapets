<footer class="footer">
    <div class="footer-head background is-primary is-primary-gradient is-clipped">
        <span class="cogspin icon is-filled">
            <svg class="fa icon-custom-modio-cog">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-modio-cog"></use>
            </svg>
        </span>
        @if(Auth::guest())
        <div class="container has-text-centered">
            <h4 class="title is-3 is-uppercase">Ingin Menyewa Barang ?</h4>
           
        <a href="{{route('register')}}" class="button is-dark is-medium is-rounded is-padded" >Daftar</a>
        </div>
        @endif
    </div>
    <div class="footer-foot background is-dark">
        <div class="container">
            <div class="columns is-mobile">
                <ul class="column has-text-centered">
                    <li class="footer-title">
                        <a href="/" class="footer-logo">
                            <span class="icon is-huge">
                                <svg class="fa icon-custom-modio" aria-label="mod.io">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-modio"></use>
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li>&nbsp;</li>
                    <li class="footer-social">
                        <a href="https://twitter.com/PinjamApet" class="button is-small is-rounded is-text" target="_blank">
                            <span class="icon is-small">
                                <svg class="fa icon-brands-twitter" aria-label="Twitter">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-brands-twitter"></use>
                                </svg>
                            </span>
                        </a>
                        <a href="https://plus.google.com/+rentaljayaexpress" class="button is-small is-rounded is-text" target="_blank">
                            <span class="icon is-small">
                                <svg class="fa icon-brands-google" aria-label="Google+">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-brands-google"></use>
                                </svg>
                            </span>
                        </a>
                        <a href="https://www.facebook.com/pinjam.apet.3" class="button is-small is-rounded is-text" target="_blank">
                            <span class="icon is-small">
                                <svg class="fa icon-brands-facebook" aria-label="Facebook">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-brands-facebook"></use>
                                </svg>
                            </span>
                        </a>
                    </li>
                </ul>
                
                <ul class="column">
                    <li class="footer-title is-uppercase has-text-weight-bold"></li>
                    <li>
                        <a href="about"></a>
                   
                </ul>
                 <ul class="column">
                    <li class="footer-title is-uppercase has-text-weight-bold"></li>
                    <li>
                        <a href="about"></a>
                   
                </ul>
                 <ul class="column">
                    <li class="footer-title is-uppercase has-text-weight-bold"></li>
                    <li>
                        <a href="about"></a>
                   
                </ul>
                 <ul class="column">
                    <li class="footer-title is-uppercase has-text-weight-bold"></li>
                    <li>
                        <a href="about"></a>
                   
                </ul>
                
            </div>
        </div>
        <div class="container has-text-centered">
            &copy;2019						- <a href="report">Muhammad Faiz Ananda B</a>
            - <a href="terms">Developers</a>
           
        </div>
    </div>
</footer>
