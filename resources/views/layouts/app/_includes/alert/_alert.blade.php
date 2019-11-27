
@if(Session::has('berhasil'))

<script>

var text = "{{Session::get('berhasil')}}"
Swal.fire({
  title: "Success",
  text: text,
  icon: "success",
  successMode: true,
  timer: 3000
});


</script>
@endif






