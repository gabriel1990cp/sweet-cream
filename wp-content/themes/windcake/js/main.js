/* <![CDATA[ */			
jQuery(function($){	


	$('.homepageslider').flexslider({
			animation: "fade",
			controlNav:true,
			slideshow:true,
			pauseOnHover:false,
			slideshowSpeed:5500,
			start: function(){
				$('.captiontext1').flowtype({
				   fontRatio : 17,
				   lineRatio : 1.25,
				   minFont   : 0,
				});
			},			
			after: function(){
				$('.captiontext1').flowtype({
				   fontRatio : 17,
				   lineRatio : 1.25,
				   minFont   : 0,
				});
			}		
	});	

	$(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#gototop').fadeIn();
        } else {
            $('#gototop').fadeOut();
        }
    });	
	
	$('#gototop').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
    });	



	function imgresize(){
	
		var logowidth=$('.logo').width();
		if(logowidth<30)
		{
		//logowidth=170;
		}
		var headerwidth=$('.header-inner').width();	
		var navwidth=(headerwidth-logowidth)/2;	
		

		if($(window).width() > 979)
		{
			$('.navleft').css('width',navwidth);
			$('.navright').css('width',navwidth);
		}
		else{
			$('.navleft').css('width','auto');
			$('.navright').css('width','auto');			
		}
			
	}	
	
	$(window).load(function(){
		imgresize();
		$(window).on('resize', imgresize);
	});

    $('.fadeInUp').bind('inview', function (event, visible) {
        if (visible === true) {
            $(this).addClass('animated fadeInUp');
        }
		else {
			$(this).removeClass('animated fadeInUp');
		}
    });

	$('.slider2').flexslider({
			animation: "slide",
			controlNav:false,
			smoothHeight:true,
			start: function(slider){
				$('body').removeClass('loading');
			}
	});	
	

	/*$('.accordion > .accordion-group:first-child > .accordion-body').addClass("in");*/

	$(".videoblock").fitVids();	

	$('#testimonaial-slider1').flexslider({
		animation: "fade",
		directionNav:false,
		controlNav:false,
		smoothHeight: true,
		animationLoop:true,
		slideshowSpeed: 3000,		
		slideToStart: 0,
	});
	
	$('#testimonaial-slider2').flexslider({
		animation: "slide",
		directionNav:true,
		controlNav:false,		
		smoothHeight: true,
		animationLoop:true,
		sync: "#testimonaial-slider1",
		slideshowSpeed: 3000,			
		slideToStart: 0,
	});	

/* post comment */

	$("#postcomment").click(function(){
		
		var cname = $("#name").val() ;
		var cemail = $("#email").val();
		var cmesg = $("#message1").val();
		//var csub1 = $("#subject1").val();

		var errcount=0;
		if(cname.length < 1)
		{		
			$("#name").addClass("error");
			errcount = 1;
		}	else
			$("#name").removeClass("error");
		//email validation
		var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
		var valid = emailRegex.test(cemail);
		if (!valid) {
			$("#email").addClass("error");
			errcount = 1;
		}else
			$("#email").removeClass("error");
	  
	  
		if(cmesg.length < 1)
		{
			$("#message1").addClass("error");  
			errcount = 1;
		}	else
			$("#message1").removeClass("error");
	  
		if(errcount ==0 )
		{
			//form submitted
		
			return false;
		}
		else
		{	  	  
			return false;
		}
	});


/* end post comment*/

	$(".accordion-toggle").click(function(){
				
		$(".accordion-group").each(function(){
			var accheading = $(this).find(".accordion-toggle");
			var acccontent = $(this).find(".accordion-body");
			if(!acccontent.height() == 0)
			{			
			accheading.addClass("collapsed");
			}
			
		});
		
	});	

	smoothScroll.init({
		speed: 1000,
		updateURL: false,
		offset: 0
	});	
  
    if ( window.location.hash ) {
        var options = {updateURL: false}; 
        smoothScroll.animateScroll( null, window.location.hash, options );
    }  
	
});

/* ]]> */	    