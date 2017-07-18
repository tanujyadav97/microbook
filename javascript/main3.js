
$(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:'ajax_more.php',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.tutorial_list').append(html);
            }
        }); 
    });
});

$(document).ready(function(){
	$("#modal_trigger").click(function(){
		showpopup();
	});
	$(".modal_close").click(function(){
		hidepopup();
	});
	$("#login_form").click(function(){
		showlogin();
	});
	$("#register_form").click(function(){
		showsignup();
	});
	$("#btn_back_btn").click(function(){
		back();
	});
	$("#btn_back_btn1").click(function(){
		back();
	});
	$(".push").click(function(){
		push();
	});
});
function push(){
	if($("#pm").hasClass('pushmenu-push')){
	$("#pm").addClass("tpushmenu");
	$("#pm").removeClass("bpushmenu");
	$("#pm").removeClass("pushmenu-push");
    $(".tpushmenu").animate({"left":"0px"},'slow');
	$("#body").css({"position":"relative"}).animate({"left":"15%","width":"85%"},'slow');
	$("#belowheader").css({"position":"relative"}).animate({"left":"15%","width":"85%"},'slow');
	$(".footer").css({"position":"relative"}).animate({"left":"15%","width":"85%"},'slow');
	}
	else{
		$("#pm").removeClass('tpushmenu');
		$("#pm").addClass('bpushmenu');
		$(".bpushmenu").animate({"left":"-300px"},'slow');
		$("#body").css({"position":"relative"}).animate({"left":"0%","width":"100%"},'slow');
	$("#belowheader").css({"position":"relative"}).animate({"left":"0%","width":"100%"},'slow');
	$(".footer").css({"position":"relative"}).animate({"left":"0%","width":"100%"},'slow');
	$("#pm").addClass('pushmenu-push');
	}
}
function showsignup(){
	$("#container").fadeIn();
	$("#container").css({"visibility":"visible","display":"block"});
	$(".social_login").css({"visibility":"hidden","display":"none"});
	$(".user_register").css({"visibility":"visible","display":"block"});
    $(".header_title").text('Register');
	
}
function back(){
	$(".social_login").css({"visibility":"visible","display":"block"});
    $(".user_register").css({"visibility":"hidden","display":"none"});
	$(".user_login").css({"visibility":"hidden","display":"none"});
	$(".header_title").text('Login');

}
function showpopup(){
	$("#container").fadeIn();
	$("#container").css({"visibility":"visible","display":"block"});
	$("#modal").css({"visibility":"visible","display":"block"});
	$(".social_login").css({"visibility":"visible","display":"block"});
	$("#b").css({"overflow":"hidden"});

		
}
function hidepopup(){
	$("#container").fadeOut();
	$("#container").css({"visibility":"hidden","display":"none"});
	$(".user_register").css({"visibility":"hidden","display":"none"});
	$(".user_login").css({"visibility":"hidden","display":"none"});
	$("#b").css({"overflow":"scroll"});
	$("#wrapper").fadeIn();
    $("#b").css({"background-color":"white"});
}
function showlogin(){
	$("#container").fadeIn();
	$("#container").css({"visibility":"visible","display":"block"});
	$(".social_login").css({"visibility":"hidden","display":"none"});
	$(".user_login").css({"visibility":"visible","display":"block"});
	$(".header_title").text('Login');
}
