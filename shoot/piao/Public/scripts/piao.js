var jsondata;

function backindex(){
    window.location.href=indexURL;
}

function suball(aaa){
    var isselect = $(".selected");
    var info="";
    if(isselect.size() > 0){
        for(i=0;i<isselect.size();i++){
            if(isselect.eq(i).val() != ""){
                info += isselect.eq(i).attr("codename") + ": " +isselect.eq(i).val() + ";";
            }
        }
    }//info_content
    // info_price
    var totalprice = $(".totalprice");
    var info_price = "";
    var totals = 0;
    for(i=0;i<totalprice.length;i++){
        if(parseInt(totalprice.eq(i).val()) > 0){
            totals += parseInt(totalprice.eq(i).val());
            info_price += totalprice.eq(i).attr("codename") + ": " + (totalprice.eq(i).val()).toString() + '; ';
        }
    }
    int_total = parseFloat(totals);
    totals = toMoney(totals);
    var email = $("#email").val();
    tip("信息保存中，请稍后..",true);
    $.post(nextstepURL,
            {
                "price" : totals,
                "content": info,
                "price_content" : info_price,
                "name" : $("#name").val(),
                "tel": $("#tel").val(),
                "wechat" : $("#wechat").val(),
                "email" : email
            },
            function(data){
                tip_close();
                if(aaa==0){
                    window.location.href = 'tel://+852-37582450';
                }
                if(aaa==1){
                   // 支付
                    if(totals > 0){
                        $.post(weixinpayURL,{
                            "amount" : totals
                        },function(data){
                            jsondata =   eval("(" + data + ")");
                            callpay();
                        }, "json");
                    }else{
                        window.location.href = 'tel://+852-37582450';
                    }
                   // window.location.href = 'http://jiajiabaoxian.com/piao/pay/jsapi.php?amount=' + totals;
        }
     }, "json");
}

function totalamount(){
    // 计算总保费
    var totalprice = $(".totalprice");
    var totals = 0;
    for(i=0;i<totalprice.length;i++){
        if(parseInt(totalprice.eq(i).val()) > 0){
            totals += parseInt(totalprice.eq(i).val());
        }
    }
    totals = toMoney(totals);
    $("#total").html("HK$ " + totals);
}

function toMoney(s){
    return parseFloat(s).toLocaleString()
}

function getprice(code){
    var code;
    // 显示等待
    switch (code){
        case "MAMA" :
            age = parseInt($("#MAMA_age").val());
            if(age < 16){
                age = 16;
                $("#MAMA_age").val(age);
            }
            if(age > 69){
                age = 69;
                $("#MAMA_age").val(age);
            }
            $.post(countpriceURL,
                    {
                        "code" : code,
                        "age": age,
                        "option": $("#MAMA_option").hasClass('on'),
                        "plan": $("#MAMA_plan").find(".on").attr("data-option")
                    },
                    function(data){
                        $("." + code + "_price").attr("value",data);
                        $("." + code + "thisprice").html('HK$ ' +data);
                        var thisitem = $("." + code + "thisprice").parents(".itemBar");
                        thisitem.addClass( thisitem.attr("color-option") + "-title");
                        totalamount();
                       // console.log(data);
                        //隐藏等待
                      //  return data;
                    }, "json");
            break;
        case "FATHER" :
        case "CHILD":
            age = parseInt($("#"+code+"_age").val());
            if(age <0){
                age = 0;
                $("#"+code+"_age").val(age);
            }
            if(age > 99){
                age = 50;
                $("#"+code+"_age").val(age);
            }
            option = 0;
                for(i=0;i<$("."+code+"_option").length;i++){
                    if($("."+code+"_option").eq(i).hasClass('on')){
                        option += parseInt($("."+code+"_option").eq(i).attr("data-option"));
                    }
                }
            plan = 0;
                for(i=0;i<$("."+code+"_plan").length;i++){
                    if($("."+code+"_plan").eq(i).hasClass('on')){
                        plan = parseInt($("."+code+"_plan").eq(i).attr("data-option"));
                    }
                }
            $.post(countpriceURL,
                    {
                        "code" : code,
                        "age": age,
                        "plan": plan,
                        "payway" : $("#"+code+"_payway").find(".on").attr("data-option"),
                        "option": option,
                    },
                    function(data){
                        $("." + code + "_price").attr("value",data);
                        $("." + code + "thisprice").html('HK$ ' +data);
                        var thisitem = $("." + code + "thisprice").parents(".itemBar");
                        thisitem.addClass( thisitem.attr("color-option") + "-title");
                        totalamount();
                       // console.log(data);
                        //隐藏等待
                        return data;
                    }, "json");
            break;
        case "ACCIDENT":
            amount = parseInt($("#accident_amount").val());
            payway = $("#ACCIDENT_payway").find(".on").attr("data-option"); //支付方式
            option1 = option2 = option3 = 0;
            plan = 1;//职业
            for(i=0;i<$(".vocation").length;i++){
                if($(".vocation").eq(i).hasClass('on')){
                    plan = parseInt($(".vocation").eq(i).attr("data-option"));
                }
            }
            if($(".redwine-in .Optional1").hasClass('on')){
                option1 = parseInt($("#Optional1").val());
            }
            if($(".redwine-in .Optional2").hasClass('on')){
                option2 = parseInt($("#Optional2").val());
            }
            if($(".redwine-in .Optional3").hasClass('on')){
                option3 = parseInt($("#Optional3").val());
            }
            $.post(countpriceURL,
                    {
                        "code" : code,
                        "plan": plan,
                        "amount": amount,
                        "payway" : payway,
                        "option1": option1,
                        "option2": option2,
                        "option3": option3
                    },
                    function(data){
                        $("." + code + "_price").attr("value",data);
                        $("." + code + "thisprice").html('HK$ ' +data);
                        var thisitem = $("." + code + "thisprice").parents(".itemBar"); 
                        thisitem.addClass( thisitem.attr("color-option") + "-title");
                        totalamount();
                       // console.log(data);
                        //隐藏等待
                        return data;
                    }, "json");
            break;
        case "TRIP": // 旅游保险
            plan = 1;//保障方式
            for(i=0;i<$(".tripSafeguard").length;i++){
                if($(".tripSafeguard").eq(i).hasClass('on')){
                    plan = $(".tripSafeguard").eq(i).attr("data-option");
                }
            }
            range = 1;//保障范围
            for(i=0;i<$(".range").length;i++){
                if($(".range").eq(i).hasClass('on')){
                    range = parseInt($(".range").eq(i).attr("data-option"));
                }
            }
            PeriodsTrip = parseInt($("#PeriodsTrip").val());
            countadult  = parseInt($("#countadult").val());
            countchild  = parseInt($("#countchild").val());
            countadult2  = parseInt($("#countadult2").val());
            countchild2  = parseInt($("#countchild2").val());
            insured = $("#insured").find(".on").attr("data-option"); //是否受保人
            wifeinsured = $("#wifeinsured").find(".on").attr("data-option"); //配偶是否受保人
            if(plan == 3){
                PeriodsTrip = 365;
            }
            $.post(countpriceURL,
                    {
                        "code" : code,
                        "plan": plan,
                        "range": range,
                        "PeriodsTrip" : PeriodsTrip,
                        "countadult": countadult,
                        "countchild": countchild,
                        "countadult2": countadult2,
                        "countchild2": countchild2,
                        "insured": insured,
                        "wifeinsured": wifeinsured
                    },
                    function(data){
                        $("." + code + "_price").attr("value",data);
                        $("." + code + "thisprice").html('HK$ ' +data);
                        var thisitem = $("." + code + "thisprice").parents(".itemBar");      
                        thisitem.addClass( thisitem.attr("color-option") + "-title");
                        totalamount();
                        //console.log(data);
                        //隐藏等待
                        return data;
                    }, "json");
            break;
        case "OLDER":
            sex = $("#sexy").find(".on").attr("data-option");
            age = $("#older_age").val();
            issmoker = $("#issmoker").find(".on").attr("data-option");
            older_amount = $("#older_amount").val();
            if($(".grass-in .longcare").hasClass("on")){
                Timelimit = $("#Timelimit").find(".on").attr("data-option");
                Timelimit_amount = $("#Timelimit_amount").find(".on").attr("data-option");
            }else{
                Timelimit = 0;
                Timelimit_amount = 0;
            }
            cash_amount = 0;
            if($(".grass-in .cash").hasClass("on")){
                for(i=0;i<$(".cash_amount").length;i++){
                    if($(".cash_amount").eq(i).hasClass('on')){
                        cash_amount = parseInt($(".cash_amount").eq(i).attr("data-option"));
                    }
                }
            }
            $.post(countpriceURL,
                    {
                        "code" : code,
                        "sex": sex,
                        "age": age,
                        "issmoker" : issmoker,
                        "older_amount": older_amount,
                        "Timelimit": Timelimit,
                        "Timelimit_amount": Timelimit_amount,
                        "cash_amount" : cash_amount
                    },
                    function(data){
                        $("." + code + "_price").attr("value",data);
                        $("." + code + "thisprice").html('HK$ ' +data);
                        var thisitem = $("." + code + "thisprice").parents(".itemBar");             
                        thisitem.addClass( thisitem.attr("color-option") + "-title");
                        totalamount();
                       // console.log(data);
                        //隐藏等待
                        return data;
                    }, "json");
        break;
        case "THEMAID":
            leix = 1;
            if($(".pink-in .leix").hasClass("on")){
                for(i=0;i<$(".pink-in .leix").length;i++){
                    if($(".pink-in .leix").eq(i).hasClass('on')){
                        leix = parseInt($(".pink-in .leix").eq(i).attr("data-option"));
                    }
                }
            }
            baoz = 1;
            if($(".pink-in .baoz").hasClass("on")){
                for(i=0;i<$(".pink-in .baoz").length;i++){
                    if($(".pink-in .baoz").eq(i).hasClass('on')){
                        baoz = parseInt($(".pink-in .baoz").eq(i).attr("data-option"));
                    }
                }
            }
            $.post(countpriceURL,
                    {
                        "code" : code,
                        "leix": leix,
                        "baoz": baoz
                    },
                    function(data){
                        $("." + code + "_price").attr("value",data);
                        $("." + code + "thisprice").html('HK$ ' +data);
                        totalamount();
                        var thisitem = $("." + code + "thisprice").parents(".itemBar");             
                        thisitem.addClass( thisitem.attr("color-option") + "-title");
                       // console.log(data);
                        //隐藏等待
                        return data;
                    }, "json");
            break;
        case "FUND":
            console.log(code);
            var FUND_age = $("#FUND_age").val();
            var fundamount = 50;
            var fundvocation = 1;
            for(i=0;i<$(".fundamount").length;i++){
                if($(".fundamount").eq(i).hasClass('on')){
                    fundamount = parseInt($(".fundamount").eq(i).attr("data-option"));
                }
            }
            for(i=0;i<$(".fundvocation").length;i++){
                if($(".fundvocation").eq(i).hasClass('on')){
                    fundvocation = parseInt($(".fundvocation").eq(i).attr("data-option"));
                }
            }
            $.post(countpriceURL,
                    {
                        "code" : code,
                        "age": FUND_age,
                        "fundamount": fundamount,
                        "fundvocation": fundvocation
                    },
                    function(data){
                        $("." + code + "_price").attr("value",data);
                        $("." + code + "thisprice").html('HK$ ' +data);
                        var thisitem = $("." + code + "thisprice").parents(".itemBar");             
                        thisitem.addClass( thisitem.attr("color-option") + "-title");
                        totalamount();
                        // console.log(data);
                        //隐藏等待
                        return data;
                    }, "json");
            break;
        case "DISEASE":
            age = $("#disease_age").val();
            issmoker = $("#disease_issmoker").find(".on").attr("data-option");
            payway = $("#disease_payway").find(".on").attr("data-option");
            Dangerousinfo = 0;
            for(i=0;i<$(".Dangerousinfo").length;i++){
                if($(".Dangerousinfo").eq(i).hasClass('on')){
                    Dangerousinfo = parseInt($(".Dangerousinfo").eq(i).attr("data-option"));
                }
            }
            cashsupport = 0;
            for(i=0;i<$(".cashsupport").length;i++){
                if($(".cashsupport").eq(i).hasClass('on')){
                    cashsupport = parseInt($(".cashsupport").eq(i).attr("data-option"));
                }
            }
            $.post(countpriceURL,
                    {
                        "code" : code,
                        "age" : age,
                        "issmoker": issmoker,
                        "payway": payway,
                        "Dangerousinfo" : Dangerousinfo,
                        "cashsupport" : cashsupport
                    },
                    function(data){
                        $("." + code + "_price").attr("value",data);
                        $("." + code + "thisprice").html('HK$ ' +data);
                        var thisitem = $("." + code + "thisprice").parents(".itemBar");             
                        thisitem.addClass( thisitem.attr("color-option") + "-title");
                        totalamount();
                       // console.log(data);
                        //隐藏等待
                        return data;
                    }, "json");
            break;
    }
}

//调用微信JS api 支付
function jsApiCall()
{
   // jsondata = eval("(" + jsondata + ")");
    WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            jsondata,
    function(res){
        //WeixinJSBridge.log(res.err_msg);
        //alert(res.err_code+res.err_desc+res.err_msg);
    }
);
}

function callpay()
{
    if (typeof WeixinJSBridge == "undefined"){
        if( document.addEventListener ){
            document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
        }else if (document.attachEvent){
            document.attachEvent('WeixinJSBridgeReady', jsApiCall);
            document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
        }
    }else{
        jsApiCall();
    }
}
