$("#barang-form").submit(function() {
    
    $(this).find(".icon").addClass("is-loading");
    
    
        
    var elementval = $(this).find("input");
    
    if (elementval.val().trim().match(/^[a-z0-9\s]{1,20}$/i)) {
      
  
        $.ajax({
            type: "GET",
            url: "/admin/manage-carisewa",
            timeout: 2000,
            dataType: "json",
            data: {
                sewa:elementval.val(),
       
            },
            error: function(response, error, exception) {
                barangSetup("Terjadi Kesalahan Dalam Mencari Sewa");
                console.log(response);
            },
            success: function(response) {
                
                var url = "/admin/manage-pencarian-sewa/"+elementval.val()+"".replace("replaceme", elementval.val().trim().replace(/\s+/, "-"));

                if (response.data!="" && response.data!=null) {
                    window.location = url;
                } else {
                    barangSetup("<a href=\"#\">Pencarian \"<span style=\"color:#44bfd5;\">" + elementval.val() + "</span>\" Tidak Ada</a>");
                    
                }
            }
        });
    } else {
        barangSetup("Format Input <span style='color:#44bfd5;'>Angka</span> dan <span style='color:#44bfd5;'>Huruf</span> Saja, <span style='color:#44bfd5;'>Simbol</span> Tidak Di Perbolehkan !!!");
    }

    return false;
});
$("body").on("click", ".toggleadd", function() {
    $(".menuadd").removeClass("is-hoverable").on("mouseenter", function() {
        $(this).addClass("is-hoverable").off();
    });
    $("#barang-form .input").focus();
    return false;
});

$("#barang-form .input").on("change", function() {
    $("#barang-form span").removeClass("is-danger");
    $("#barang-form").closest(".container").find(".fieldmsg").removeClass("has-text-danger");
});

barangSetup = function(msg) {
    $("#barang-form span").removeClass("is-loading").addClass("is-danger");
    $("#barang-form").removeClass("shake").closest(".wadah").find(".fieldmsg").addClass("has-text-danger").html(msg);
    void $("#barang-form")[0].offsetWidth;
    $("#barang-form").addClass("shake").find("input").focus();
   
 
};


