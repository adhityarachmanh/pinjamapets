
$(document).ready(function() {
    $(".navscroll").scrollGuard();

    var sortup = false
      , sortxhr = false;
    Sortable.create($(".fieldsortable")[0], {
        group: {
            name: "games",
            pull: "clone"
        },
        onStart: function(e) {
            $(".tipsy").remove();
            $(".fieldremove").show();
            $(".fieldadd").hide();
            sortup = false;
        },
        onEnd: function(e) {
            $(".fieldremove").hide();
            $(".fieldadd").show();
        },
        onMove: function(e) {
            if ($(".remove", e.to).length > 0) {
                $(".remove", e.to).addClass("is-50x50");
            } else {
                $(".fieldremove .remove.is-50x50").removeClass("is-50x50");
            }
        },
        onUpdate: function(e) {
            sortup = true;
        },
        store: {
            get: function(sortable) {
                return [];
            },
            set: function(sortable) {
                if (sortup) {
                    sortup = false;
                    if (sortxhr) {
                        sortxhr.abort();
                    }

                    sortxhr = $.ajax({
                        type: "POST",
                        url: urlPath("/api/sortable"),
                        timeout: 60000,
                        dataType: "json",
                        data: {
                            ajax: "t",
                            order: sortable.toArray().join(",")
                        },
                        error: function(response, error, exception) {
                            sortxhr = false;
                        },
                        success: function(response) {
                            sortxhr = false;

                            if (response["error"]) {
                                $.achtung({
                                    message: response["text"],
                                    className: "is-danger",
                                    timeout: 10
                                });
                            }
                        }
                    });
                }
            }
        }
    });
    Sortable.create($(".fieldremove")[0], {
        group: "games",
        onAdd: function(e) {
            sortup = true;
            $(e.clone).remove();

            if ($(".field", e.from).length == 0) {
                $(e.from).remove();
            }
        },
    });

    gamefavButton = function(currentoption, response) {
        if (response["success"]) {
            if (response["status"] == 1) {
                currentoption.find("use").attr("xlink:href", "#icon-solid-star");
                $("#appbar .fieldsortable .is-active").removeClass("is-opaque25");
            } else {
                currentoption.find("use").attr("xlink:href", "#icon-light-star");
                $("#appbar .fieldsortable .is-active").addClass("is-opaque25");
            }

            if (response["labels"]["subscribe"]) {
                currentoption.find(".csstooltipside").attr("title", response["labels"]["subscribe"]).trigger("tooltiprefresh");
            }
        }
    }
    ;

    $("#appbar .fieldfav").saveUpdate("subscribe", gamefavButton);
    $("#search").suggestClick("https://mod.io/html/scripts/autocomplete.php?a=search&s=t&p=games&g=1", {
        positionIn: ".fieldsearch .search-suggest",
        limit: 10
    });

    // if ($("#appmenu select").length) {
    //     // firefox fix for broken hover events
    //     $("#appmenu .is-scrollable").hover(function() {
    //         $(this).css("overflow-y", "auto");
    //     });
    //     $("#appcontent").hover(function() {
    //         $("#appmenu .is-scrollable").css("overflow-y", "");
    //     });

    //     $("#appmenu select").change(function() {
    //         var select = $(this);
    //         var filter = $(".filter").find("[name=\"" + select.attr("name") + "\"]");

    //         if (select.attr("name") == "tag[]") {
    //             $("option", select).each(function() {
    //                 selectval = $(this).val().toLowerCase();
    //                 $(".filter").find("input[name=\"tag[]\"]").filter(function() {
    //                     return $(this).val().toLowerCase() == selectval;
    //                 }).remove();
    //             });

    //             if (select.val() != "") {
    //                 $("<input type=\"hidden\" class=\"filtertag\" name=\"tag[]\" value=\"" + select.val() + "\">").on("remove", function() {
    //                     select.val("");
    //                 }).insertBefore(".filter .button:eq(0)");
    //             }
    //         } else if (filter.length > 0) {
    //             filter.val(select.val());
    //         } else if (select.val() != "") {
    //             $("<input type=\"hidden\" class=\"filterfake\" name=\"" + select.attr("name") + "\" value=\"" + select.val() + "\" data-value=\"" + select.find("option:selected").text() + "\">").on("remove", function() {
    //                 select.val("");
    //             }).insertBefore(".filter .button:eq(0)");
    //         }

    //         $(".filter").submit();
    //         return true;
    //     }).each(function() {
    //         var select = $(this);

    //         $(".filter").find("[name=\"" + select.attr("name") + "\"]:not(.filtersetup)").addClass("filtersetup").change(function() {
    //             select.val($(this).val());
    //             $(".filter").submit();
    //             return true;
    //         });
    //     });
    // }

    // $("#appmenu input[type=\"checkbox\"]").change(function() {
    //     var checkbox = $(this);
    //     var filter = $(".filter").find("[name=\"" + checkbox.attr("name") + "\"]");

    //     if (checkbox.is(":checked")) {
    //         if (checkbox.attr("name") == "tag[]") {
    //             $("<input type=\"hidden\" class=\"filtertag\" name=\"tag[]\" value=\"" + checkbox.val() + "\">").on("remove", function() {
    //                 checkbox.prop("checked", false);
    //                 checkbox.closest("a").removeClass("is-active");
    //             }).insertBefore(".filter .button:eq(0)");
    //         } else if (filter.length > 0) {
    //             if (filter.attr("type") == "checkbox") {
    //                 filter.prop("checked", true);
    //             } else {
    //                 checkbox.closest("ul").find(".is-active").each(function() {
    //                     $(this).removeClass("is-active").find("input").prop("checked", false);
    //                 });
    //                 filter.val(checkbox.val());
    //             }
    //         } else if (checkbox.val() != "") {
    //             $("<input type=\"hidden\" class=\"filterfake\" name=\"" + checkbox.attr("name") + "\" value=\"" + checkbox.val() + "\" data-value=\"" + checkbox.parent().find(".value").text() + "\">").on("remove", function() {
    //                 checkbox.prop("checked", false);
    //                 checkbox.closest("a").removeClass("is-active");
    //             }).insertBefore(".filter .button:eq(0)");
    //         }

    //         checkbox.closest("a").addClass("is-active");
    //     } else {
    //         if (checkbox.attr("name") == "tag[]") {
    //             $(".filter").find("input[name=\"tag[]\"]").filter(function() {
    //                 return $(this).val().toLowerCase() == checkbox.val().toLowerCase();
    //             }).remove();
    //         } else if (filter.length > 0) {
    //             if (filter.attr("type") == "checkbox") {
    //                 filter.prop("checked", false);
    //             } else {
    //                 filter.val("");
    //             }
    //         }

    //         checkbox.closest("a").removeClass("is-active");
    //     }

    //     $(".filter").submit();
    //     return true;
    // }).each(function() {
    //     var checkbox = $(this);

    //     $(".filter").find("[name=\"" + checkbox.attr("name") + "\"]:not(.filtersetup)").addClass("filtersetup").change(function() {
    //         var input = $(this);

    //         checkbox.closest("ul").find("a").each(function() {
    //             if (input.val().toLowerCase() == $("input", this).val().toLowerCase()) {
    //                 $(this).addClass("is-active").find("input").prop("checked", true);
    //             } else {
    //                 $(this).removeClass("is-active").find("input").prop("checked", false);
    //             }
    //         });

    //         $(".filter").submit();
    //         return true;
    //     });
    // });

    $("#appmenu input").closest("a").click(function(e) {
        if ($(e.target).attr("type") === undefined) {
            $(this).find("input").prop("checked", !$(this).find("input").is(":checked")).change();
            return false;
        } else {
            return true;
        }
    });

    if ($("#appmenu .navscroll .is-active").length) {
        ammax = ($("#appmenu .navscroll .is-active:eq(0)").offset().top - $("#appmenu .navscroll").offset().top) - 20;
        ammin = (ammax - ($("#appmenu .navscroll").height())) + $("#appmenu .navscroll .is-active:eq(0)").outerHeight(true);
        amoff = $("#appmenu .navscroll .is-active:eq(0)").offset().top;
        amtop = -1;

        if (typeof (Storage) !== "undefined" && sessionStorage.appmenusitearea == "games") {
            if (sessionStorage.appmenuscroll >= ammin && sessionStorage.appmenuscroll <= ammax) {
                amtop = sessionStorage.appmenuscroll;
            }
            sessionStorage.removeItem("appmenuscroll");
        }

        $("#appmenu .navscroll").scrollTop(amtop >= 0 ? amtop : (amoff <= $("#appmenu .navscroll").height() ? 0 : ammax));
    }

    $(window).unload(function() {
        if (typeof (Storage) !== "undefined") {
            sessionStorage.setItem("appmenuscroll", $("#appmenu .navscroll").scrollTop());
            sessionStorage.setItem("appmenusitearea", "games");
        }

        return true;
    });

    $(".navbar-burger").click(function(e) {
        $(".tipsy").remove();
        $(".menuclose").toggleClass("is-hidden");
        $("#appbar,#appmenu,.navbar-burger").toggleClass("is-active");
        $("#appcontent").removeClass("is-active");
    });

    $("body").on("click", function(e) {
        if ($(e.target).closest("#appcontent.is-active").length > 0) {
            $(".navbar-burger").click();
        }
        if ($("#appbar.is-active").length > 0) {
            $("#appcontent").addClass("is-active");
        }
    });

    $(".modstogglepresent").click(function() {
        presentation = $(this).data("presentation") == 1 ? 0 : 1;
        $(this).data("presentation", presentation);
        $.cookie("modspresent", presentation, {
            expires: 90,
            path: "/",
            domain: "mod.io",
            secure: true
        });
        $.achtung({
            message: "Your layout preference has been saved, you will need to <a href=\"javascript:history.go(0)\">reload this page</a> to activate it.",
            className: "is-success",
            timeout: 10
        });

        if (presentation == 1) {
            $(".icon", this).html("<svg class=\"fa icon-light-th-list\"><use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-light-th-list\"></use></svg>");
        } else {
            $(".icon", this).html("<svg class=\"fa icon-light-th\"><use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-light-th\"></use></svg>");
        }

        return false;
    }).data("presentation", "");

    var liveFilterVal = "";
    var liveFilter = function(filterForm) {
        filterTable = filterForm.parent();
        $(".tablebrowse", filterTable).show();
        $(".nomatches", filterTable).hide();
        $(".rowfiltered", filterTable).removeClass(".rowfiltered");
        $(".tabfilter", filterTable).remove();

        if ($("input[type=search]", filterForm).length) {
            $(".rowcontent", filterTable).hide();
            var kw = $("input[type=search]", filterForm).val();

            if (kw.length > 1) {
                var words = kw.split(" ");

                for (word in words) {
                    if (words[word].length > 1) {
                        $(".filtersearch:contains(" + words[word].toLowerCase() + ")", filterTable).closest(".rowcontent").show();
                    }
                }

                buttonFilter(filterForm, $("input[type=search]", filterForm), "Results for \"" + (new Option(kw).innerHTML) + "\"");
            } else {
                $(".rowcontent", filterTable).show();
            }
        } else {
            $(".rowcontent", filterTable).show();
        }

        if ($("input[type=checkbox]", filterForm).length) {
            var temp = "";

            $("input[type=checkbox]:checked", filterForm).each(function() {
                temp += (temp ? "," : "") + ".row" + $(this).attr("name");
            });

            if (temp != "") {
                $(".rowcontent", filterTable).not(temp).hide();
            }
        }

        $(".filtertag", filterForm).each(function() {
            var val = $(this).val();
            $(".filtersearch:not(:contains(tag:" + val.toLowerCase() + ":))", filterTable).closest(".rowcontent").hide();
            buttonFilter(filterForm, $(this), val);
        });

        $(".filterfake", filterForm).each(function() {
            var val = $(this).val();
            if ((val == parseInt(val)) || val.match(/^[a-z0-9_-]+$/i)) {
                $(".rowcontent", filterTable).not(".row" + $(this).attr("name") + val.toLowerCase()).hide();
                buttonFilter(filterForm, $(this), $(this).data("value"));
            }
        });

        $("select", filterForm).each(function() {
            var val = $(this).val();
            if ((val == parseInt(val)) || val.match(/^[a-z0-9_-]+$/i)) {
                $(".rowcontent", filterTable).not(".row" + $(this).attr("name") + val.toLowerCase()).hide();
                buttonFilter(filterForm, $(this), $("option:selected", this).text());
            }
        });

        if ($(".rowcontent:visible", filterTable).length) {
            $(".rowcontent:visible", filterTable).eq(0).addClass("rowfiltered");
        } else {
            $(".tablebrowse", filterTable).hide();
            $(".nomatches", filterTable).show();
        }

        $(".tabcount", filterTable).text($(".rowcontent:visible", filterTable).length + " of " + $(".rowcontent:visible", filterTable).length);
    };

    var buttonFilter = function(filterForm, field, value) {
        if (!field.hasClass("notoggle")) {
            filterTable = filterForm.parent();
            clone = $("<li class=\"tabfilter\"><a href=\"#\" class=\"background is-success\"><span></span><button class=\"icon delete is-small\"></button></a></li>");
            clone.find("a").data("key", field.attr("name")).find("span:eq(0)").html(value);
            clone.insertBefore($(".tabtitle", filterTable));
        }
    };

    $(".tabs").on("click", ".tabfilter a", function() {
        val = $("span:eq(0)", this).html();
        field = $(".filter").find("input[name=\"" + $(this).data("key") + "\"],select[name=\"" + $(this).data("key") + "\"]");
        filterForm = field.closest(".filter");

        field.each(function() {
            if ($(this).attr("type") == "hidden") {
                if ($(this).val() == val || $(this).data("value")) {
                    $(this).trigger("remove").remove();
                }
            } else {
                $(this).val("").trigger("change");
            }
        });

        liveFilter(filterForm);
        return false;
    });

    $(".filter").submit(function(e) {
        liveFilter($(this));
        e.preventDefault();
        return false;
    });

    $(".filterreset").click(function() {
        filterForm = $(this).closest(".body").find(".filter");
        $("input[type=search],select", filterForm).val("");
        $("input[type=checkbox]", filterForm).prop("checked", false);
        liveFilter(filterForm);
        return false;
    });

    $(".filter select").change(function() {
        liveFilter($(this).closest(".filter"));
    });

    $(".filter input[type=checkbox]").change(function() {
        liveFilter($(this).closest(".filter"));
    });

    $(".filter input[type=search]").on("keyup search change", function() {
        if (liveFilterVal != $(this).val()) {
            liveFilterVal = $(this).val();
            liveFilter($(this).closest(".filter"));
        }
    });
    $(".filter1").submit();

    $(".filter .showall").click(function() {
        var filter = $(this).closest(".filter").toggleClass("has-addons");

        if ($(".has-addons", filter).length) {
            $(".input,.select", filter).removeClass("is-fullwidth");
            $(".control", filter).unwrap(".fieldtemp");
            $(".fieldtemp", filter).remove();
            $(".button", filter).closest(".control").appendTo(filter);
            $(this).find("use").attr("xlink:href", "#icon-light-bars");
        } else {
            $(".input,.select", filter).addClass("is-fullwidth");
            $(".control", filter).wrap("<div class=\"field fieldtemp\"></div>");
            $(".button", filter).closest(".control").appendTo($(".input:eq(0)", filter).closest(".field").addClass("has-addonstoggle"));
            $(this).find("use").attr("xlink:href", "#icon-light-times");
        }

        $(".is-hidden-tiny,.is-hidden-tinyalt", filter).toggleClass("is-hidden-tiny").toggleClass("is-hidden-tinyalt");
        $(".is-hidden-mobile,.is-hidden-mobilealt", filter).toggleClass("is-hidden-mobile").toggleClass("is-hidden-mobilealt");
        $(".is-hidden-touch,.is-hidden-touchalt", filter).toggleClass("is-hidden-touch").toggleClass("is-hidden-touchalt");
        $(".is-hidden-desktop-only,.is-hidden-desktop-onlyalt", filter).toggleClass("is-hidden-desktop-only").toggleClass("is-hidden-desktop-onlyalt");
        $(".is-hidden-tablet-only,.is-hidden-tablet-onlyalt", filter).toggleClass("is-hidden-tablet-only").toggleClass("is-hidden-tablet-onlyalt");
        $(".is-narrowwidth,.is-togglewidth", filter).toggleClass("is-narrowwidth").toggleClass("is-togglewidth");
        $(".has-addons,.has-addonstoggle", filter).toggleClass("has-addons").toggleClass("has-addonstoggle");

        return false;
    });

    viewBrowse = function(currentoption, response) {
        if (response["success"]) {
            if (response["action"] == "pin" && response["pinned"]) {
                currentoption.closest(".row").hide().prependTo(currentoption.closest(".tablebrowse")).fadeIn();
            } else if (response["action"] == "delete" || response["action"] == "unsubscribe") {
                currentbody = currentoption.closest(".body");

                if (currentoption.closest(".row").is("tr")) {
                    currentoption.closest(".row").children("td, th").animate({
                        padding: 0
                    }).wrapInner("<div />").children().slideUp(function() {
                        $(this).closest("tr").remove();
                    });
                } else {
                    currentoption.closest(".row").slideUp(400, function() {
                        $(this).remove();
                    });
                }

                setTimeout(function() {
                    if (!currentbody.find(".rowcontent:visible").length) {
                        currentbody.find(".nomatches").show();
                    }
                }, 401);
            } else if (typeof response["permission"] !== "undefined") {
                statusbox = currentoption.closest(".row").removeClass("rowpermission0").removeClass("rowpermission1").removeClass("rowpermission2").removeClass("rowpermission3").removeClass("rowpermission4").addClass("rowpermission" + response["permission"]).find(".statusbox").removeClass("is-text").removeClass("is-warning").removeClass("is-danger").removeClass("is-primary").removeClass("is-light");
                // is-primary used to be is-info
                title = currentoption.closest(".row").find(".titletable:last").removeClass("is-opaque50").removeClass("has-text-warning").removeClass("has-text-danger");
                title.find(".icon.is-pulled-left").hide();

                if (response["permission"] == 1) {
                    statusbox.addClass("is-text");
                } else if (response["permission"] == 2) {
                    statusbox.addClass("is-dark").find(".icon.is-pulled-left").show().find("use").attr("xlink:href", "#icon-solid-archive");
                } else if (response["permission"] == 3) {
                    statusbox.addClass("is-danger");
                    title.addClass("has-text-danger").find(".icon.is-pulled-left").show().find("use").attr("xlink:href", "#icon-solid-trash-alt");
                } else if (response["permission"] == 4) {
                    statusbox.addClass("is-warning");
                    title.addClass("has-text-warning").find(".icon.is-pulled-left").show().find("use").attr("xlink:href", "#icon-solid-ban");
                } else {
                    statusbox.addClass("is-light");
                    title.addClass("is-opaque50").find(".icon.is-pulled-left").show().find("use").attr("xlink:href", "#icon-solid-clock");
                }
            }
        }
    }
    ;

    subscribeButton = function(currentoption, response) {
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

