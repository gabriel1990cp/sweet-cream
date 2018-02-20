(function($) {
    
    $('body').append('<div id="tp_shortcodes_modal"  class="reveal-modal l_pxg_modal">');

        var modal_selector = $('#tp_shortcodes_modal');
		
	tinymce.create('tinymce.plugins.DiamondThemeTools', {

        init : function(ed, url) {

                ed.addButton('shortcodes', {
                    title : 'Add a shortcode',
                    class: 'tp_shortcodes',
					image : url + '/images/brush.png',					
                    onclick: function(){


 			$.ajax({	
				type: "POST",
				url: url + '/shortcodes_modal.php',
			dataType: "html",	
			success: function(msg){
				modal_selector.html(msg);

                        modal_selector.reveal({
                            animation: 'fadeAndPop',                   //fade, fadeAndPop, none
                            animationspeed: 400,                       //how fast animtions are
                            closeonbackgroundclick: true,              //if you click background will modal close?
                            dismissmodalclass: 'close-icon'    //the class of a button or element that will close an open modal
                        });
						
						$('.insert').css("display","none");				
						$('#homeinsert').css("display","block");
						
	$('.back-icon').click(function(){
	
		$('.other_block').css("display","none");
		$('.home_block').fadeIn();
		$('.insert').css("display","none");				
		$('#homeinsert').css("display","block");				

		
		return false;
	});

	$('.go').click(function(){
            modal_selector.trigger('reveal:close');
		
		return false;
	});	

	$('.blocks').click(function(){
         var modal_open=$(this).attr("href");
		 var modal_append=modal_open+'1';
		
		$('.shortcode_modalbox').attr("id",modal_append);
		$('.insert').css("display","none");				
		$(modal_append).css("display","block");
		$('.back-icon').css("display","block");
		$('.home_block').css("display","none");		
		 $('.other_block').fadeOut();		
		 $(modal_open).fadeIn();
		
		return false;
	});	
	
	$('#dividerblock1').click(function(){
	var divsh="[divider";
	var divsize=$('#divsize').val();
	
	if(divsize!="")
	divsh=divsh+' size="'+divsize+'"';	
	
	divsh=divsh+'][/divider]';
	
            editor.selection.setContent(divsh);

            modal_selector.trigger('reveal:close');
		
		return false;
	});	

	$('#titleblock1').click(function(){
	var titlesh="[title";
	var titleheading=$('#titleheading').val();
	
	if(titleheading!="")
	titlesh=titlesh+' title="'+titleheading+'"';	
	
	titlesh=titlesh+'][/title]';
	
            editor.selection.setContent(titlesh);

            modal_selector.trigger('reveal:close');
		
		return false;
	});	

	$('#columnblock1').click(function(){
	var colsh="[cols]";
	var colsize=$('#colsize').val();
	var colsh1="[col";
	var colsht;
	
	if(colsize!="")
	{

	if(colsize>1)
	{
		colsh1=colsh1+' number="'+colsize+'"';	
		colsh1=colsh1+"]content goes here[/col]";
		colsht=colsh1;
		for(j=1;j<colsize;j++)
		{
			colsh1=colsh1+colsht;
		}
		colsh=colsh+colsh1;
	}
	if(colsize==1){
		colsh=colsh+'[/cols]';}
	else{
		colsh=colsh+'[/cols]';}
	
	}
            editor.selection.setContent(colsh);

            modal_selector.trigger('reveal:close');
		
		return false;
	});		

	$('#alertblock1').click(function(){
	var alertsh="[alert";
	var alerttype=$('#alerttype').val();
	var alerttext=$('#alerttext').val();

	if(alerttype!="")
	alertsh=alertsh+' type="'+alerttype+'"';	
	if(alerttext!="")
	alertsh=alertsh+' text="'+alerttext+'"';
	
	alertsh=alertsh+'][/alert]';
	
            editor.selection.setContent(alertsh);

            modal_selector.trigger('reveal:close');
		
		return false;
	});	
	
	$('#headingblock1').click(function(){
	var alertsh="[heading";
	var alerttype=$('#headingtype').val();
	var alerttext=$('#headingtext').val();

	if(alerttype!="")
	alertsh=alertsh+' type="'+alerttype+'"';	
	if(alerttext!="")
	alertsh=alertsh+' text="'+alerttext+'"';
	
	alertsh=alertsh+'][/heading]';
	
            editor.selection.setContent(alertsh);

            modal_selector.trigger('reveal:close');
		
		return false;
	});		
	
	$('#buttonblock1').click(function(){
	var buttonsh="[button";
	var buttonsize=$('#buttonsize').val();
	var buttontext=$('#buttontext').val();
	
	if(buttonsize!="")
	buttonsh=buttonsh+' size="'+buttonsize+'"';	
	if(buttontext!="")
	buttonsh=buttonsh+' text="'+buttontext+'"';	
	
	buttonsh=buttonsh+'][/button]';
	
            editor.selection.setContent(buttonsh);

            modal_selector.trigger('reveal:close');
		
		return false;
	});		
	
								  }
		  });	
						
                        editor = ed;
                        get_current_editor_selected_content = function(){
                            return editor;
                        };
						
                        window.send_to_editor_clone = window.send_to_editor;
                    }
                });
			
        }

    });

    // Register plugin
    tinymce.PluginManager.add('diamondtheme_tools', tinymce.plugins.DiamondThemeTools);

	
    /*
     * jQuery Reveal Plugin 1.0
     * www.ZURB.com
     * Copyright 2010, ZURB
     * Free to use under the MIT license.
     * http://www.opensource.org/licenses/mit-license.php
     */
    $.fn.reveal=function(e){var t={animation:"fadeAndPop",animationspeed:300,closeonbackgroundclick:true,dismissmodalclass:"close-reveal-modal"};var e=$.extend({},t,e);return this.each(function(){function u(){i=false}function a(){i=true}var t=$(this),n=parseInt(t.css("top")),r=t.height()+n,i=false,s=$(".reveal-modal-bg");if(s.length==0){s=$('<div class="reveal-modal-bg" />').insertAfter(t)}t.bind("reveal:open",function(){s.unbind("click.modalEvent");$("."+e.dismissmodalclass).unbind("click.modalEvent");if(!i){a();if(e.animation=="fadeAndPop"){t.css({top:$(document).scrollTop()-r,opacity:0,visibility:"visible"});s.fadeIn(e.animationspeed/2);t.delay(e.animationspeed/2).animate({top:$(document).scrollTop()+n+"px",opacity:1},e.animationspeed,u())}if(e.animation=="fade"){t.css({opacity:0,visibility:"visible",top:$(document).scrollTop()+n});s.fadeIn(e.animationspeed/2);t.delay(e.animationspeed/2).animate({opacity:1},e.animationspeed,u())}if(e.animation=="none"){t.css({visibility:"visible",top:$(document).scrollTop()+n});s.css({display:"block"});u()}}t.unbind("reveal:open")});t.bind("reveal:close",function(){if(!i){a();if(e.animation=="fadeAndPop"){s.delay(e.animationspeed).fadeOut(e.animationspeed);t.animate({top:$(document).scrollTop()-r+"px",opacity:0},e.animationspeed/2,function(){t.css({top:n,opacity:1,visibility:"hidden"});u()})}if(e.animation=="fade"){s.delay(e.animationspeed).fadeOut(e.animationspeed);t.animate({opacity:0},e.animationspeed,function(){t.css({opacity:1,visibility:"hidden",top:n});u()})}if(e.animation=="none"){t.css({visibility:"hidden",top:n});s.css({display:"none"})}}t.unbind("reveal:close")});t.trigger("reveal:open");var o=$("."+e.dismissmodalclass).bind("click.modalEvent",function(){t.trigger("reveal:close")});if(e.closeonbackgroundclick){s.css({cursor:"pointer"});s.bind("click.modalEvent",function(){t.trigger("reveal:close")})}$("body").keyup(function(e){if(e.which===27){t.trigger("reveal:close")}})})}
		
	
})(jQuery);