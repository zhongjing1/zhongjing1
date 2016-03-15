function center(obj) {
    var windowWidth = document.documentElement.clientWidth;
    var windowHeight = document.documentElement.clientHeight;
    var popupHeight = $(obj).height();
    var popupWidth = 460;
    if ($(obj).width() == document.documentElement.clientWidth) {
        popupWidth = 460
    } else {
        popupWidth = $(obj).width()
    }
    $(obj).css({
        "position": "absolute",
        "top": (windowHeight - popupHeight) / 2 + $(document).scrollTop(),
        "left": (windowWidth - popupWidth) / 2
    })
}
function validatekeyword() {
    if ($.trim($(".txtSearchKey").val()).length == 0 || $.trim($(".txtSearchKey").val()) == "请输入关键字，以空格隔开") {
        alert("请输入查询关键词！");
        return false
    } else {
        reg = /^[一-龥A-Za-z0-9\-_+——.\+\(\)\（\）\/\s]+$/;
        if (!reg.test($(".txtSearchKey").val())) {
            $(".txtSearchKey").val("");
            alert("请输入由中文、英文、数字、空格、下划线、中横线组成的关键词！");
            return false
        } else {
            return true
        }
    }
}
function getLength(str) {
    var len = str.length;
    var reLen = 0;
    for (var i = 0; i < len; i++) {
        if (str.charCodeAt(i) < 27 || str.charCodeAt(i) > 126) {
            reLen += 2
        } else {
            reLen++
        }
    }
    return reLen
}
function ShowDiv(show_div, bg_div, pageurl, callback) {
    if ($("#fade").length == 0) {
        $("body").append("<div id=\"fade\" class=\"black_overlay\"></div><div id=\"" + show_div + "\" class=\"white_content\"><div style=\"text-align:right;cursor:default;height:40px;\"><span style=\"font-size:16px;\" onclick=\"CloseDiv('" + show_div + "','fade')\">关闭</span></div>")
    }
    var bgdiv = $("#" + bg_div);
    var bgheight = document.body.scrollHeight;
    bgdiv.attr("style", "display:block; height:" + bgheight + "px;width:" + document.body.scrollWidth + "px;");
    $.ajax({
        url: pageurl,
        cache: false,
        success: function (html) {
            $("#" + show_div).attr("style", "display:block");
            $("#" + show_div).html(html);
            center($("#" + show_div));
            if (callback) {
                callback()
            }
        }
    })
};

function CloseDiv(show_div, bg_div) {
    $("#" + show_div).attr("style", "display:none");
    $("#" + bg_div).attr("style", "display:none")
};

function addFeedback() {
    var resPhone = CheckPhoneOrTel($(".phoneortel"));
    var resEmail = CheckEmail($(".email"));
    var addlink = $("#Addlink");
    addlink.removeAttr("onlick");
    var sublen = $("#txtsug").val().length;
    if (sublen == 0 || sublen > 500 || resPhone == "0" || resEmail == "0") {
        $("#error").html("");
        if (sublen == 0) {
            $("#error").html($("#error").html() + " 请填写您的问题或建议！<br/>")
        }
        if (sublen > 500) {
            $("#error").html($("#error").html() + " 请您控制您的问题或建议在500字以内！<br/>")
        }
        if (resPhone == "0") {
            $("#error").html($("#error").html() + " 请填写正确的联系方式！<br/>")
        }
        if (resEmail == "0") {
            $("#error").html($("#error").html() + " 请填写真实的邮箱地址！<br/>")
        }
        return false
    } else {
        $.ajax({
            type: "post",
            dataType: "json",
            data: "sug=" + $("#txtsug").val() + "&tel=" + $("#txtTel").val() + "&mail=" + $("#txtMail").val(),
            url: "/pro/RJFeedBack.ashx?oper=addfeedback",
            success: function (d) {
                switch (d.result) {
                    case '0':
                        $("#error").text("添加失败！");
                        break;
                    case '1':
                        $("#add").attr("style", "padding-bottom:0px;display:none");
                        $("#OK").attr("style", "padding-bottom:0px;display:block");
                        break
                }
            }
        })
    }
    addlink.attr("onlick", "addFeedback()")
}
function CheckPhoneOrTel(obj) {
    var regex = /^1[3|4|5|8][0-9]\d{8}$/;
    var regexTel = /^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/;
    if (regex.test($(obj).val()) || regexTel.test($(obj).val()) || $(obj).val().length == 0) {
        $("#error").text($("#error").text().replace("请填写正确的联系方式", ""));
        return "1"
    } else {
        $("#error").text(" 请填写正确的联系方式 ");
        return "0"
    }
}
function CheckEmail(obj) {
    var reg = /^[a-zA-Z0-9]([a-zA-Z0-9]*[-_.]?[a-zA-Z0-9]+)+@([\w-]+\.)+[a-zA-Z]{2,}$/;
    if (reg.test($(obj).val()) || $(obj).val().length == 0) {
        $("#error").text($("#error").text().replace("请填写真实的邮箱地址", ""));
        return "1"
    } else {
        $("#error").text(" 请填写真实的邮箱地址");
        return "0"
    }
}
if ($(window).width() <= 1150) {
    var j = $(window).height() / 2 - 65;
    $(".left_sl").css({
        "left": "5px",
        "top": j
    })
} else {
    var j = $(window).height() / 2 - 65;
    var i = $(window).width() / 2 - 570;
    $(".left_sl").css({
        "left": i,
        "top": j
    })
}
if ($(window).width() <= 1150) {
    var j = $(window).height() / 2 - 65;
    $(".right_sl").css({
        "right": "5px",
        "top": j
    })
} else {
    var j = $(window).height() / 2 - 65;
    var i = $(window).width() / 2 - 600;
    $(".right_sl").css({
        "right": i,
        "top": j
    })
}
function diu_Randomize(B, A) {
    if (!B && B != 0 || !A) {
        return "?"
    }
    return Math.floor((Math.random() * A) + B)
}
$(document).ready(function () {
    document.onkeydown = function (S) {
        var T = document.all ? window.event : S;
        var R = document.activeElement.id;
        var reg = /^[一-龥A-Za-z0-9\-_+——.\+\(\)\（\）\/\s]+$/;
        if (T.keyCode == 13) {
            if ((R == "txtPSN" || R == "txtLCode" || R == "txtDCode" || R == "txtVCode") && window.location.href.indexOf("GenuineValidation.aspx") > -1) {
                $("#btnSearch")[0].focus();
                $("#btnSearch")[0].click();
                return
            }
            if ((R == "tb_EntiretySuggest" || R == "tb_SectionDefined" || R == "tb_hopeText" || R == "tb_RealName" || R == "tb_Email" || R == "tb_Phone" || R == "tb_validate") && window.location.href.indexOf("service/Feedback.aspx") > -1) {
                $("#bt_Submit")[0].focus();
                $("#bt_Submit")[0].click();
                return
            }
            if ((R == "txtName" || R == "txtWork" || R == "txtTEL" || R == "txtArea" || R == "txtCommany" || R == "txtModel" || R == "txtEmail" || R == "txtMotif" || R == "txtText" || R == "txtComMark") && window.location.href.indexOf("complaints.aspx") > -1) {
                $("#btnOK")[0].focus();
                $("#btnOK")[0].click();
                return
            }
            if (R == "txtsug" && document.activeElement.form.action.indexOf("RJFeedBack.aspx") > -1) {
                return
            }
            if ((R == "txtTel" || R == "txtMail") && document.activeElement.form.action.indexOf("RJFeedBack.aspx") > -1) {
                $("#" + R).blur();
                return
            }
            if (R == "HeaderUC1_txtPartnerID" || R == "HeaderUC1_txtPartnerPass" || R == "HeaderUC1_txtPartnerMark") {
                $("#HeaderUC1_btnPartner_Login")[0].focus();
                $("#HeaderUC1_btnPartner_Login")[0].click();
                return
            }
            if (R == "txtPartnerID" || R == "txtPartnerPass" || R == "txtPartnerMark") {
                $("#btnPartner_Login")[0].focus();
                $("#btnPartner_Login")[0].click();
                return
            }
            if (R == "txtUserID" || R == "txtPass" || R == "txtMark") {
                $("#btn_Login")[0].focus();
                $("#btn_Login")[0].click();
                return
            }
            if (R == "txtRegUserID" || R == "txtRegPass" || R == "txtRegRePass" || R == "txtRegEmail" || R == "txtRegMark") {
                $("#btnRegisterSubmit")[0].focus();
                $("#btnRegisterSubmit")[0].click();
                return
            }
            if (!reg.test($("#" + R).val())) {
                $("#" + R).val("");
                alert("请输入由中文、英文、数字、空格、下划线、中横线组成的关键词！");
                return false
            } else {
                if ($("#" + R).val() == "") return;
                if (R == "txtSearchKey" && window.location.href.indexOf("service.aspx") > -1) {
                    window.location.href = "/service/KnowSearch_" + $("#" + R).val() + "_1"
                }
                if (R == "txtSearchKey" && (window.location.href.indexOf("know.aspx") > -1 || window.location.href.indexOf("DocSearch") > -1)) {
                    window.location.href = "/service/KnowSearch_" + $("#" + R).val() + "_1"
                }
                if (R == "txtSearchKey" && (window.location.href.indexOf("doc.aspx") > -1 || window.location.href.indexOf("KnowSearch") > -1)) {
                    window.location.href = "/service/DocSearch_0_0_0_" + $("#" + R).val() + "_3"
                }
                if (R == "txtSearchKey" && (window.location.href.indexOf("download.aspx") > -1 || window.location.href.indexOf("SoftSearch") > -1)) {
                    window.location.href = "/service/SoftSearch_0_" + $("#" + R).val()
                }
                if (R == "txtSearchKey" && window.location.href.indexOf("search") > -1) {
                    window.location.href = "/search_1_" + $("#" + R).val() + "_15_0_false"
                }
                if (R == "HeaderUC1_txtSearchKey") {
                    window.location.href = "/search_1_" + $("#" + R).val() + "_15_0_false"
                }
            }
        }
    };
    CallWebChat();
    RightFloat();
    var K = ["融合网络", "数据中心交换机", "云架构网络", "千兆PoE交换机", "Newton 18000系列", "RG-S6220系列", "RG-S2900G-E/P系列", "RG-S12000系列", "PowerCache", "EG", "业务保障网关", "网络出口引擎", "流量控制引擎", "内容加速系统", "中小网络优化网关", "应用性能管理平台", "4G路由器", "RSR77系列", "RSR10-02E", "RSR10-01G", "RSR20-14E", "RSR20-14F", "RSR30-44", "下一代防火墙", "安全路由交换一体机", "数据中心防火墙", "SSL VPN", "上网行为管理", "网页防护网关", "数据库审计", "入侵检测与防御系统", "多业务模块", "X-sense", "灵动天线", "智分", "802.11ac千兆无线AP", "Wall AP", "RG-AP530-I", "RG-AP330-I", "RG-AP320-I", "RG-AP110-W", "RG-AP220-E(M)", "RG-AP220-E(M)-V2", "SMP", "ESS", "SNC", "SAM", "CVM"];
    var C = diu_Randomize(0, K.length - 1);
    if ($(".search_int").val() == "") {
        $(".search_int").val(K[C])
    }
    $(".search_int").blur(function () {
        if ($(".search_int") == "") {
            $(".search_int").val(K[C])
        }
    });
    $(".search_int").focus(function () {
        $(".search_int").val("")
    });
    if ($(window).width() <= 1150) {
        var D = $(window).height() / 2 - 65;
        $(".left_sl").css({
            "left": "5px",
            "top": D
        })
    } else {
        var D = $(window).height() / 2 - 65;
        var F = $(window).width() / 2 - 570;
        $(".left_sl").css({
            "left": F,
            "top": D
        })
    }
    if ($(window).width() <= 1150) {
        var D = $(window).height() / 2 - 65;
        $(".right_sl").css({
            "right": "5px",
            "top": D
        })
    } else {
        var D = $(window).height() / 2 - 65;
        var F = $(window).width() / 2 - 600;
        $(".right_sl").css({
            "right": F,
            "top": D
        })
    }
    var N = null;
    $(window).resize(function () {
        if (N) {
            clearTimeout(N)
        }
        N = setTimeout(function () {
            if ($(window).width() <= 1150) {
                var S = $(window).height() / 2 - 65;
                $(".left_sl").css({
                    "left": "5px",
                    "top": S
                })
            } else {
                var S = $(window).height() / 2 - 65;
                var R = $(window).width() / 2 - 570;
                $(".left_sl").css({
                    "left": R,
                    "top": S
                })
            }
            if ($(window).width() <= 1150) {
                var S = $(window).height() / 2 - 65;
                $(".right_sl").css({
                    "right": "5px",
                    "top": S
                })
            } else {
                var S = $(window).height() / 2 - 65;
                var R = $(window).width() / 2 - 600;
                $(".right_sl").css({
                    "right": R,
                    "top": S
                })
            }
        }, 50)
    });
    if ($(window).width() <= 1150) {
        var D = $(window).height() / 2 + 250;
        $(".right_s2").css({
            "left": "5px",
            "top": D
        })
    } else {
        var D = $(window).height() / 2 + 250;
        var F = $(window).width() / 2 - 600;
        $(".right_s2").css({
            "left": F,
            "top": D
        })
    }
    var N = null;
    $(window).resize(function () {
        if (N) {
            clearTimeout(N)
        }
        N = setTimeout(function () {
            if ($(window).width() <= 1150) {
                var S = $(window).height() / 2 + 250;
                $(".right_s2").css({
                    "left": "5px",
                    "top": S
                })
            } else {
                var S = $(window).height() / 2 + 250;
                var R = $(window).width() / 2 - 600;
                $(".right_s2").css({
                    "left": R,
                    "top": S
                })
            }
        }, 50)
    });
    $(".product_box .addclear dl:odd").after("<div class='clear'></div>");
    $(".pro_list .pro_child:odd").addClass("odd");
    $(".pro_list .pro_child").each(function (R) {
        $(this).find(".pro_listcont_box li:last").css({
            "border-right": "none"
        });
        $(this).find(".pro_listcont_box li:nth-child(5n)").css({
            "border-right": "none"
        });
        $(this).find(".pro_listhover .bon").click(function () {
            $(this).toggleClass("on");
            if ($(this).hasClass("on")) {
                $(this).parents(".pro_listhover").find(".pro_listcont").hide();
                $(".blankclear").hide()
            } else {
                $(this).parents(".pro_listhover").find(".pro_listcont").show();
                var S = $(this).parents(".pro_listhover").find(".pro_listcont_box").height();
                R == 0 || R == 1 ? $("#blnk1").css({
                    height: S
                }).show() : 0;
                R == 2 || R == 3 ? $("#blnk2").css({
                    height: S
                }).show() : 0;
                R == 4 || R == 5 ? $("#blnk3").css({
                    height: S
                }).show() : 0;
                R == 6 || R == 7 ? $("#blnk4").css({
                    height: S
                }).show() : 0;
                R == 8 || R == 9 ? $("#blnk5").css({
                    height: S
                }).show() : 0;
                R == 10 || R == 11 ? $("#blnk6").css({
                    height: S
                }).show() : 0
            }
        });
        $(".pro_child").hover(function () {
            $(this).find(".pro_listhover .title .bon").addClass("on").show()
        }, function () {
            $(this).find(".pro_listhover .title .bon").removeClass("on").hide();
            $(this).find(".pro_listcont").hide();
            $(".blankclear").hide()
        })
    });
    $(".case_hye span").click(function () {
        $(this).siblings().find(".case_hye_on").removeClass("case_hye_on");
        $(this).find("a").addClass("case_hye_on");
        for (F = 0; F < 11; F++) {
            var R = $(this).index();
            $(".abo_case").hide();
            $(".abo_case" + R).show()
        }
    });
    $(".leftnav .cont .li").each(function (R) {
        $(this).find(".leftnav_child dl:last").css({
            "border-bottom": 0
        })
    });
    $(".p_service dl:nth-child(3n)").after("<div class='clear'></div>");
    //首页滚动
    var O;
    var H = 0;
    $(".in_bk_3 dt span").each(function (R) {
        $(this).click(function () {
            $(this).siblings().removeClass("on");
            $(this).addClass("on");
            $(".in_bk_3 dd").stop().animate({
                left: R * -230
            }, 500);
            O = R
        })
    });
    var I = setInterval(function () {
        H++;
        H >= 3 ? H = 0 : 0;
        $(".in_bk_3 dt span").eq(H).siblings().removeClass("on");
        $(".in_bk_3 dt span").eq(H).addClass("on");
        $(".in_bk_3 dd").stop().animate({
            left: H * -230
        }, 500)
    }, 6000);
    var Onew = 0;
    var Hnew = 0;
    $(".in_bk_right dt span").each(function (R) {
        $(this).click(function () {
            $(this).siblings().removeClass("on");
            $(this).addClass("on");
            $(".in_bk_right dd").stop().animate({
                left: R * -229
            }, 500);
            Onew = R
        })
    });
    var Inew = setInterval(function () {
        Hnew++;
        Hnew >= 5 ? Hnew = 0 : 0;
        $(".in_bk_right dt span").eq(Hnew).siblings().removeClass("on");
        $(".in_bk_right dt span").eq(Hnew).addClass("on");
        $(".in_bk_right dd").stop().animate({
            left: Hnew * -229
        }, 500)
    }, 6000);
    $(".pro_box2 .tit_ul li").each(function (R) {
        $(this).mouseenter(function () {
            $(this).siblings().removeClass("on");
            $(this).addClass("on");
            $(".pro_box2 .pro_cont .por_li").css("display", "none");
            $(".pro_box2 .pro_cont .por_li").eq(R).css("display", "block")
        })
    });
    String.prototype.Trim = function () {
        return this.replace(/(^\s*)|(\s*$)/g, "")
    };
    var L = $.trim($("#matching").text());
    if (L) {
        $(".leftnav .li h2:contains(" + L + ")").addClass("on")
    }
    var B = $("#sec_match").text();
    if (B) {
        $(".leftnav_child dd a:contains(" + B + ")").addClass("on")
    }
    var G = $("#thi_match").text();
    if (G) {
        $(".leftnav_child dd samp a:contains(" + G + ")").addClass("on")
    }
    var A = $("#nav_match").text();
    if (A) {
        $(".top_nav strong:contains(" + A + ")").addClass("nav_on")
    }
    $(".product_bottom .right .fl li").each(function (R) {
        $(this).mouseenter(function () {
            $(this).siblings().removeClass("on");
            $(this).addClass("on");
            $("..product_bottom .p_bottom_box").css("display", "none");
            $("..product_bottom .p_bottom_box").eq(R).css("display", "block")
        })
    });
    $("#ch1_1").mouseenter(function () {
        $("#ch2_2").stop().animate({
            width: 10,
            height: 10,
            opacity: 0
        });
        $("#ch1_2").animate({
            width: 466,
            height: 440,
            opacity: 1
        })
    });
    $("#ch1_2").mouseleave(function () {
        $("#ch1_2").stop().animate({
            width: 10,
            height: 10,
            opacity: 0
        })
    });
    $("#ch2_1").mouseenter(function () {
        $("#ch1_2").stop().animate({
            width: 10,
            height: 10,
            opacity: 0
        });
        $("#ch2_2").animate({
            width: 466,
            height: 440,
            opacity: 1
        })
    });
    $("#ch2_2").mouseleave(function () {
        $("#ch2_2").stop().animate({
            width: 10,
            height: 10,
            opacity: 0
        })
    });
    var J;
    var Q = 0;
    $(".nav_child").css({
        opacity: 0
    });
    $(".top_nav li").each(function (R) {
        $(this).mouseover(function () {
            $(this).siblings().find("strong").removeClass("on");
            $(this).find("strong").addClass("on");
            if (R > 0 && R!=3) {
                E(R - 1)
            }
        })
    });

    function E(R) {
        clearInterval(J);
        Q = 0;
        if ($(".nav_child").height() == 0) {
            $(".nav_cont").css({
                left: R * -1000
            })
        }
        $(".banner").css({
            paddingTop: 0
        });
        $(".nav_child").stop().animate({
            height: 260,
            opacity: 1
        }, 500);
        $(".nav_cont").stop().animate({
            left: R * -1000
        }, 500, "easeInOutQuart");
        $(".nav_child_box").stop().animate({
            top: 0
        }, 500);
        $(".header").bind("mouseleave", function (S) {
            M();
            $(window).unbind("mousemove")
        })
    }
    $(".nav_child .nav_close").click(function () {
        M()
    });

    function P() {
        Q++;
        Q <= 10 ? M() : 0
    }
    function M() {
        clearInterval(J);
        Q = 0;
        $(".top_nav li strong").removeClass("on");
        $(".nav_child").stop().animate({
            height: 0,
            opacity: 0
        }, 500, "easeOutSine");
        $(".banner").css({
            paddingTop: 10
        });
        $(".nav_child_box").stop().animate({
            top: -300
        }, 500)
    }
    $(function () {
        var T = $(".ul_box ul");
        var S = $(".ul_box ul li:eq(0)").height();
        var V = null;
        var U = $(".s_bon .fl");
        var R = $(".s_bon .fr");
        if (T.find("li").size() == 1) {
            return false
        }
        function X() {
            if (!T.is(":animated")) {
                T.find("li:last").clone().prependTo(T);
                T.css("top", "-" + S + "px");
                T.animate({
                    "top": "+=" + S + "px"
                }, 400);
                T.find("li:last").remove()
            }
        }
        function W() {
            if (!T.is(":animated")) {
                T.animate({
                    "top": "-=" + S + "px"
                }, 400, function () {
                    $(this).css("top", "0px").find("li:first").appendTo($(this))
                })
            }
        }
        U.click(function () {
            X()
        });
        R.click(function () {
            W()
        });
        V = setInterval(W, 3000);
        $(".ul_box,.s_bon .fl,.s_bon .fr").hover(function () {
            clearTimeout(V)
        }, function () {
            V = setInterval(W, 3000)
        })
    })
});
$("input .normaltext").blur(function () {
    if (!obj.val().match(/^[u4E00-u9FA5a-zA-Z0-9\-_+——.\+\(\)\（\）\/\s]{0,}$/)) {
        obj.val("");
        alert("请输入中、英文字符或数字")
    }
});

function setApDiv(C, G, H) {
    var K = $(G);
    var B = $(C);
    var J = 0;
    var D = 0;
    var I = K.find("li").size();
    var A = 0;
    var F = 1;
    K.find("li").each(function (L) {
        B.find("li").eq(L).hide();
        $(this).click(function () {
            J = L;
            F = L + 1;
            if (L != D) {
                B.find("li").eq(L).css({
                    "z-index": I
                });
                B.find("li").eq(D).css({
                    "z-index": I - 1
                });
                B.find("li").eq(L).fadeIn(200, function () {
                    B.find("li").eq(D).fadeOut(200);
                    D = J
                });
                $(this).siblings().removeClass("on");
                $(this).addClass("on");
                return false
            }
        });
        B.find("li").eq(0).fadeIn(500);
        K.find("li").eq(0).addClass("on")
    });
    var E = function (L) {
        if (L) {
            if (J == 0) {
                todo = I - 1
            } else {
                todo = (J - 1) % I
            }
        } else {
            todo = (J + 1) % I
        }
        K.find("li").eq(todo).click()
    };
    K.find(".cont li").each(function (L) {
        K.parents("ul").width((L + 1) * 47);
        A = L
    });
    K.find(".pre").click(function () {
        A = $(this).parent().find("ul li").size();
        F--;
        if (F <= 0) {
            F = A
        }
        if (F < A - 3) {
            K.find("ul").animate({
                "left": -47 * (F - 1) + "px"
            })
        }
        if (F == A) {
            K.find("ul").animate({
                "left": -47 * (F - 4) + "px"
            })
        }
        E(true);
        return false
    });
    K.find(".next").click(function () {
        A = $(this).parent().find("ul li").size();
        F++;
        if (F > A) {
            F = 1
        }
        if (F > 3) {
            K.find("ul").animate({
                "left": -47 * (F - 4) + "px"
            })
        }
        if (F == 1) {
            K.find("ul").animate({
                "left": -47 * (F - 1) + "px"
            })
        }
        E(false);
        return false
    })
}
$(document).ready(function () {
    setApDiv(".show_left .img", ".show_left .bon")
});
$(document).ready(function () {
    $(".prev").click(function () {
        var D = $(".in_cont_1 ul li").eq(0).width() + 20;
        if (!$(".in_cont_1 ul").is(":animated")) {
            $(".in_cont_1 ul").css("margin-left", "-" + D + "px").find("li").last().clone().prependTo($(".in_cont_1 ul"));
            $(".in_cont_1 ul").animate({
                "margin-left": 0
            }, "normal", function () {
                $(".in_cont_1 ul").find("li").last().remove()
            })
        }
    });
    $(".next").click(function () {
        var D = $(".in_cont_1 ul li").eq(0).width() + 20;
        if (!$(".in_cont_1 ul").is(":animated")) {
            $(".in_cont_1 ul").find("li").first().clone().appendTo($(".in_cont_1 ul"));
            $(".in_cont_1 ul").animate({
                "margin-left": "-" + D + "px"
            }, "normal", function () {
                $(".in_cont_1 ul").css("margin-left", "0px").find("li").first().remove()
            })
        }
    });
    $(".orban_play a").click(function () {
        $(".orban_pl_img").show()
    });
    $(".pl_img_b a").click(function () {
        $(".orban_pl_img").hide()
    });
    $(".news_arc_info_size span").click(function () {
        $(this).addClass("tag_on").siblings().removeClass("tag_on");
        var G = $(this).index();
        if (G == 0) {
            $(".news_arc_cont").css({
                "font-size": "16px"
            })
        } else {
            if (G == 1) {
                $(".news_arc_cont").css({
                    "font-size": "14px"
                })
            } else {
                $(".news_arc_cont").css({
                    "font-size": "12px"
                })
            }
        }
    });
    $(".news_arc_info_print span").click(function () {
        doPrint()
    });
    $(".vidioWrap li:nth-child(3n)").css("margin-right", 0);
    var C = $(".noteYearC .curYear").index();
    $(".noteCntItem").eq(C).show();
    $(".noteYearC li").click(function () {
        $(this).addClass("curYear").siblings().removeClass("curYear");
        $(".noteCntItem").eq($(this).index()).show().siblings().hide()
    });
    var E = $(".noteYearC li").size() - 7;
    var B = 0;
    $(".bntLeft").click(function () {
        F();
        if (B > 0 && !$(".noteYearC ul").is(":animated")) {
            $(".noteYearC ul").animate({
                "left": "+=" + 115
            }, "normal");
            B--
        }
    });
    $(".bntRight").click(function () {
        A();
        if (B < E && !$(".noteYearC ul").is(":animated")) {
            $(".noteYearC ul").animate({
                "left": "-=" + 115
            }, "normal");
            B++
        }
    });

    function A() {
        var G = $(".noteYearC .curYear").index() + 1;
        if (G < 6) {
            $(".noteYearC li").siblings().removeClass("curYear");
            $(".year" + G).addClass("curYear");
            G++
        }
    }
    function F() {
        var G = $(".noteYearC .curYear").index() - 1;
        if (G > -1) {
            $(".noteYearC li").siblings().removeClass("curYear");
            $(".year" + G).addClass("curYear");
            G--
        }
    }
    $("#PreMarketTalk").click(function () {
        if (window.GridsumWebDissector) {
            var G = GridsumWebDissector.getTracker("GWD-000716");
            G.track("/targetpagePre" + location.pathname)
        }
        vjEventTrack("shouqian");
        if (window.location.href.toLowerCase().indexOf("/smb") >= 0 || window.location.href.toLowerCase().indexOf("/special/20140308/") >= 0 || window.location.href.toLowerCase().indexOf("/special/20131224/") >= 0 || window.location.href.toLowerCase().indexOf("/special/ruiyi/") >= 0 || window.location.href.toLowerCase().indexOf("/special/20131029/") >= 0 || window.location.href.toLowerCase().indexOf("/special/20130402/") >= 0 || window.location.href.toLowerCase().indexOf("/special/20121023/") >= 0) {
            open_pic_chat_smb();
        }
        else {
            open_pic_chat_up();
        }
        return false
    });
    $("#AfterSaleTalk").click(function () {
        if (window.GridsumWebDissector) {
            var G = GridsumWebDissector.getTracker("GWD-000716");
            G.track("/targetpagePost" + location.pathname)
        }
        vjEventTrack("shouhou");
        open_pic_chat();
        return false
    });
    $("#TmaillShop").click(function () {
        if (window.GridsumWebDissector) {
            var G = GridsumWebDissector.getTracker("GWD-000716");
            G.track("/targetpagePost" + location.pathname)
        }
        vjEventTrack("shangdian");
        window.open("http://shop104559744.taobao.com/?spm=0.0.0.0.TKToWN");
        return false
    })
});

function open_pic_chat_smb() {
    var D = "http://webchat.ruijie.com.cn/live800/chatClient/chatbox.jsp?companyID=8933&configID=13&skillId=13";
    var C = encodeURIComponent(document.URL);
    var E = encodeURIComponent(document.referrer);
    var A = D + "&enterurl=" + C + "&pagereferrer=" + E;
    try {
        window.open(A, "在线客服", "toolbar=0,scrollbars=0,location=0,menubar=0,resizable=1,width=650,height=520")
    } catch (B) { }
}
function open_pic_chat_up() {
    var D = "http://webchat.ruijie.com.cn/live800/chatClient/chatbox.jsp?companyID=8933&configID=7&skillId=9&k=1";
    var C = encodeURIComponent(document.URL);
    var E = encodeURIComponent(document.referrer);
    var A = D + "&enterurl=" + C + "&pagereferrer=" + E;
    try {
        window.open(A, "在线客服", "toolbar=0,scrollbars=0,location=0,menubar=0,resizable=1,width=650,height=520")
    } catch (B) { }
}
function open_pic_chat() {
    var D = "http://webchat.ruijie.com.cn/live800/chatClient/chatbox.jsp?companyID=8933&configID=7&skillId=1&k=1";
    var C = encodeURIComponent(document.URL);
    var E = encodeURIComponent(document.referrer);
    var A = D + "&enterurl=" + C + "&pagereferrer=" + E;
    try {
        window.open(A, "在线客服", "toolbar=0,scrollbars=0,location=0,menubar=0,resizable=1,width=650,height=520")
    } catch (B) { }
}
function GetA(D, A, C) {
    var B = "";
    $.getJSON("/service/UserControls/servicedoc.ashx?t=1&St=" + C + "&Id=" + D, function (F) {
        for (var E = 0; E < F.length; E++) {
            B += '<li id="ser_' + F[E].ID + '" ><a  style="cursor:pointer" title="' + F[E].Cname + '" onclick="GetB(' + F[E].ID + "," + A + "," + C + ')"  >' + F[E].Cname;
            if (A == 2 && parseInt(F[E].IOrder) > 0) {
                B += "<img src=\"/s/images/icon/lock.png\" style=\"margin-left:10px;\"  />";
            }
            B += "</a></li>";
        }
        $("#line1").html(B);
        $("#line2").html("");
        $(".serselectline").removeClass("serselectline");
        $("#line_" + D).addClass("serselectline");
        if (F.length > 7) {
            $("#divpls").addClass("sernavJsStyle")
        } else {
            $("#divpls").removeClass("sernavJsStyle")
        }
    })
}
function GetB(D, A, C) {
    var B = "";
    if (D != 0) {
        $.getJSON("/service/UserControls/servicedoc.ashx?t=2&St=" + C + "&Id=" + D, function (F) {
            for (var E = 0; E < F.length; E++) {
                if (A == 1) {
                    B += '<li><a href="/service/DocSearchList_3_' + F[E].ID + '_0_0" target="_blank" title="' + F[E].Cname + '">' + F[E].Cname + "</a></li>"
                }
                if (A == 2) {
                    B += '<li><a href="/service/SoftSearch_1_' + F[E].Htmlname + '" target="_blank" title="' + F[E].Cname + '" >' + F[E].Cname;
                    if (F[E].ttop == "True") {
                        B += "<img src=\"/s/images/icon/lock.png\" style=\"margin-left:10px;\"  />";
                    }
                    B += "</a></li>"
                }
            }
            if (C == 1) {
                if (F.length > 4) {
                    $("#divStyle").addClass("sernavJsStyle")
                } else {
                    $("#divStyle").removeClass("sernavJsStyle")
                }
            } else {
                if (F.length > 7) {
                    $("#divStyle").addClass("sernavJsStyle")
                } else {
                    $("#divStyle").removeClass("sernavJsStyle")
                }
            }
            $("#line2").html(B);
            $(".serselectser").removeClass("serselectser");
            $("#ser_" + D).addClass("serselectser")
        })
    }
}
function seclec(B) {
    var A = $(B);
    A.click(function (D) {
        if ($(this).hasClass("open")) {
            C($(this).find(".xiala_con"))
        } else {
            $(this).addClass("open");
            $(this).find(".xiala_con").slideDown("fast")
        }
        D.stopPropagation()
    });

    function C(D) {
        try {
            $(D).slideUp("fast", function () {
                D.parents().removeClass("open")
            })
        } catch (E) { }
    }
    A.mouseleave(function () {
        C($(this).find(".xiala_con"))
    });
    $(document).bind("click", function () {
        C($(this).find(".xiala_con"))
    });
    A.find(".xiala_con span").click(function (E) {
        var F = E.target;
        if (F.tagName == "A") {
            var D = $(F).parent();
            $(this).parent().siblings(".xiala_tit").html($(F).html());
            $(F).siblings().removeClass();
            F.className = "current";
            D.val($(F).val())
        }
    })
}
$(function () {
    seclec(".soft_sselc");
    seclec(".feed_xiala");
    seclec(".login_save");
    seclec(".coop_axial");
    seclec(".coop_jxial")
});
$(function () {
    var A = function () {
        var E = 1000;
        var C;
        var J = $(".ban_list ul");
        var H = $(".ban_left ul");
        var K = '<em class="topxx">　</em><em class="bottomxx">　</em>';
        var F = 0;
        var G = $(".ban_left ul li").size() - 1;
        var D = 5;
        $(".ban_list ul li:gt(0)").css({
            opacity: 0
        });
        H.find("li").eq(0).addClass("on");
        H.find("li").each(function (L) {
            $(this).append(K);
            $(this).click(function () {
                if (L == F) {
                    return false
                } else {
                    H.find("li").removeClass("on");
                    H.find("li").eq(L).addClass("on");
                    J.find("li").eq(F).stop().animate({
                        opacity: 0,
                        zIndex: 0
                    }, 800);
                    J.find("li").eq(L).stop().animate({
                        opacity: 1,
                        zIndex: G
                    }, 800);
                    var M = Math.floor(Math.random() * 4);
                    switch (M) {
                        case 0:
                            J.find("li").eq(F).find(".posxx").animate({
                                top: 340
                            }, 800);
                            J.find("li").eq(L).find(".posxx").css({
                                top: -340,
                                left: 0
                            });
                            J.find("li").eq(L).find(".posxx").delay(500).stop().animate({
                                top: 0,
                                left: 0
                            }, 1000, "easeOutCubic");
                            break;
                        case 1:
                            J.find("li").eq(F).find(".posxx").animate({
                                left: 500
                            }, 800);
                            J.find("li").eq(L).find(".posxx").css({
                                top: 0,
                                left: -500
                            });
                            J.find("li").eq(L).find(".posxx").delay(500).stop().animate({
                                top: 0,
                                left: 0
                            }, 1000, "easeOutCubic");
                            break;
                        case 2:
                            J.find("li").eq(F).find(".posxx").animate({
                                top: -340
                            }, 800);
                            J.find("li").eq(L).find(".posxx").css({
                                top: 340,
                                left: 0
                            });
                            J.find("li").eq(L).find(".posxx").delay(500).stop().animate({
                                top: 0,
                                left: 0
                            }, 1000, "easeOutCubic");
                            break;
                        case 3:
                            J.find("li").eq(F).find(".posxx").animate({
                                left: -500
                            }, 800);
                            J.find("li").eq(L).find(".posxx").css({
                                top: 0,
                                left: -500
                            });
                            J.find("li").eq(L).find(".posxx").delay(500).stop().animate({
                                top: 0,
                                left: 0
                            }, 1000, "easeOutCubic");
                            break;
                        default:
                            J.find("li").eq(F).find(".posxx").animate({
                                top: -340
                            }, 800);
                            J.find("li").eq(L).find(".posxx").css({
                                top: 340,
                                left: -500
                            });
                            J.find("li").eq(L).find(".posxx").delay(500).stop().animate({
                                top: 0,
                                left: 0
                            }, 1000, "easeOutCubic")
                    }
                    F = L
                }
            })
        });
        var I = setInterval(B, D * 1000);

        function B() {
            var L = F + 1;
            L > G ? L = 0 : 0;
            H.find("li").eq(L).click()
        }
        H.hover(function () {
            clearInterval(I)
        }, function () {
            I = setInterval(B, D * 1000)
        })
    };
    A()
});
$(document).ready(function () {
    $(".ban_left li").hover(function () {
        $(this).find("img").addClass("ban_suotu")
    }, function () {
        $(this).find("img").removeClass("ban_suotu")
    })
});
$(function () {
    var A = function () {
        var C;
        var H = $(".banner_img");
        var G = $(".banner_bon");
        var E = 0;
        var F = $(".banner_img li").size() - 1;
        var D = 4;
        H.find("li:gt(0)").css({
            opacity: 0
        });
        G.find("span").eq(0).addClass("on");
        $(".banner_top a").attr({
            href: H.find("li").eq(0).find("a").attr("href")
        });
        $(".orban_play_1 a").attr({
            href: H.find("li").eq(0).find("a").attr("rel")
        });
        G.find("span").each(function (J) {
            $(this).click(function () {
                if (J == E) {
                    return false
                } else {
                    $(".banner_top a").attr({
                        href: H.find("li").eq(J).find("a").attr("href")
                    });
                    $(".orban_play_1 a").attr({
                        href: H.find("li").eq(J).find("a").attr("rel")
                    });
                    G.find("span").removeClass("on");
                    G.find("span").eq(J).addClass("on");
                    H.find("li").eq(E).animate({
                        opacity: 0,
                        zIndex: 0
                    });
                    H.find("li").eq(J).animate({
                        opacity: 1,
                        zIndex: F
                    });
                    var K = Math.floor(Math.random() * 4);
                    switch (K) {
                        case 0:
                            H.find("li").eq(E).find(".b_img").animate({
                                top: 200
                            }, 500);
                            H.find("li").eq(J).find(".b_img").css({
                                top: -200,
                                left: 0
                            });
                            H.find("li").eq(J).find(".b_img").delay(500).animate({
                                top: 0,
                                left: 0
                            }, 800);
                            break;
                        case 1:
                            H.find("li").eq(E).find(".b_img").animate({
                                left: -400
                            }, 500);
                            H.find("li").eq(J).find(".b_img").css({
                                top: 0,
                                left: 500
                            });
                            H.find("li").eq(J).find(".b_img").delay(500).animate({
                                top: 0,
                                left: 0
                            }, 800);
                            break;
                        case 2:
                            H.find("li").eq(E).find(".b_img").animate({
                                top: -200
                            }, 500);
                            H.find("li").eq(J).find(".b_img").css({
                                top: 200,
                                left: 0
                            });
                            H.find("li").eq(J).find(".b_img").delay(500).animate({
                                top: 0,
                                left: 0
                            }, 800);
                            break;
                        case 3:
                            H.find("li").eq(E).find(".b_img").animate({
                                left: 400
                            }, 500);
                            H.find("li").eq(J).find(".b_img").css({
                                top: 0,
                                left: 500
                            });
                            H.find("li").eq(J).find(".b_img").delay(500).animate({
                                top: 0,
                                left: 0
                            }, 800);
                            break;
                        default:
                            H.find("li").eq(E).find(".b_img").animate({
                                top: -200
                            }, 500);
                            H.find("li").eq(J).find(".b_img").css({
                                top: 200,
                                left: 500
                            });
                            H.find("li").eq(J).find(".b_img").delay(500).animate({
                                top: 0,
                                left: 0
                            }, 800)
                    }
                    E = J
                }
            })
        });
        var I = setInterval(B, D * 1000);

        function B() {
            var J = E + 1;
            J > F ? J = 0 : 0;
            G.find("span").eq(J).click()
        }
        G.hover(function () {
            clearInterval(I)
        }, function () {
            I = setInterval(B, D * 1000)
        })
    };
    A()
});

function CallWebChat() {
    $("#CallWebChat").text("");
    var A = window.location.href.split("/");
    if (!A[2]) {
        A[2] = "Default.aspx"
    }
    if (!A[3]) {
        A[3] = ""
    }
    if (A[3] == "service" || A[3] == "service.aspx") {
        $("#CallWebChat").append('<span class="s1"><a id="PreMarketTalk"></a></span><span class="s2"><a id="AfterSaleTalk"></a></span><span class="s3"><a id="TmaillShop" target="_blank"></a></span><span class="s4"><a href="/service/Feedback.aspx"></a></span>')
    } else {
        $("#CallWebChat").append('<span class="s1"><a id="PreMarketTalk"></a></span><span class="s2"><a id="AfterSaleTalk"></a></span><span class="s3"><a id="TmaillShop" target="_blank"></a></span> <span class="s4"> <a onclick="vjEventTrack(\'fankui\');ShowDiv(\'MyDiv\',\'fade\',\'/RJFeedBack.aspx\')"></a></span>')
    }
    $("#s5close").live("click", function () {
        $(this).parent().hide()
    })
};

function RightFloat() {
    $("#RightFloat").text("");
    var A = window.location.href.split("/");
    if (!A[2]) {
        A[2] = "Default.aspx"
    }
    if (!A[3]) {
        A[3] = ""
    }
    $("#RightFloat").append('<span class="s5" style=" position:absolute;"><a href="http://www.ruijie.com.cn/ProductSurvey/Default.aspx" target="_blank"><img src="http://image.ruijie.com.cn/UIA/images/SurveyAndLottery.gif?2" /></a><a id="s5close" style="position:absolute; top:0px; right:0px; width:30px; height:30px;cursor:hand;"></a></span>')
    $("#s5close").live("click", function () {
        $(this).parent().hide()
    })
};

//解析JSON返回的时间格式
function formatDate(value) {
    var now = "";
    if (typeof value === 'string') {
        var a = (/^\/Date\((\d+)(([\+\-])(\d\d)(\d\d))?\)/gi).exec(value);
        if (a) {
            var utcMilliseconds = parseInt(a[1], 10) ;
            now = new Date(utcMilliseconds);
        }
    }
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var date = now.getDate();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    return year + "-" + month + "-" + date + "   " + hour + ":" + minute + ":" + second;
} 