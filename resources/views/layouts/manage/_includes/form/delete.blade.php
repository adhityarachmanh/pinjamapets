<form id="hapus-sewa" action="{{ route('sewa.destroy',$id) }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        {{method_field('DELETE')}}
    </form>