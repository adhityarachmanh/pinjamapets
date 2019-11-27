$(document).ready(function() {
    registerMessage = function(event) {
        if (event.data.registration) {
            $(".is-guest").remove();
            $(".navbar-end").append("<a href=\"" + event.data.registration[0] + "\" class=\"navbar-item\">" + event.data.registration[1] + "</a>");
            window.removeEventListener("message", registerMessage, false);
        }
    }
    ;

    window.addEventListener("message", registerMessage, false);

    $(".navbar-burger").click(function() {
        $(".tipsy").remove();
        $(".navbar-burger,.navbar-menu").toggleClass("is-active");

        if ($(".navbar-burger").hasClass("is-active")) {
            $(".navbar-search").prependTo(".navbar-start");
        } else {
            $(".navbar-search").prependTo(".navbar-end");
        }
    });
    $("#search").suggestClick("", {
        positionIn: ".fieldsearch .search-suggest",
        limit: 20
    });
//resposne pencarian
   

    // var homedefault = $(".hero-foot .columns:first-child").html()
    //   , homerun = false;

    // $(".hero-foot").on("click", ".button", function() {
    //     $(".hero-foot .buttonpulse span").remove();
    //     var columns = $(".hero-foot .columns:first-child");

        // if ($("#howdoesitwork").hasClass("is-active")) {
        //     columns.html(homedefault);
        //     $(".hero-foot .columns:last-child").slideUp();
        //     $("#howdoesitwork").removeClass("is-active").removeClass("is-running").text("How does it work");
        // } else if (!$("#howdoesitwork").hasClass("is-running")) {
        //     $("#howdoesitwork").addClass("is-running").text("Add your game");
        //     column = columns.find(".column:eq(0)").addClass("is-active");
        //     temp = column.find(".iconbg").clone();
        //     column.find(".iconbg").replaceWith(temp.addClass("spin"));
        //     column.find(".icon.is-centered-text").html("<svg class=\"fa icon-light-gamepad\"><use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-light-gamepad\"></use></svg>");
        //     column.find(".title").text("1. Add your game");
        //     column.find(".subtitle").html("Create your <a href=\"\" class=\"toggleadd\">games profile</a> on mod.io (or our <a href=\"https://test.mod.io\" target=\"_blank\">test env</a>), and take a peek at all we have to offer.");

        //     setTimeout(function() {
        //         $("#howdoesitwork").text("Integrate the SDK");
        //         column = columns.find(".column:eq(1)").addClass("is-active");
        //         temp = column.find(".iconbg").clone();
        //         column.find(".iconbg").replaceWith(temp.addClass("spin"));
        //         column.find(".icon.is-centered-text").html("<svg class=\"fa icon-light-code\"><use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-light-code\"></use></svg>");
        //         column.find(".title").text("2. Integrate the SDK");
        //         column.find(".subtitle").html("Drop <a href=\"https://sdk.mod.io\" class=\"slidetotools\">the SDK</a> into your game or connect directly <a href=\"https://docs.mod.io\">to our API</a>, no client needed.");
        //     }, homerun ? 0 : 2000);

        //     setTimeout(function() {
        //         $("#howdoesitwork").text("Accept mods");
        //         column = columns.find(".column:eq(2)").addClass("is-active");
        //         temp = column.find(".iconbg").clone();
        //         column.find(".iconbg").replaceWith(temp.addClass("spin"));
        //         column.find(".icon.is-centered-text").html("<svg class=\"fa icon-light-cog\"><use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-light-cog\"></use></svg>");
        //         column.find(".title").text("3. Accept mods");
        //         column.find(".subtitle").html("Connect your mod making tools submission flow <a href=\"https://apps.mod.io/guides/getting-started\">to mod.io</a>, and let the mods roll in.");
        //     }, homerun ? 0 : 4000);

        //     setTimeout(function() {
        //         $("#howdoesitwork").addClass("is-active").removeClass("is-running").text("Follow the steps above");
        //         $(".hero-foot .columns:last-child").slideDown();
        //         $(".iconbg.spin").removeClass("spin");
        //         homerun = true;
        //     }, homerun ? 0 : 6000);
        // }

        // return false;
    // });

    $(".tablegrid.is-slick1").slick({
        rows: 1,
        infinite: true,
        autoplay: true,
        centerMode: true,
        variableWidth: true,
        lazyLoad: "progressive",
        prevArrow: "<div class=\"slick-prev\"><button type=\"button\" class=\"button is-white is-large is-rounded is-hidden-touch\"><span class=\"icon\"><svg class=\"fa icon-light-chevron-left\"><use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-light-chevron-left\"></use></svg></span></button></div>",
        nextArrow: "<div class=\"slick-next\"><button type=\"button\" class=\"button is-white is-large is-rounded is-hidden-touch\"><span class=\"icon\"><svg class=\"fa icon-light-chevron-right\"><use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-light-chevron-right\"></use></svg></span></button></div>"
    });

    subscribeButtonsubscribeButton = function(currentoption, response) {
        if (response["success"]) {
            if (response["status"] == 1) {
                currentoption.find("use").attr("xlink:href", "#icon-light-eye-slash");
                currentoption.closest(".field").find(".controlsocial").removeClass("is-hidden");
                if (!currentoption.closest(".field").hasClass("has-addons")) {
                    currentoption.closest(".field").addClass("has-addons").addClass("has-addons-temp");
                }

                if (currentoption.data("icon") && $("#appbar .fieldsortable a[data-id=" + currentoption.data("id") + "]").length == 0) {
                    $("#appbar .fieldsortable .fieldfake").before("<a href=\"" + currentoption.data("url") + "\" data-id=\"" + currentoption.data("id") + "\" class=\"field\"><span class=\"image csstooltipside is-32x32\" title=\"" + currentoption.data("name") + "\"><img src=\"" + currentoption.data("icon") + "\" alt=\"" + currentoption.data("name") + "\"></span></a>");
                }
            } else {
                currentoption.find("use").attr("xlink:href", "#icon-light-eye");
                currentoption.closest(".field").find(".controlsocial").addClass("is-hidden");
                if (currentoption.closest(".field").hasClass("has-addons-temp")) {
                    currentoption.closest(".field").removeClass("has-addons").removeClass("has-addons-temp");
                }

                if (currentoption.data("icon")) {
                    $("#appbar .fieldsortable a[data-id=" + currentoption.data("id") + "]").remove();
                }
            }

            if (response["labels"]["subscribe"]) {
                currentoption.attr("title", response["labels"]["subscribe"]).trigger("tooltiprefresh");

            }

            currentoption.toggleClass("is-success").toggleClass("is-danger");
        }
    }
    ;

    $(".subscribebutton").saveUpdate("subscribe", subscribeButton);

    $.fn.visible = function(partial) {
        var $t = $(this)
          , $w = $(window)
          , viewTop = $w.scrollTop()
          , viewBottom = viewTop + $w.height()
          , _top = $t.offset().top
          , _bottom = _top + $t.height()
          , compareTop = partial === true ? _bottom : _top
          , compareBottom = partial === true ? _top : _bottom;

        return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
    }
    ;

    $(".benefits .media").css("opacity", 0);
    var lastbenefit = 0;

    $(window).on("scroll.comein", function() {
        if ($(".button.is-dark:not(.is-ignored):eq(0)").visible()) {
            $(".buttonpulse .pulse").remove();
        }

        $(".benefits .media:not(.comedone)").each(function(i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("comedone");

                if (lastbenefit == 0 || (lastbenefit + 250) < (new Date().getTime())) {
                    lastbenefit = new Date().getTime();
                    var nextbenefit = 0;
                } else {
                    var nextbenefit = (lastbenefit + 250) - (new Date().getTime());
                    lastbenefit = new Date().getTime() + nextbenefit;
                }

                setTimeout(function() {
                    el.css("animation", "comein 0.6s ease forwards").addClass("comein").css("opacity", 1);
                    if ($(".benefits .media").length == $(".benefits .media.comein").length) {
                        $(window).unbind("scroll.comein");
                    }
                }, nextbenefit);
            }
        });
    });

    $("body").on("click", ".slidetotools", function() {
        $("html,body").animate({
            scrollTop: $("#sdktools").closest("section").position().top
        }, 500);
        return false;
    });

    $(".card-image").each(function() {
        actions = $(".card-actions", this);
        $(".card-overlay", this).prepend($("<span>").css({
            display: "block",
            float: "right",
            height: actions.height() + "px",
            width: actions.width() + "px",
            marginbottom: "0.75rem",
            marginleft: "0.75rem"
        }));
    });
});