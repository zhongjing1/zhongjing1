(function(){
	$.fn.tap = function(fn){
	    var collection = this,
	        isTouch = "ontouchend" in document.createElement("div"),
	        tstart = isTouch ? "touchstart" : "mousedown",
	        tmove = isTouch ? "touchmove" : "mousemove",
	        tend = isTouch ? "touchend" : "mouseup",
	        tcancel = isTouch ? "touchcancel" : "mouseout";
	    collection.each(function(){
	        var i = {};
	        i.target = this;
	        $(i.target).on(tstart,function(e){
	            var p = "touches" in e ? e.touches[0] : (isTouch ? window.event.touches[0] : window.event);
	            i.startX = p.clientX;
	            i.startY = p.clientY;
	            i.endX = p.clientX;
	            i.endY = p.clientY;
	            i.startTime = + new Date;
	        });
	        $(i.target).on(tmove,function(e){
	            var p = "touches" in e ? e.touches[0] : (isTouch ? window.event.touches[0] : window.event);
	            i.endX = p.clientX;
	            i.endY = p.clientY;
	        });
	        $(i.target).on(tend,function(e){
	            if((+ new Date)-i.startTime<300){
	                if(Math.abs(i.endX-i.startX)+Math.abs(i.endY-i.startY)<20){
	                    var e = e || window.event;
	                    e.preventDefault();
	                    fn.call(i.target);
	                }
	            }
	            i.startTime = undefined;
	            i.startX = undefined;
	            i.startY = undefined;
	            i.endX = undefined;
	            i.endY = undefined;
	        });
	    });
	    return collection;
	}

	window.onresize = function (){
		var w=window.innerWidth
		|| document.documentElement.clientWidth
		|| document.body.clientWidth;

		if (w < 992 && $(".compute.mobile").css("display") === "none" && $(".input.mobile").css("display") === "none" ) {
			$(".mobile, .pc").hide();
			$(".input.mobile").show();
		} else if (w >= 992 && $(".compute.pc").css("display") === "none" && $(".input.pc").css("display") === "none" ) {
			$(".mobile, .pc").hide();
			$(".input.pc").show();
		}
	}

	$("html,body").click(function(){
		$(".page2 .select ul").hide();
	})
	$(".page2 .select").click(function(e){
		$(this).find("ul").toggle();
		e.stopPropagation();
	})
	$(".page2 li").click(function(e){
		var value = $(this).text();
		$(this).closest(".select").find(".select-inner").text(value)
		$(".page2 .select ul").hide();
		e.stopPropagation();
	})
	$(".box").tap(function(){
		$(this).parent().find(".box").removeClass("check");
		$(this).addClass("check");
	})
	$(".input.pc .button").click(function(){
		$(".input, h3.input").hide();
		$(".compute.pc, h3.compute").fadeIn();
	})
	$(".compute.pc .button").click(function(){
		$(".compute, h3.compute").hide();
		$(".input.pc, h3.input").fadeIn();
	})
	$(".input.mobile .button").tap(function(){
		$(".input, h3.input").hide();
		$(".compute.mobile, h3.compute").fadeIn();
	})
	$(".compute.mobile .button").tap(function(){
		$(".compute, h3.compute").hide();
		$(".input.mobile, h3.input").fadeIn();
	})


	function drawChart(x,y,z){
		if (x+y+z !== 1) {
			console.log("参数总和超过100%")
		};
		var w=window.innerWidth
		|| document.documentElement.clientWidth
		|| document.body.clientWidth;
		var c = document.getElementById("computeChart");
		var ctx = c.getContext("2d");
		var a = 0,
		l = 70,
		r = 60;

		if (w < 992) {
			c = document.getElementById("computeChartMobile");
			ctx = c.getContext("2d");
			l = 88;
			r = 78;
			ctx.font = "14 Arial";
			ctx.textAlign = "center";
			ctx.fillText("配置比例",l,l);
		};
		ctx.beginPath();
		ctx.lineWidth = 14;
		ctx.strokeStyle = "#21c5da";
		ctx.arc(l,l,r,a*2*Math.PI,(a+x)*2*Math.PI);
		ctx.stroke();
		a = a+x;

		ctx.beginPath();
		ctx.lineWidth = 14;
		ctx.strokeStyle = "#5969c0";
		ctx.arc(l,l,r,a*2*Math.PI,(a+y)*2*Math.PI);
		ctx.stroke();
		a = a+y;

		ctx.beginPath();
		ctx.lineWidth = 14;
		ctx.strokeStyle = "#f35351";
		ctx.arc(l,l,r,a*2*Math.PI,(a+z)*2*Math.PI);
		ctx.stroke();
		a = a+z;
	}

	drawChart(0.3,0.3,0.4) // 调用方法 按红蓝紫三色顺序输入小数即可
}())
function border(a){
	x=document.getElementsByClassName('choice');
	for(i=0;i<x.length;i++){
		x[i].style.borderColor='grey';
	}
	a.style.borderColor='lightblue'
	document.getElementsByName('choice')[0].value=a.innerHTML;
}