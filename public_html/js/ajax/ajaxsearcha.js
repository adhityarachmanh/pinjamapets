$("#barang-form").submit(function() {
    $(this).find("button").addClass("is-loading");
    var elementval = $(this).find("input");

    if (elementval.val().trim().match(/^[a-z0-9\s]{1,20}$/i)) {
        $.ajax({
            type: "GET",
            url: "/api/caribarang",
            timeout: 2000,
            dataType: "json",
            data: {
                q:elementval.val(),
       
            },
            error: function(response, error, exception) {
                barangSetup("Terjadi Kesalahan Dalam Mencari Barang");
            },
            success: function(response) {
                
                var url = "/g/pencarian/"+elementval.val()+"".replace("replaceme", elementval.val().trim().replace(/\s+/, "-"));

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
    $("#barang-form button").removeClass("is-danger");
    $("#barang-form").closest(".container").find(".fieldmsg").removeClass("has-text-danger");
});

barangSetup = function(msg) {
    $("#barang-form button").removeClass("is-loading").addClass("is-danger");
    $("#barang-form").removeClass("shake").closest(".container").find(".fieldmsg").addClass("has-text-danger").html(msg);
    void $("#barang-form")[0].offsetWidth;
    $("#barang-form").addClass("shake").find("input").focus();
    
}
;