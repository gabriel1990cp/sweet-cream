<?php
/**
 * Extra Functions which are required by theme
 */


 function scroller_init() {
	if(of_get_option('scrollertoggle')) {
	
	wp_enqueue_script('nicescroll', get_stylesheet_directory_uri() .'/js/jquery.nicescroll.min.js', array('jquery'), '3.4', false);	
	?>
	<script>
	/* <![CDATA[ */			
	jQuery(function($){	
		$("html").niceScroll({zindex:999999,cursorborder:"1px solid #333333"});
	});

	/* ]]> */	 
	</script>
	<?php
	
	}
 }
add_action('wp_head', 'scroller_init');

function diamondtheme_colorscheme() {

	$color_scheme=of_get_option( 'scheme_select', 'windcake' );
	if($color_scheme!='blue' && $color_scheme!='')
	{
		
		wp_enqueue_style('color-scheme', get_stylesheet_directory_uri().'/css/'.$color_scheme.'.css','style',true );	
		
		if($color_scheme=='custom')
		{
			$pricolor=of_get_option( 'pricolor', 'windcake' );
			$seccolor=of_get_option( 'seccolor', 'windcake' );
			$contactoverlay=hex2rgba($pricolor,0.8);
			$slideoverlay=hex2rgba($pricolor,0.25);
			$custom_css = "
					a,.maintitle1,.titleinner h1,.servicetitle h4,.titlestart,.quoteauthor,.permalink a:hover,
					.chat_post p:nth-child(odd) strong,.date-color,#searchsubmit{
							color: {$pricolor};
					}
					a:hover,h1,h2,h3,h4,h5,h6,.pricingtitle,.pricinginner:hover .buynow,.teamtitle,.team_social a,
					.permalink a,.chat_post p strong,.blocktitle,.navigation .current-menu-item a,
					.navbar-inverse .nav .active>a, .navbar-inverse .nav .active>a:hover, .navbar-inverse .nav .active>a:focus,
					.navbar-inverse .brand, .navbar-inverse .nav>li>a ,.navbar-inverse .nav>li>a:hover,
					.sidebartitle,#searchsubmit:hover,.pagination .active,.page-numbers.current,#wp-calendar tfoot #prev,
					#wp-calendar th,#wp-calendar caption,#wp-calendar tfoot #prev a,.diamondtheme-post-pagination > .currentpostno,
					.flexslider .flex-prev:hover,.flexslider .flex-next:hover,.fraction-slider .prev:hover,.fraction-slider .next:hover,
					.pricinginner:hover .pricetriangle{
							color: {$seccolor};
					}
					.post-password-form  input[type='submit'],#gototop:hover,.navbar .btn-navbar,.buttonlink,.pagetitle,
					.pricingimg,.pricinginner:hover .pricingtitleunderline,.prjt-item-hover,.bloglink,
					.flex-control-paging li a.flex-active,.flex-control-paging li a:hover{
						background: {$pricolor};
					}						
					.social_header,.post-password-form  input[type='submit']:hover,#gototop,.navbar .btn-navbar:hover,.buttonlink:hover,
					.pricingtitleunderline,.buynow,.pricinginner:hover,
					.footer,.bloglink:hover,.flexslider .flex-prev,.flexslider .flex-next,.flexslider .innernav,
					.fraction-slider .prev,.fraction-slider .next,.fraction-slider .innernav{
						background: {$seccolor};
					}
					.dropdown-menu{
						border-left:3px solid {$seccolor};
						background:{$pricolor};	
					}	
					.sw2{
						background:{$seccolor};
						border:1px solid {$seccolor};
					}

					.sw1{
						border:1px solid {$seccolor};
					}	
					.serviceblock .span4:hover .servicetitle h4{
						color:{$seccolor};
					}

					.sidebar .block li{
						border-bottom:1px solid {$pricolor};
					}	
					.divider{
						border-bottom: 2px solid {$pricolor};
					}

					.dividerd{
						border-bottom: 4px solid {$pricolor};
					}	
					.titleblock{
						border-bottom:1px solid {$pricolor};
					}
					.serviceicon{
						border: 6px solid {$pricolor};
						background:{$pricolor};
					}	

					.serviceblock .span4:hover .serviceicon{
						border-color:{$seccolor};
					}	
					.pricetriangle{
						border-color: transparent {$seccolor} transparent transparent;
					}
					.googlemap:before{
						background: {$contactoverlay};
					}	
					.slideoverlay {
						background: {$slideoverlay};
					}
					blockquote{
						border-left:2px solid {$seccolor};
					}
					@media (max-width: 979px) {
						
						.dropdown-menu a {
							color: {$pricolor}!important;
						}

					}						
					";
			wp_add_inline_style( 'color-scheme', $custom_css );		
		}
	}

}

//add_action('wp_head', 'diamondtheme_colorscheme');

function diamondtheme_testimonialstyle() {

	$testimonialimg=of_get_option('testimonialimg');
	if($testimonialimg!='')
	{
	?>	

		<style>
		.testimonialblock{
			background:url("<?php echo $testimonialimg; ?>") center repeat;
			background-size:cover;
		}	
		</style>
		
	<?php
	}
	else
	{
	?>
		
		<style>
		.testimonialblock{
			background:url("<?php echo get_template_directory_uri().'/images/banner.jpg'; ?>") center repeat;
			background-size:cover;
		}	
		</style>
	
	<?php
	}
	?>

<?php

}

add_action('wp_head', 'diamondtheme_testimonialstyle');
 
function diamondtheme_fontswitcher() {

	if(of_get_option('fontstoggle')){
	  
		if(of_get_option('bodyfont1')!=""){
			$bodyfont=str_replace("+"," ",of_get_option('bodyfont1'));
			$bodyfontn=explode(":",$bodyfont);
		}		
		if(of_get_option('headingfont1')!=""){		
			$headingfont=str_replace("+"," ",of_get_option('headingfont1'));
			$headingfontn=explode(":",$headingfont);
		}	
		if(of_get_option('menufont')!=""){		
			$menufont=str_replace("+"," ",of_get_option('menufont'));
			$menufontn=explode(":",$menufont);
		}			
		
		if(of_get_option('bodyfont1')!=""){?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $bodyfont;?>' rel='stylesheet' type='text/css'>	
		<?php }?>
		<?php if(of_get_option('headingfont1')!=""){ ?>		
		<link href='http://fonts.googleapis.com/css?family=<?php echo $headingfont;?>' rel='stylesheet' type='text/css'>		
		<?php }?>
		<?php if(of_get_option('menufont')!=""){ ?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $menufont;?>' rel='stylesheet' type='text/css'>		
		<?php }?>
	<?php }?>		
	  <style>

	  <?php if(of_get_option('fontstoggle')){?>

		<?php if(of_get_option('bodyfont1')!=""){ ?>
	  
		body,input,textarea {
		font-family: <?php echo $bodyfontn[0];?>;
		font-weight: <?php if($bodyfontn[1]!=""){echo $bodyfontn[1];}else{echo "normal";};?>;
		}
		
		<?php } ?>
		
		<?php if(of_get_option('headingfont1')!=""){ ?>		
		
		h1,h2,h3,h4,h5,h6,.maintitle,.titlestart,.pricingtitle,.teamtitle,.blocktitle,.sidebartitle,.fraction-slider .slide > p {
			font-family: <?php echo $headingfontn[0];?>;
			font-weight: <?php if($headingfontn[1]!=""){echo $headingfontn[1];}else{echo "normal";};?>;			
		}

		<?php } ?>
		
		<?php if(of_get_option('menufont')!=""){ ?>
		
		.header{
			font-family: <?php echo $menufontn[0];?>;
			font-weight:normal;
		}

		<?php } ?>

		<?php } ?>	

	  
	  </style>
<?php
}

add_action('wp_head', 'diamondtheme_fontswitcher');
 
 
function hex2rgba($color, $opacity) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
          return $default; 

	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
} 
?>