$(document).ready(function(e) {
	//图片预览
	$(".open_litpic").hover(
	    function(){//alert()
			$("#big_"+$(this).attr("id")).css('display','inline');
			//$(this).attr("id")
		},
		function(){
			$("#big_"+$(this).attr("id")).hide();
			//$(this).attr("id")
		}
	)
	//图片预览打开
	$(".open_litpic").click(
		function(){
			window.open($(this).attr('src'));
		}
	);
});
//点击多全选框全选
function selectAll(checkbox) {
    $('input[type=checkbox]').prop('checked', $(checkbox).prop('checked'));
}