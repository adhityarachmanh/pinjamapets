@if(Session::has('berhasil'))
<div id="achtung-overlay">
            <div class="is-success achtung notification" style="display: block;" id="notifs">
                  <button id="del" class="delete"></button>
            <span class="achtung-message is-large" style="text-shadow: 0 0 3px #FF0000;">{{Session::get('berhasil')}}</span>
            </div>
      </div>
@elseif(Session::has('warning'))
<div id="achtung-overlay">
            <div class="is-warning achtung notification" style="display: block;" id="notifs">
                  <button id="del" class="delete"></button>
                  <span class="achtung-message is-large">{{Session::get('warning')}}</span>
            </div>
      </div>
@elseif(Session::has('gagal'))
<div id="achtung-overlay">
            <div class="is-danger achtung notification" style="display: block;" id="notifs">
                  <button id="del" class="delete"></button>
                  <span class="achtung-message is-large">{{Session::get('gagal')}}</span>
            </div>
      </div>
@endif

      <script>
            $('#del').on('click',function(){
                 $('#notifs').attr('style','display:none;');
            });
      </script>