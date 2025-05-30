(function (factory) {
    "use strict";
    if (typeof define === "function" && define.amd) {
        define(["jquery"], factory);
    } else if (typeof exports !== "undefined") {
        module.exports = factory(require("jquery"));
    } else {
        factory(jQuery);
    }
})(function ($) {
    $.fn.marquee = function (options) {
        return this.each(function () {
            var o = $.extend({}, $.fn.marquee.defaults, options),
                $this = $(this),
                $marqueeWrapper,
                containerWidth,
                animationCss,
                verticalDir,
                elWidth,
                loopCount = 3,
                playState = "animation-play-state",
                css3AnimationIsSupported = false,
                _prefixedEvent = function (element, type, callback) {
                    var pfx = ["webkit", "moz", "MS", "o", ""];
                    for (var p = 0; p < pfx.length; p++) {
                        if (!pfx[p]) type = type.toLowerCase();
                        element.addEventListener(pfx[p] + type, callback, false);
                    }
                },
                _objToString = function (obj) {
                    var tabjson = [];
                    for (var p in obj) {
                        if (obj.hasOwnProperty(p)) {
                            tabjson.push(p + ":" + obj[p]);
                        }
                    }
                    tabjson.push();
                    return "{" + tabjson.join(",") + "}";
                },
                _startAnimationWithDelay = function () {
                    $this.timer = setTimeout(animate, o.delayBeforeStart);
                },
                methods = {
                    pause: function () {
                        if (css3AnimationIsSupported && o.allowCss3Support) {
                            $marqueeWrapper.css(playState, "paused");
                        } else {
                            if ($.fn.pause) {
                                $marqueeWrapper.pause();
                            }
                        }
                        $this.data("runningStatus", "paused");
                        $this.trigger("paused");
                    },
                    resume: function () {
                        if (css3AnimationIsSupported && o.allowCss3Support) {
                            $marqueeWrapper.css(playState, "running");
                        } else {
                            if ($.fn.resume) {
                                $marqueeWrapper.resume();
                            }
                        }
                        $this.data("runningStatus", "resumed");
                        $this.trigger("resumed");
                    },
                    toggle: function () {
                        methods[$this.data("runningStatus") === "resumed" ? "pause" : "resume"]();
                    },
                    destroy: function () {
                        clearTimeout($this.timer);
                        $this.find("*").addBack().off();
                        $this.html($this.find(".js-marquee:first").html());
                    },
                };
            if (typeof options === "string") {
                if ($.isFunction(methods[options])) {
                    if (!$marqueeWrapper) {
                        $marqueeWrapper = $this.find(".js-marquee-wrapper");
                    }
                    if ($this.data("css3AnimationIsSupported") === true) {
                        css3AnimationIsSupported = true;
                    }
                    methods[options]();
                }
                return;
            }
            var dataAttributes = {},
                attr;
            $.each(o, function (key) {
                attr = $this.attr("data-" + key);
                if (typeof attr !== "undefined") {
                    switch (attr) {
                        case "true":
                            attr = true;
                            break;
                        case "false":
                            attr = false;
                            break;
                    }
                    o[key] = attr;
                }
            });
            if (o.speed) {
                o.duration = (parseInt($this.width(), 10) / o.speed) * 1e3;
            }
            verticalDir = o.direction === "up" || o.direction === "down";
            o.gap = o.duplicated ? parseInt(o.gap) : 0;
            $this.wrapInner('<div class="js-marquee"></div>');
            var $el = $this.find(".js-marquee").css({ "margin-right": o.gap, float: "left" });
            if (o.duplicated) {
                $el.clone(true).appendTo($this);
            }
            $this.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>');
            $marqueeWrapper = $this.find(".js-marquee-wrapper");
            if (verticalDir) {
                var containerHeight = $this.height();
                $marqueeWrapper.removeAttr("style");
                $this.height(containerHeight);
                $this.find(".js-marquee").css({ float: "none", "margin-bottom": o.gap, "margin-right": 0 });
                if (o.duplicated) {
                    $this.find(".js-marquee:last").css({ "margin-bottom": 0 });
                }
                var elHeight = $this.find(".js-marquee:first").height() + o.gap;
                if (o.startVisible && !o.duplicated) {
                    o._completeDuration = ((parseInt(elHeight, 10) + parseInt(containerHeight, 10)) / parseInt(containerHeight, 10)) * o.duration;
                    o.duration = (parseInt(elHeight, 10) / parseInt(containerHeight, 10)) * o.duration;
                } else {
                    o.duration = ((parseInt(elHeight, 10) + parseInt(containerHeight, 10)) / parseInt(containerHeight, 10)) * o.duration;
                }
            } else {
                elWidth = $this.find(".js-marquee:first").width() + o.gap;
                containerWidth = $this.width();
                if (o.startVisible && !o.duplicated) {
                    o._completeDuration = ((parseInt(elWidth, 10) + parseInt(containerWidth, 10)) / parseInt(containerWidth, 10)) * o.duration;
                    o.duration = (parseInt(elWidth, 10) / parseInt(containerWidth, 10)) * o.duration;
                } else {
                    o.duration = ((parseInt(elWidth, 10) + parseInt(containerWidth, 10)) / parseInt(containerWidth, 10)) * o.duration;
                }
            }
            if (o.duplicated) {
                o.duration = o.duration / 2;
            }
            if (o.allowCss3Support) {
                var elm = document.body || document.createElement("div"),
                    animationName = "marqueeAnimation-" + Math.floor(Math.random() * 1e7),
                    domPrefixes = "Webkit Moz O ms Khtml".split(" "),
                    animationString = "animation",
                    animationCss3Str = "",
                    keyframeString = "";
                if (elm.style.animation !== undefined) {
                    keyframeString = "@keyframes " + animationName + " ";
                    css3AnimationIsSupported = true;
                }
                if (css3AnimationIsSupported === false) {
                    for (var i = 0; i < domPrefixes.length; i++) {
                        if (elm.style[domPrefixes[i] + "AnimationName"] !== undefined) {
                            var prefix = "-" + domPrefixes[i].toLowerCase() + "-";
                            animationString = prefix + animationString;
                            playState = prefix + playState;
                            keyframeString = "@" + prefix + "keyframes " + animationName + " ";
                            css3AnimationIsSupported = true;
                            break;
                        }
                    }
                }
                if (css3AnimationIsSupported) {
                    animationCss3Str = animationName + " " + o.duration / 1e3 + "s " + o.delayBeforeStart / 1e3 + "s infinite " + o.css3easing;
                    $this.data("css3AnimationIsSupported", true);
                }
            }
            var _rePositionVertically = function () {
                    $marqueeWrapper.css("transform", "translateY(" + (o.direction === "up" ? containerHeight + "px" : "-" + elHeight + "px") + ")");
                },
                _rePositionHorizontally = function () {
                    $marqueeWrapper.css("transform", "translateX(" + (o.direction === "left" ? containerWidth + "px" : "-" + elWidth + "px") + ")");
                };
            if (o.duplicated) {
                if (verticalDir) {
                    if (o.startVisible) {
                        $marqueeWrapper.css("transform", "translateY(0)");
                    } else {
                        $marqueeWrapper.css("transform", "translateY(" + (o.direction === "up" ? containerHeight + "px" : "-" + (elHeight * 2 - o.gap) + "px") + ")");
                    }
                } else {
                    if (o.startVisible) {
                        $marqueeWrapper.css("transform", "translateX(0)");
                    } else {
                        $marqueeWrapper.css("transform", "translateX(" + (o.direction === "left" ? containerWidth + "px" : "-" + (elWidth * 2 - o.gap) + "px") + ")");
                    }
                }
                if (!o.startVisible) {
                    loopCount = 1;
                }
            } else if (o.startVisible) {
                loopCount = 2;
            } else {
                if (verticalDir) {
                    _rePositionVertically();
                } else {
                    _rePositionHorizontally();
                }
            }
            var animate = function () {
                if (o.duplicated) {
                    if (loopCount === 1) {
                        o._originalDuration = o.duration;
                        if (verticalDir) {
                            o.duration = o.direction === "up" ? o.duration + containerHeight / (elHeight / o.duration) : o.duration * 2;
                        } else {
                            o.duration = o.direction === "left" ? o.duration + containerWidth / (elWidth / o.duration) : o.duration * 2;
                        }
                        if (animationCss3Str) {
                            animationCss3Str = animationName + " " + o.duration / 1e3 + "s " + o.delayBeforeStart / 1e3 + "s " + o.css3easing;
                        }
                        loopCount++;
                    } else if (loopCount === 2) {
                        o.duration = o._originalDuration;
                        if (animationCss3Str) {
                            animationName = animationName + "0";
                            keyframeString = $.trim(keyframeString) + "0 ";
                            animationCss3Str = animationName + " " + o.duration / 1e3 + "s 0s infinite " + o.css3easing;
                        }
                        loopCount++;
                    }
                }
                if (verticalDir) {
                    if (o.duplicated) {
                        if (loopCount > 2) {
                            $marqueeWrapper.css("transform", "translateY(" + (o.direction === "up" ? 0 : "-" + elHeight + "px") + ")");
                        }
                        animationCss = { transform: "translateY(" + (o.direction === "up" ? "-" + elHeight + "px" : 0) + ")" };
                    } else if (o.startVisible) {
                        if (loopCount === 2) {
                            if (animationCss3Str) {
                                animationCss3Str = animationName + " " + o.duration / 1e3 + "s " + o.delayBeforeStart / 1e3 + "s " + o.css3easing;
                            }
                            animationCss = { transform: "translateY(" + (o.direction === "up" ? "-" + elHeight + "px" : containerHeight + "px") + ")" };
                            loopCount++;
                        } else if (loopCount === 3) {
                            o.duration = o._completeDuration;
                            if (animationCss3Str) {
                                animationName = animationName + "0";
                                keyframeString = $.trim(keyframeString) + "0 ";
                                animationCss3Str = animationName + " " + o.duration / 1e3 + "s 0s infinite " + o.css3easing;
                            }
                            _rePositionVertically();
                        }
                    } else {
                        _rePositionVertically();
                        animationCss = { transform: "translateY(" + (o.direction === "up" ? "-" + $marqueeWrapper.height() + "px" : containerHeight + "px") + ")" };
                    }
                } else {
                    if (o.duplicated) {
                        if (loopCount > 2) {
                            $marqueeWrapper.css("transform", "translateX(" + (o.direction === "left" ? 0 : "-" + elWidth + "px") + ")");
                        }
                        animationCss = { transform: "translateX(" + (o.direction === "left" ? "-" + elWidth + "px" : 0) + ")" };
                    } else if (o.startVisible) {
                        if (loopCount === 2) {
                            if (animationCss3Str) {
                                animationCss3Str = animationName + " " + o.duration / 1e3 + "s " + o.delayBeforeStart / 1e3 + "s " + o.css3easing;
                            }
                            animationCss = { transform: "translateX(" + (o.direction === "left" ? "-" + elWidth + "px" : containerWidth + "px") + ")" };
                            loopCount++;
                        } else if (loopCount === 3) {
                            o.duration = o._completeDuration;
                            if (animationCss3Str) {
                                animationName = animationName + "0";
                                keyframeString = $.trim(keyframeString) + "0 ";
                                animationCss3Str = animationName + " " + o.duration / 1e3 + "s 0s infinite " + o.css3easing;
                            }
                            _rePositionHorizontally();
                        }
                    } else {
                        _rePositionHorizontally();
                        animationCss = { transform: "translateX(" + (o.direction === "left" ? "-" + elWidth + "px" : containerWidth + "px") + ")" };
                    }
                }
                $this.trigger("beforeStarting");
                if (css3AnimationIsSupported) {
                    $marqueeWrapper.css(animationString, animationCss3Str);
                    var keyframeCss = keyframeString + " { 100%  " + _objToString(animationCss) + "}",
                        $styles = $marqueeWrapper.find("style");
                    if ($styles.length !== 0) {
                        $styles.filter(":last").html(keyframeCss);
                    } else {
                        $("head").append("<style>" + keyframeCss + "</style>");
                    }
                    _prefixedEvent($marqueeWrapper[0], "AnimationIteration", function () {
                        $this.trigger("finished");
                    });
                    _prefixedEvent($marqueeWrapper[0], "AnimationEnd", function () {
                        animate();
                        $this.trigger("finished");
                    });
                } else {
                    $marqueeWrapper.animate(animationCss, o.duration, o.easing, function () {
                        $this.trigger("finished");
                        if (o.pauseOnCycle) {
                            _startAnimationWithDelay();
                        } else {
                            animate();
                        }
                    });
                }
                $this.data("runningStatus", "resumed");
            };
            $this.on("pause", methods.pause);
            $this.on("resume", methods.resume);
            if (o.pauseOnHover) {
                $this.on("mouseenter", methods.pause);
                $this.on("mouseleave", methods.resume);
            }
            if (css3AnimationIsSupported && o.allowCss3Support) {
                animate();
            } else {
                _startAnimationWithDelay();
            }
        });
    };
    $.fn.marquee.defaults = {
        allowCss3Support: true,
        css3easing: "linear",
        easing: "linear",
        delayBeforeStart: 1e3,
        direction: "left",
        duplicated: false,
        duration: 5e3,
        speed: 0,
        gap: 20,
        pauseOnCycle: false,
        pauseOnHover: false,
        startVisible: false,
    };
});
