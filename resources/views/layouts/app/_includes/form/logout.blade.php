<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
   
        <?php  session(['link' => url()->previous()]); ?>
    </form>