@if(Auth::User()->status_login=="facebook")
<span class="icon">
    <svg class="fa icon-brands-facebook" aria-label="Facebook">
       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-brands-facebook"></use>
    </svg>
 </span>
@elseif(Auth::User()->status_login=="google")

       <span class="icon">
          <svg class="fa icon-brands-google" aria-label="Google">
             <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-brands-google"></use>
          </svg>
       </span>
@elseif(Auth::User()->status_login=="instagram")

          <span class="icon" style="width:35px;">
          <img src="{{asset('images/instagram.png')}}" alt="">
          </span>


 @endif