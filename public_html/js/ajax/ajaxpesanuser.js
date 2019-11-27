setInterval(function(){
    $.ajax({
url:'/user-pesan/ajax-inbox/sekarang',
type:'GET',

timeout: 2000,
   dataType: "json",
error:function(error){
   console.log(error);
},
success:function(response){

       $('#pesan-muncul').html(response.muncul);
       if(response.noread)
       {
           $('#pesan-unread-wadah').attr('style','display:;');
           $('#pesan-unread-wadah1').attr('style','display:;');
        $('#pesan-unread').attr('data-badge',response.noread);
         // $('#pesan-count').text(response.noread);
        $('#pesan-unread-wadah1').text(response.noread);
       }else{
        $('#pesan-unread-wadah').attr('style','display:none;');
        $('#pesan-unread-wadah1').attr('style','display:none;');
       }
     

}

});
},1000)
