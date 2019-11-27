function urlPath(urlstr) {
    if (urlstr.indexOf("://") >= 0) {
        urlstr = urlstr.substring(urlstr.indexOf("://") + 3);
        urlstr = urlstr.indexOf("/") ? urlstr.substring(urlstr.indexOf("/")) : "/";
    }
    return urlstr;
}

function saveUpdate(element, action, callback, confirmtxt, microtimeout) {
    if (!element.hasClass('button')) {
        elementbtn = element.find(".button.is-primary") || element.find(".button") || element;
    } else {
        elementbtn = element;
    }
    var doupdate = true,
        datastr = "";
    if (confirmtxt && !element.data("confirmed")) {
        element.data("confirmed", true);
        if (confirmtxt.match(/your reason|following reason/)) {
            str = prompt(confirmtxt);
            if (str) {
                datastr = "&arcmsg=" + encodeURI(str);
            } else if (str != "") {
                doupdate = false;
            }
        } else {
            doupdate = confirm(confirmtxt);
        }
    }
    if (doupdate) {
        if (!elementbtn.hasClass('is-loading')) {
            elementbtn.addClass('is-loading');
            if (element.attr('href').indexOf('?') > 0) {
                var arguments = element.attr('href').split('?');
                var urlstr = arguments[0];
                var datastr = datastr + "&" + arguments[1].replace(/#.*$/, "");
            } else {
                var urlstr = element.attr('href');
            }
            $.ajax({
                type: 'POST',
                url: urlPath(urlstr),
                timeout: (microtimeout ? microtimeout : 60000),
                dataType: 'json',
                data: "ajax=t" + datastr,
                error: function(response, error, exception) {
                    elementbtn.removeClass('is-loading');
                    $.achtung({
                        message: 'An error has occurred updating the item requested. Please try again shortly.',
                        className: 'is-danger',
                        timeout: 5
                    });
                },
                success: function(response) {
                    elementbtn.removeClass('is-loading');
                    if (response['error']) {
                        $.achtung({
                            message: response['text'],
                            className: 'is-danger',
                            timeout: typeof response["timeout"] == "number" && response["timeout"] > 0 ? response["timeout"] : 10
                        });
                    } else if (response['text']) {
                        $.achtung({
                            message: response['text'],
                            className: 'is-success',
                            timeout: typeof response["timeout"] == "number" && response["timeout"] > 0 ? response["timeout"] : 10
                        });
                    }
                    if (response['labels']) {
                        for (i in response['labels']) {
                            if (element.parent().find("." + i + "icon").text() != "") {
                                if (element.parent().find("." + i + "icon").find("span").length == 0) {
                                    element.parent().find("." + i + "icon").html(response['labels'][i]);
                                } else {
                                    element.parent().find("." + i + "icon").find("span").each(function() {
                                        if ($(this).attr("class") == "" && $(this).text() != "") {
                                            $(this).html(response['labels'][i]);
                                        }
                                    });
                                }
                            }
                            element.parent().find("." + i + "icon").attr("title", response['labels'][i]).trigger("tooltiprefresh");
                        }
                    }
                    if (response['count']) {
                        for (i in response['count']) {
                            if (!isNaN(parseInt(response["count"][i]))) {
                                if (parseInt(response['count'][i]) < 0) {
                                    if (!isNaN(parseInt($("." + i + "count").text()))) {
                                        response['count'][i] = parseInt(response['count'][i]) + parseInt($("." + i + "count").text());
                                    } else {
                                        response['count'][i] = 0;
                                    }
                                }
                                if ($("." + i + "count", element).hasClass("local")) {
                                    $("." + i + "count", element).text(parseInt(response['count'][i]) == 0 && !$("." + i + "count", element).parent().hasClass("button") ? "" : response['count'][i]);
                                } else {
                                    $("." + i + "count").each(function() {
                                        count = parseInt(response['count'][i]) == 0 && !$(this).parent().hasClass("button") && !$(this).hasClass("allowzero") ? "" : response['count'][i];
                                        if ($(this).hasClass("badge")) {
                                            $(this).data("badge", count).attr("data-badge", count).data("badge", count);
                                        } else {
                                            $(this).text(count);
                                            if (count == "" && $(this).hasClass("tag")) {
                                                $(this).remove();
                                            }
                                        }
                                    });
                                }
                            }
                        }
                    }
                    if (response['hidetooltip']) {
                        element.parents('.columns').find('.tooltip:last').slideUp(400, function() {
                            $(this).remove();
                        });
                    }
                    if (callback) {
                        callback(element, response);
                    }
                }
            });
        }
    }
}

function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}
String.prototype.hashCode = function() {
    var hash = 0,
        i, chr;
    if (this.length === 0) return hash;
    for (i = 0; i < this.length; i++) {
        chr = this.charCodeAt(i);
        hash = ((hash << 5) - hash) + chr;
        hash |= 0;
    }
    return hash;
};
$.fn.scrollGuard = function() {
    return this.on("wheel", function(e) {
        if (e.originalEvent.deltaY < 0) {
            return ($(this).scrollTop() > 0);
        } else {
            return ($(this).scrollTop() + $(this).innerHeight() < $(this)[0].scrollHeight);
        }
    });
};
$.fn.saveUpdate = function(action, callback, confirmtxt, microtimeout) {
    $(this).click(function() {
        saveUpdate($(this), action, callback, confirmtxt, microtimeout);
        return false;
    });
};
jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') {
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString();
        }
        var path = options.path ? '; path=' + options.path : '';
        var domain = options.domain ? '; domain=' + options.domain : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else {
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};
jQuery.storage = function(name, value, options) {
    options = options || {};
    if (typeof(Storage) !== "undefined") {
        var date = new Date();
        if (typeof value != 'undefined') {
            if (value === null) {
                localStorage.removeItem(name);
                localStorage.removeItem(name + 'expires');
            } else if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
                if (typeof options.expires == 'number') {
                    date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
                } else {
                    date = options.expires;
                }
                localStorage.setItem(name, value);
                localStorage.setItem(name + 'expires', date.valueOf());
            } else {
                sessionStorage.setItem(name, value);
            }
        } else if (localStorage.getItem(name + 'expires') && localStorage.getItem(name + 'expires') > date.valueOf()) {
            return localStorage.getItem(name);
        } else if (sessionStorage.getItem(name)) {
            return sessionStorage.getItem(name);
        } else {
            localStorage.removeItem(name);
            localStorage.removeItem(name + 'expires');
            return null;
        }
    } else if (options.usecookies) {
        delete options.usecookies;
        return $.cookie(name, value, options);
    } else if (typeof value == 'undefined') {
        return null;
    }
};;
(function($) {
    var originalRemoveMethod = jQuery.fn.remove;

    function maybeCall(thing, ctx) {
        return (typeof thing == 'function') ? (thing.call(ctx)) : thing;
    };

    function isElementInDOM(ele) {
        while (ele = ele.parentNode) {
            if (ele == document) return true;
        }
        return false;
    };

    function Tipsy(element, options) {
        this.$element = $(element);
        this.options = options;
        this.enabled = true;
        this.fixTitle();
    };
    Tipsy.prototype = {
        show: function() {
            var title = this.getTitle();
            if (title && this.enabled) {
                var $tip = this.tip();
                $tip.find('.tipsy-inner')[this.options.html ? 'html' : 'text'](title);
                $tip[0].className = 'tipsy';
                $tip.css({
                    top: 0,
                    left: 0,
                    visibility: 'hidden',
                    display: 'block'
                }).prependTo(document.body);
                var pos = $.extend({}, this.$element.offset(), {
                    width: this.$element[0].offsetWidth,
                    height: this.$element[0].offsetHeight
                });
                var actualWidth = $tip[0].offsetWidth,
                    actualHeight = $tip[0].offsetHeight,
                    gravity = maybeCall(this.options.gravity, this.$element[0]);
                var tp;
                switch (gravity.charAt(0)) {
                    case 'n':
                        tp = {
                            top: pos.top + pos.height + this.options.offset,
                            left: pos.left + pos.width / 2 - actualWidth / 2
                        };
                        break;
                    case 's':
                        tp = {
                            top: pos.top - actualHeight - this.options.offset,
                            left: pos.left + pos.width / 2 - actualWidth / 2
                        };
                        break;
                    case 'e':
                        tp = {
                            top: pos.top + pos.height / 2 - actualHeight / 2,
                            left: pos.left - actualWidth - this.options.offset
                        };
                        break;
                    case 'w':
                        tp = {
                            top: pos.top + pos.height / 2 - actualHeight / 2,
                            left: pos.left + pos.width + this.options.offset
                        };
                        break;
                }
                if (gravity.length == 2) {
                    if (gravity.charAt(1) == 'w') {
                        tp.left = pos.left + pos.width / 2 - 15;
                    } else {
                        tp.left = pos.left + pos.width / 2 - actualWidth + 15;
                    }
                }
                $tip.css(tp).addClass('tipsy-' + gravity);
                $tip.find('.tipsy-arrow')[0].className = 'tipsy-arrow tipsy-arrow-' + gravity.charAt(0);
                if (this.options.className) {
                    $tip.addClass(maybeCall(this.options.className, this.$element[0]));
                }
                if ($(this.$element[0]).parents(".inverttooltips").length > 0) {
                    $tip.addClass('tipsy-invert');
                }
                if ($(this.$element[0]).parents(".navbartooltips").length > 0) {
                    $tip.addClass('tipsy-navbar');
                }
                if (this.options.fade) {
                    $tip.stop().css({
                        opacity: 0,
                        display: 'block',
                        visibility: 'visible'
                    }).animate({
                        opacity: this.options.opacity
                    });
                } else {
                    $tip.css({
                        visibility: 'visible',
                        opacity: this.options.opacity
                    });
                }
            }
        },
        hide: function() {
            if (this.options.fade) {
                this.tip().stop().fadeOut(function() {
                    $(this).remove();
                });
            } else {
                this.tip().remove();
            }
        },
        fixTitle: function() {
            var $e = this.$element;
            if ($e.attr('title') || typeof($e.attr('original-title')) != 'string') {
                $e.attr('original-title', $e.attr('title') || '').removeAttr('title');
            }
        },
        getTitle: function() {
            var title, $e = this.$element,
                o = this.options;
            this.fixTitle();
            var title, o = this.options;
            if (typeof o.title == 'string') {
                title = $e.attr(o.title == 'title' ? 'original-title' : o.title);
            } else if (typeof o.title == 'function') {
                title = o.title.call($e[0]);
            }
            title = ('' + title).replace(/(^\s*|\s*$)/, "");
            return title || o.fallback;
        },
        tip: function() {
            if (!this.$tip) {
                this.$tip = $('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>');
                this.$tip.data('tipsy-pointee', this.$element[0]);
            }
            return this.$tip;
        },
        validate: function() {
            if (!this.$element[0].parentNode) {
                this.hide();
                this.$element = null;
                this.options = null;
            }
        },
        enable: function() {
            this.enabled = true;
        },
        disable: function() {
            this.enabled = false;
        },
        toggleEnabled: function() {
            this.enabled = !this.enabled;
        }
    };
    $.fn.tipsy = function(options) {
        if (options === true) {
            return this.data('tipsy');
        } else if (typeof options == 'string') {
            var tipsy = this.data('tipsy');
            if (tipsy) tipsy[options]();
            return this;
        }
        options = $.extend({}, $.fn.tipsy.defaults, options);

        function get(ele) {
            var tipsy = $.data(ele, 'tipsy');
            if (!tipsy) {
                tipsy = new Tipsy(ele, $.fn.tipsy.elementOptions(ele, options));
                $.data(ele, 'tipsy', tipsy);
            }
            return tipsy;
        }

        function enter() {
            var tipsy = get(this);
            tipsy.hoverState = 'in';
            if (options.delayIn == 0) {
                tipsy.show();
            } else {
                tipsy.fixTitle();
                setTimeout(function() {
                    if (tipsy.hoverState == 'in') tipsy.show();
                }, options.delayIn);
            }
        };

        function leave() {
            var tipsy = get(this);
            tipsy.hoverState = 'out';
            if (options.delayOut == 0) {
                tipsy.hide();
            } else {
                setTimeout(function() {
                    if (tipsy.hoverState == 'out') tipsy.hide();
                }, options.delayOut);
            }
        };
        if (!options.live) this.each(function() {
            get(this);
        });
        if (options.trigger != 'manual') {
            var eventIn = options.trigger == 'hover' ? 'mouseenter' : 'focus',
                eventOut = options.trigger == 'hover' ? 'mouseleave' : 'blur';
            if (options.live) {
                $(document).on(eventIn, options.live, enter).on(eventOut, options.live, leave);
            } else {
                this.on(eventIn, enter).on(eventOut, leave);
            }
            this.on('tooltiprefresh', function() {
                if (get(this).hoverState == 'in' && $(this).attr('title')) {
                    $(this).trigger(options.trigger == 'hover' ? 'mouseenter' : 'focus');
                }
            });
        }
        return this;
    };
    $.fn.tipsy.defaults = {
        className: null,
        delayIn: 0,
        delayOut: 0,
        fade: false,
        fallback: '',
        gravity: 'n',
        html: false,
        live: false,
        offset: 0,
        opacity: 0.8,
        title: 'title',
        trigger: 'hover'
    };
    $.fn.tipsy.revalidate = function() {
        $('.tipsy').each(function() {
            var pointee = $.data(this, 'tipsy-pointee');
            if (!pointee || !isElementInDOM(pointee)) {
                $(this).remove();
            }
        });
    };
    $.fn.tipsy.elementOptions = function(ele, options) {
        return $.metadata ? $.extend({}, options, $(ele).metadata()) : options;
    };
    $.fn.tipsy.autoALL = function() {
        return (($(document).scrollTop() + $(window).height()) - ($(this).offset().top + $(this).height()) < 60 ? 's' : 'n') + (($(this).width() + $(this).offset().left - $(document).scrollLeft()) < 125 ? 'w' : (($(document).scrollLeft() + $(window).width()) - $(this).offset().left < 125 ? 'e' : ''));
    };
    $.fn.tipsy.autoNS = function() {
        return $(this).offset().top > ($(document).scrollTop() + $(window).height() / 2) ? 's' : 'n';
    };
    $.fn.tipsy.autoWE = function() {
        return $(this).offset().left > ($(document).scrollLeft() + $(window).width() / 2) ? 'e' : 'w';
    };
    $.fn.tipsy.autoBounds = function(margin, prefer) {
        return function() {
            var dir = {
                    ns: prefer[0],
                    ew: (prefer.length > 1 ? prefer[1] : false)
                },
                boundTop = $(document).scrollTop() + margin,
                boundLeft = $(document).scrollLeft() + margin,
                $this = $(this);
            if ($this.offset().top < boundTop) dir.ns = 'n';
            if ($this.offset().left < boundLeft) dir.ew = 'w';
            if ($(window).width() + $(document).scrollLeft() - $this.offset().left < margin) dir.ew = 'e';
            if ($(window).height() + $(document).scrollTop() - $this.offset().top < margin) dir.ns = 's';
            return dir.ns + (dir.ew ? dir.ew : '');
        }
    };
    jQuery.fn.remove = function() {
        result = originalRemoveMethod.apply(this, arguments);
        $.fn.tipsy.revalidate();
        return result;
    }
})(jQuery);;
(function($) {
    $.fn.achtung = function(options) {
        var isMethodCall = (typeof options === 'string'),
            args = Array.prototype.slice.call(arguments, 0),
            name = 'achtung';
        return this.each(function() {
            var instance = $.data(this, name);
            if (isMethodCall && options.substring(0, 1) === '_') {
                return this;
            }
            (!instance && !isMethodCall && $.data(this, name, new $.achtung(this))._init(args));
            (instance && isMethodCall && $.isFunction(instance[options]) && instance[options].apply(instance, args.slice(1)));
        });
    };
    $.achtung = function(element) {
        var args = Array.prototype.slice.call(arguments, 0),
            $el;
        if (!element || !element.nodeType) {
            $el = $('<div />');
            return $el.achtung.apply($el, args);
        }
        this.$container = $(element);
    };
    $.extend($.achtung, {
        version: '0.3.0',
        cache: [],
        $overlay: false,
        defaults: {
            timeout: 10,
            disableClose: false,
            allowDupe: false,
            className: '',
            showEffects: {
                'opacity': 'toggle',
                'height': 'toggle'
            },
            hideEffects: {
                'opacity': 'toggle',
                'height': 'toggle'
            },
            showEffectDuration: 500,
            hideEffectDuration: 700,
            closeCallback: false
        }
    });
    $.extend($.achtung.prototype, {
        $container: false,
        closeTimer: false,
        options: {},
        _init: function(args) {
            var o, self = this;
            args = $.isArray(args) ? args : [];
            args.unshift($.achtung.defaults);
            args.unshift({});
            o = this.options = $.extend.apply($, args);
            if (!o.allowDupe && $.achtung.cache[o.message.replace(/["']/g, "")]) {
                $.achtung.cache[o.message.replace(/["']/g, "")].fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
                return;
            }
            if (!$.achtung.$overlay) {
                $.achtung.$overlay = $('<div id="achtung-overlay"></div>').appendTo(document.body);
            }
            if (!o.disableClose) {
                this.$container.prepend($('<button class="delete"></button>').click(function() {
                    self.close();
                }));
            }
            if (o.message) {
                $.achtung.cache[o.message.replace(/["']/g, "")] = this.$container;
                this.$container.append($('<span class="achtung-message">' + o.message + '</span>'));
            }
            (o.className && this.$container.addClass(o.className));
            (o.css && this.$container.css(o.css));
            this.$container.addClass('achtung').addClass('notification').appendTo($.achtung.$overlay);
            if (o.showEffects) {
                this.$container.animate(o.showEffects, o.showEffectDuration);
            } else {
                this.$container.show();
            }
            if (o.timeout > 0) {
                this.timeout(o.timeout);
            }
            this.$container.click(function(e) {
                if (e.target.nodeName.toLowerCase() == "div" && $(e.target).hasClass("notification")) {
                    self.close();
                }
                return true;
            });
        },
        timeout: function(timeout) {
            var self = this;
            if (this.closeTimer) {
                clearTimeout(this.closeTimer);
            }
            this.closeTimer = setTimeout(function() {
                self.close();
            }, timeout * 1000);
            this.options.timeout = timeout;
        },
        update: function(options) {
            (options.css && this.$container.css(options.css));
            (options.timeout && this.timeout(options.timeout));
        },
        close: function() {
            var o = this.options,
                $container = this.$container;
            delete $.achtung.cache[this.$container.find(".achtung-message").html().replace(/["']/g, "")];
            if (o.hideEffects) {
                this.$container.animate(o.hideEffects, o.hideEffectDuration);
            } else {
                this.$container.hide();
            }
            if (o.closeCallback) {
                o.closeCallback();
            }
            $container.queue(function() {
                $container.removeData('achtung');
                $container.remove();
                if ($.achtung.$overlay && $.achtung.$overlay.is(':empty')) {
                    $.achtung.$overlay.remove();
                    $.achtung.$overlay = false;
                }
                $container.dequeue();
            });
        }
    });
})(jQuery);;
(function($) {
    $.suggestClick = function(input, options) {
        var $input = $(input).attr("autocomplete", "off");
        var $results = $(document.createElement("div"));
        var typed = "";
        var performing = false;
        var timeout = false;
        var prevLength = 0;
        var cache = [];
        var cachedb = [];
        $results.addClass(options.resultsClass).appendTo(options.positionIn ? options.positionIn : 'body');
        $(window).resize(resetPosition);
        $input.focus(function() {
            resetPosition();
            suggest();
        });
        $input.blur(function() {
            setTimeout(function() {
                $results.hide();
                inputResult();
            }, 200);
        });
        $input.keydown(processKey);

        function resetPosition() {
            if ($(this).attr("autocomplete")) {
                $input = $(this).attr("autocomplete", "off");
            }
            if (!options.noPosition) {
                if (!options.positionIn && options.positionElement) {
                    var top = $(options.positionElement).offset().top + $(options.positionElement).outerHeight();
                    var left = $(options.positionElement).offset().left;
                    var width = $(options.positionElement).outerWidth();
                } else if (!options.positionIn) {
                    var top = $input.offset().top + input.offsetHeight;
                    var left = $input.offset().left;
                    var width = $input.outerWidth();
                }
                $results.css({
                    top: top + 'px',
                    left: left + 'px',
                    width: width + 'px'
                });
            }
        }

        function processKey(e) {
            if ((/27$|38$|40$/.test(e.keyCode) && $results.is(':visible')) || (/^13$|^9$/.test(e.keyCode) && getCurrentResult())) {
                if (e.preventDefault) {
                    e.preventDefault();
                }
                if (e.stopPropagation) {
                    e.stopPropagation();
                }
                e.cancelBubble = true;
                e.returnValue = false;
                switch (e.keyCode) {
                    case 38:
                        prevResult();
                        break;
                    case 40:
                        nextResult();
                        break;
                    case 9:
                    case 13:
                        selectCurrentResult();
                        break;
                    case 27:
                        $results.hide();
                        inputResult();
                        break;
                }
            } else {
                setTimeout(doSuggest, options.delay);
            }
        }

        function doSuggest() {
            if ($input.val().length != prevLength) {
                if (performing) {
                    setTimeout(doSuggest, options.delay);
                } else {
                    if (timeout) {
                        clearTimeout(timeout);
                    }
                    var q = $.trim($input.val()).toLowerCase();
                    var delay = cache[q] == undefined ? 0 : (options.delay * 5);
                    prevLength = $input.val().length;
                    if (delay) {
                        timeout = setTimeout(suggest, delay);
                    } else {
                        suggest();
                    }
                }
            }
        }

        function suggest() {
            typed = $.trim($input.val());
            var q = $.trim($input.val()).toLowerCase();
            if (q.length >= options.minchars) {
                cached = checkCache(q);
                if (cached) {
                    displayItems(cached);
                } else {
                    performing = true;
                    $input.closest('.control').addClass('is-loading');
                    $.get(options.source, {
                        q: q,
                        l: options.limit
                    }, function(txt) {
                        $results.hide();
                        var items = parseTxt(txt);
                        displayItems(items);
                        addToCache(q, items);
                        performing = false;
                        $input.closest('.control').removeClass('is-loading');
                    });
                }
            } else {
                $results.hide();
            }
        }

        function checkCache(q) {
            if (cache[q] == undefined && q.length >= options.minchars) {
                var search = '';
                var attempted = false;
                for (x in q) {
                    search += q[x];
                    if (search.length >= options.minchars && cachedb[search] != undefined && cache[search] != undefined && !cache[search].length) {
                        attempted = true;
                        return [];
                    }
                }
                if (attempted) {
                    return [];
                } else {
                    return false;
                }
            } else if (cache[q] == undefined) {
                return false;
            } else {
                return cache[q];
            }
        }

        

        function displayItems(items) {
            if (!items) {
                return;
            }
            if (!items.length) {
                $results.hide();
                return;
            }
            var html = '';
            for (i in items) {
                html += items[i];
            }
            $results.html("<div class=\"dropdown-content\">" + html + "</div>").show();
            $results.find('a').addClass('dropdown-item').mouseover(function() {
                $results.find('a').removeClass(options.selectClass);
                $(this).addClass(options.selectClass);
            });
        }

        function parseTxt(txt) {
            var items = [];
            var tokens = txt.split(options.delimiter);
            for (var i = 0; i < tokens.length; i++) {
                var token = $.trim(tokens[i]);
                if (token) {
                    items[items.length] = token;
                }
            }
            return items;
        }

        function getCurrentResult() {
            if (!$results.is(':visible')) {
                return false;
            }
            var $currentResult = $results.find('a.' + options.selectClass);
            if (!$currentResult.length) {
                $currentResult = false;
            }
            return $currentResult;
        }

        function selectCurrentResult() {
            $currentResult = getCurrentResult();
            if ($currentResult) {
                location.href = $currentResult.attr('href');
            }
        }

        function nextResult() {
            $currentResult = getCurrentResult();
            $results.find('a').removeClass(options.selectClass);
            if ($currentResult) {
                var applyto = $currentResult.next();
            } else {
                var applyto = $results.find('a:first-child');
            }
            applyto.addClass(options.selectClass);
            inputResult();
        }

        function prevResult() {
            $currentResult = getCurrentResult();
            $results.find('a').removeClass(options.selectClass);
            if ($currentResult) {
                var applyto = $currentResult.prev();
            } else {
                var applyto = $results.find('a:last-child');
            }
            applyto.addClass(options.selectClass);
            inputResult();
        }

        function inputResult() {
            $currentResult = getCurrentResult();
            if ($currentResult) {
                $input.val($currentResult.html().replace(/(<([^>]+)>.*?<\/([^>]+)>)/ig, ""));
            } else {
                $input.val(typed);
            }
        }
    }
    $.fn.suggestClick = function(source, options) {
        if (!source) {
            return;
        }
        options = options || {};
        options.source = source;
        options.delay = options.delay || 10;
        options.limit = options.limit || 10;
        options.resultsClass = options.resultsClass || 'dropdown-menu';
        options.selectClass = options.selectClass || 'is-active';
        options.noPosition = options.noPosition || false;
        options.positionElement = options.positionElement || false;
        options.positionIn = options.positionIn || false;
        options.minchars = options.minchars || 2;
        options.delimiter = options.delimiter || '\n';
        this.each(function() {
            new $.suggestClick(this, options);
        });
        return this;
    };
})(jQuery);;
var responsiveContent = [];
var lazyLoad = debounce(function() {
    if ($(window).width() > 480) {
        $($(window).width() > 768 ? ".lazy-load-mobile,.lazy-load-tiny" : ".lazy-load-tiny").each(function() {
            if ($(this).data("srcset")) {
                $(this).attr("srcset", $(this).data("srcset")).removeData("srcset").removeAttr("data-srcset");
            }
            $(this).attr("src", $(this).data("src")).removeData("src").removeAttr("data-src").removeClass("lazy-load-mobile").removeClass("lazy-load-tiny");
        });
    }
    if ($(".lazy-load-mobile,.lazy-load-tiny").length <= 0) {
        $(window).off("resize.lazyload");
    }
}, 250);
lazyLoad();
doResponsive();
$(".csstooltip").tipsy({
    live: ".csstooltip",
    gravity: $.fn.tipsy.autoALL,
    delayIn: 20,
    offset: 5,
    opacity: 1
});
$(".csstooltipside").tipsy({
    live: ".csstooltipside",
    gravity: $.fn.tipsy.autoWE,
    delayIn: 20,
    offset: 5,
    opacity: 1
});
$(".csstooltipmanual").tipsy({
    trigger: "manual",
    gravity: $.fn.tipsy.autoALL,
    offset: 5,
    opacity: 1
});
$("body").on("click", "a.thickbox", function() {
    try {
        if (window.self !== window.top) {
            return true;
        } else {
            return $(this).thickbox();
        }
    } catch (e) {
        return true;
    }
});
$.fn.thickbox = function() {
    var content = "";
    var cb = [];
    if ($(this).addClass("activetb").attr("rel") && $(this).attr("rel").includes("=")) {
        var temp = $(this).attr("rel").split(";");
        for (var i = 0; i < temp.length; i++) {
            if (temp[i].includes("=")) {
                cb[temp[i].split("=")[0]] = temp[i].split("=")[1];
            }
        }
    }
    var div = document.createElement("div");
    div.innerHTML = "<a></a>";
    div.firstChild.href = $(this).attr("href");
    div.innerHTML = div.innerHTML;
    if (cb["inline"]) {
        if ($(cb["inline"]).is("iframe")) {
            content = $(cb["inline"]).clone().addClass("modal-iframe")[0].outerHTML;
        } else {
            content = "<div class=\"modal-div\" style=\"" + (cb["innerHeight"] ? "max-height:" + cb["innerHeight"] + "px;" : "") + (cb["innerWidth"] ? "max-width:" + cb["innerWidth"] + "px;" : "") + "\">" + $(cb["inline"]).html() + "</div>";
        }
    } else if (cb["iframe"]) {
        content = "<iframe class=\"modal-iframe\" src=\"" + div.firstChild.href + "\"" + (cb["innerHeight"] ? " height=\"" + cb["innerHeight"] + "\"" : "") + (cb["innerWidth"] ? " width=\"" + cb["innerWidth"] + "\"" : "") + " frameborder=\"0\" allowfullscreen></iframe>";
    } else {
        content = "<img class=\"modal-image\" src=\"" + div.firstChild.href + "\"" + (cb["innerHeight"] ? " height=\"" + cb["innerHeight"] + "\"" : "") + (cb["innerWidth"] ? " width=\"" + cb["innerWidth"] + "\"" : "") + " alt=\"" + ($(this).attr("alt") || $(this).attr("title")) + "\">";
    }
    openModal(content, $(this).hasClass("thickboxmulti"));
    return false;
};
$(".tablebrowse tbody tr,.tableforum tbody tr").click(function(e) {
    if (e.target.nodeName.toLowerCase() == "td" || e.target.nodeName.toLowerCase() == "span" || e.target.nodeName.toLowerCase() == "div") {
        if ($(this).hasClass("is-clickable") && $(this).find("a.titletable").attr("id", "doclick").length > 0) {
            $("#doclick")[0].click();
        } else {
            if ($(this).hasClass("is-selected")) {
                $(this).find(".button.is-darkold").removeClass("is-dark").removeClass("is-darkold");
            } else {
                $(this).find(".button:not(.is-dark):not(.is-text)").addClass("is-dark").addClass("is-darkold");
            }
            $(this).toggleClass("is-selected");
        }
    }
});
$(".notification .delete").click(function() {
    if (!$(this).hasClass("deleteignore")) {
        $.storage("n" + $(this).closest(".notification").text().hashCode(), true);
        $(this).closest(".notification").slideUp();
    }
}).each(function() {
    n = $(this).closest(".notification");
    if ($.storage("n" + n.text().hashCode())) n.remove();
});
$(window).on("resize.lazyload", lazyLoad);

function doResponsive() {
    var iframes = $(".content iframe");
    iframes.each(function(key, value) {
        var ratio = this.height / this.width;
        if (!isNaN(ratio) && $(this).attr("src") && $(this).attr("src").match(/youtube\.com\/embed|\/media\/iframe\//i)) {
            $(this).data("ratio", ratio);
            responsiveContent[key] = $(this);
        }
    });
    if (responsiveContent.length) {
        $(window).resize(debounce(function() {
            for (key in responsiveContent) {
                responsiveContent[key].height(responsiveContent[key].width() * responsiveContent[key].data("ratio"));
            }
        }, 250)).resize();
    }
}

// function openModal(content, multi) {
//     $("<div class=\"modal is-active\"><div class=\"modal-background\">" + (content.match(/(modal\-iframe|modal\-image)/i) ? "<div class=\"modal-loading button is-text is-loading is-centered-text\"></div>" : "") + "</div><div class=\"modal-container\"><div class=\"modal-content" + (($(".thickboxmulti").index($(".activetb")) + 1) < $(".thickboxmulti").length && content.match(/modal\-image/i) ? " modal-content-next is-cursor-pointer" : "") + "\">" + (content.match(/(modal\-iframe|modal\-image|modal\-div)/i) ? content : "<div class=\"modal-div\">" + content + "</div>") + "</div></div><button class=\"modal-close is-large is-zoom\"></button>" + (multi && $(".thickboxmulti").length > 1 ? "<button class=\"modal-prev is-large is-hidden-mobile is-zoom\"" + (($(".thickboxmulti").index($(".activetb")) + 1) == 1 ? " style=\"opacity: 0.3\"" : "") + "></button><button class=\"modal-next is-large is-hidden-mobile is-zoom\"" + (($(".thickboxmulti").index($(".activetb")) + 1) == $(".thickboxmulti").length ? " style=\"opacity: 0.3\"" : "") + "></button><div class=\"modal-title\">" + ($(".thickboxmulti").index($(".activetb")) + 1) + " of " + $(".thickboxmulti").length + "</div>" : "") + "</div>").appendTo("body");
//     $("html").addClass("is-clipped").bind("keydown.modal", function(e) {
//         if ($(this).hasClass("is-clipped")) {
//             switch (e.keyCode) {
//                 case 27:
//                     e.preventDefault();
//                     closeModal();
//                     break;
//                 case 37:
//                     prevModal();
//                     break;
//                 case 39:
//                     nextModal();
//                     break;
//             }
//         }
//     }).bind("swipeleft.modal", function(e) {
//         if ($(this).hasClass("is-clipped")) {
//             e.preventDefault();
//             nextModal();
//         }
//     }).bind("swiperight.modal", function(e) {
//         if ($(this).hasClass("is-clipped")) {
//             e.preventDefault();
//             prevModal();
//         }
//     });
//     $(".modal-background, .modal-close").click(function() {
//         closeModal();
//     });
//     $(".is-facebook").click(function() {
//         closeModal();
//     });
//     $(".modal-prev").click(function() {
//         prevModal();
//     });
//     $(".modal-next,.modal-content-next").click(function() {
//         nextModal();
//     });
//     $(".modal-iframe").load(function() {
//         $(".modal-loading").remove();
//         if ($(this).height() > $(window).height()) {
//             $(".modal").css("position", "absolute").css("padding", "20px 0").css("bottom", "auto").css("display", "none").height();
//             $(".modal").css("display", "");
//             $(window).scrollTop(0);
//         }
//     });
//     $(".modal-image").load(function() {
//         $(".modal-loading").remove();
//     });
//     $(".tipsy").remove();
//     modalMessage = function(event) {
//         if (event.data.close) {
//             closeModal();
//         }
//     };
//     window.addEventListener("message", modalMessage, false);
//     var closeModal = function() {
//         $(".activetb").removeClass("activetb");
//         $("html").removeClass("is-clipped").unbind(".modal");
//         $(".modal").remove();
//     };

//     var prevModal = function() {
//         if ($(".activetb").length > 0 && $(".thickboxmulti").length > 1) {
//             x = $(".thickboxmulti");
//             prev = x.index($(".activetb")) - 1;
//             if (prev >= 0) {
//                 closeModal();
//                 x.eq(prev).thickbox();
//                 if (prev == 0) {
//                     $(".modal-prev").css("opacity", 0.3);
//                 }
//                 $(".modal-next").css("opacity", 1);
//                 $(".modal-title").text((prev + 1) + " of " + x.length);
//             }
//         }
//     };
//     var nextModal = function() {
//         if ($(".activetb").length > 0 && $(".thickboxmulti").length > 1) {
//             x = $(".thickboxmulti");
//             next = x.index($(".activetb")) + 1;
//             if (next < x.length) {
//                 closeModal();
//                 x.eq(next).thickbox();
//                 if ((next + 1) == x.length) {
//                     $(".modal-next").css("opacity", 0.3);
//                 }
//                 $(".modal-prev").css("opacity", 1);
//                 $(".modal-title").text((next + 1) + " of " + x.length);
//             }
//         }
//     };
// }
