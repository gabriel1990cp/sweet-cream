/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

jQuery(document).ready(function($) {
		$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}
	
	//$('#setting-error-tgmpa p:first-child,#setting-error-tgmpa p:last-child').css("display","none");

	var tgmpa=$('#setting-error-tgmpa').height();	
//	$('.settings-error').css("top","0");
	if(tgmpa>0)
	$('.optionmain').css("marginTop",110);
	else		
	$('.optionmain').css("marginTop",50);
	
	// Fade out the save message
	$('.fade').delay(1000).fadeOut(1000);
	
	$('.of-color').wpColorPicker();
	
	// Switches option sections
	$('.group').hide();
	var active_tab = '';

	if (active_tab != '' && $(active_tab).length ) {
		$(active_tab).fadeIn();
	} else {
		$('.group:first').fadeIn();
	}
	$('.group .collapsed').each(function(){
		$(this).find('input:checked').parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).hasClass('last')) {
					$(this).removeClass('hidden');
						return false;
					}
				$(this).filter('.hidden').removeClass('hidden');
			});
	});
	if (active_tab != '' && $(active_tab + '-tab').length ) {
		$(active_tab + '-tab').addClass('nav-tab-active');
	}
	else {
		$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
	}
	
	$('.nav-tab-wrapper a').click(function(evt) {
		$('.nav-tab-wrapper a').removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active').blur();
		var clicked_group = $(this).attr('href');
		if (typeof(localStorage) != 'undefined' ) {
			localStorage.setItem("active_tab", $(this).attr('href'));
		}
		$('.group').hide();
		$(clicked_group).fadeIn();
		evt.preventDefault();
		
		// Editor Height (needs improvement)
		$('.wp-editor-wrap').each(function() {
			var editor_iframe = $(this).find('iframe');
			if ( editor_iframe.height() < 30 ) {
				editor_iframe.css({'height':'auto'});
			}
		});
	
	});
           					
	$('.group .collapsed input:checkbox').click(unhideHidden);
				
	function unhideHidden(){
		if ($(this).attr('checked')) {
			$(this).parent().parent().parent().nextAll().removeClass('hidden');
		}
		else {
			$(this).parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).filter('.last').length) {
					$(this).addClass('hidden');
					return false;		
					}
				$(this).addClass('hidden');
			});
           					
		}
	}
	
	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');		
	});
		
	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();
	
      $('#bodyfont1,#headingfont1,#menufont').fontselect().change(function(){
        
          // replace + signs with spaces for css
          var font = $(this).val().replace(/\+/g, ' ');
          
          // split font into family and weight
          font = font.split(':');
          
          // set family on paragraphs 
          $('p').css('font-family', font[0]);
        });	
	
				$('.iphone-style').live('click', function() {
				
					checkboxID		= '#' + $(this).attr('rel');

					if($(checkboxID)[0].checked == false) {
						
						$(this).animate({backgroundPosition: '0% 100%'});
						
						$(checkboxID)[0].checked = true;
						$(this).removeClass('off').addClass('on');
						
					} else {
						
						$(this).animate({backgroundPosition: '100% 0%'});
						
						$(checkboxID)[0].checked = false;
						$(this).removeClass('on').addClass('off');
						
					}
				});

				$('.iphone-style-checkbox').each(function() {
					
					thisID		= $(this).attr('id');
					thisClass	= $(this).attr('class');

					
					$(this).addClass('hidden');
					
					if($(this)[0].checked == true)
						$(this).after('<div class="iphone-style on" rel="'+ thisID +'">&nbsp;</div>');
					else
						$(this).after('<div class="iphone-style off" rel="'+ thisID +'">&nbsp;</div>');
				});

if($('#scheme_select').val()=="custom") {
  		$('#section-pricolor').slideDown();
  		$('#section-seccolor').slideDown();}
else{
  		$('#section-pricolor').slideUp();
  		$('#section-seccolor').slideUp();
}				
				
$('#scheme_select').change(function() {
if($('#scheme_select').val()=="custom") {
  		$('#section-pricolor').slideDown();
  		$('#section-seccolor').slideDown();}
else{
  		$('#section-pricolor').slideUp();
  		$('#section-seccolor').slideUp();
}
})				
				
if($('#flickrtoggle').is(':checked')) {
  		$('#section-flickrtitle').slideDown();
  		$('#section-flickrid').slideDown();
}
else{
  		$('#section-flickrtitle').slideUp();
  		$('#section-flickrid').slideUp();
}

$('.iphone-style[rel="flickrtoggle"]').click(function() {
if(!$('#flickrtoggle').is(':checked')) {
  		$('#section-flickrtitle').slideDown();
  		$('#section-flickrid').slideDown();}
else{
  		$('#section-flickrtitle').slideUp();
  		$('#section-flickrid').slideUp();
}
})

if($('#socialtoggle').is(':checked')) {
  		$('#section-socialtitle').slideDown();
}
else{
  		$('#section-socialtitle').slideUp();
}

$('.iphone-style[rel="socialtoggle"]').click(function() {
if(!$('#socialtoggle').is(':checked')) {
  		$('#section-socialtitle').slideDown();
}		
else{
  		$('#section-socialtitle').slideUp();
}
})

if($('#featuretoggle').is(':checked')) {
  		$('#section-featureblock').slideDown();		
}
else{
  		$('#section-featureblock').slideUp();
}

$('.iphone-style[rel="featuretoggle"]').click(function() {
if(!$('#featuretoggle').is(':checked')) {
  		$('#section-featureblock').slideDown();		
}		
else{
  		$('#section-featureblock').slideUp();
}
})

if($('#featuredprojecttoggle').is(':checked')) {
  		$('#section-featuredprojecttitle').slideDown();		
}
else{
  		$('#section-featuredprojecttitle').slideUp();
}

$('.iphone-style[rel="featuredprojecttoggle"]').click(function() {
if(!$('#featuredprojecttoggle').is(':checked')) {
  		$('#section-featuredprojecttitle').slideDown();		
}		
else{
  		$('#section-featuredprojecttitle').slideUp();
}
})

if($('#referencetoggle').is(':checked')) {
  		$('#section-referencetitle').slideDown();		
}
else{
  		$('#section-referencetitle').slideUp();
}

$('.iphone-style[rel="referencetoggle"]').click(function() {
if(!$('#referencetoggle').is(':checked')) {
  		$('#section-referencetitle').slideDown();		
}		
else{
  		$('#section-referencetitle').slideUp();
}
})

if($('#latestblogtoggle').is(':checked')) {
  		$('#section-latestblogtitle').slideDown();		
}
else{
  		$('#section-latestblogtitle').slideUp();
}

$('.iphone-style[rel="latestblogtoggle"]').click(function() {
if(!$('#latestblogtoggle').is(':checked')) {
  		$('#section-latestblogtitle').slideDown();		
}		
else{
  		$('#section-latestblogtitle').slideUp();
}
})
	
	$('.resetfont').click(function(){
		$('#bodyfont1').val('');
		$('#section-bodyfont1 .font-select span').text("Select a font");
		$('#section-bodyfont1 .font-select span').removeAttr("style");
		return false;
	});
	
if($('#fontstoggle').is(':checked')) {
  		$('#section-bodyfont1').slideDown();		
  		$('#section-headingfont1').slideDown();		
  		$('#section-menufont').slideDown();				
}
else{
  		$('#section-bodyfont1').slideUp();
  		$('#section-headingfont1').slideUp();
  		$('#section-menufont').slideUp();		
}

$('.iphone-style[rel="fontstoggle"]').click(function() {
if(!$('#fontstoggle').is(':checked')) {
  		$('#section-bodyfont1').slideDown();		
  		$('#section-headingfont1').slideDown();		
  		$('#section-menufont').slideDown();		
}		
else{
  		$('#section-bodyfont1').slideUp();
  		$('#section-headingfont1').slideUp();
  		$('#section-menufont').slideUp();	
}
})	

if($('#contacttoggle').is(':checked')) {
  		$('#section-contactupload').slideDown();		
  		$('#section-gmap').slideUp();				
}
else{
  		$('#section-contactupload').slideUp();		
  		$('#section-gmap').slideDown();					
}

$('.iphone-style[rel="contacttoggle"]').click(function() {
if(!$('#contacttoggle').is(':checked')) {
  		$('#section-contactupload').slideDown();		
  		$('#section-gmap').slideUp();	
}		
else{
  		$('#section-contactupload').slideUp();		
  		$('#section-gmap').slideDown();		
}
})					
	
});	