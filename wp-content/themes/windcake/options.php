<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'optionsframework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$color_scheme = array(
		'blue' => __('blue', 'windcake'),
		'violet' => __('violet', 'windcake'),
		'orange' => __('orange', 'windcake'),
		'green' => __('green', 'windcake'),
		'custom' => __('custom', 'windcake'),
		);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('Facebook', 'windcake'),
		'two' => __('Twitter', 'windcake'),
		'three' => __('Pinterest', 'windcake')
		);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
		);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Sidebar	Defaults
	$sidebarcolor_default = array(
		'color' => '#2a3239' );		

	$typographycolor_defaults = array(
		'color' => '#bada55' );
		
	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'style' => 'bold',
		'color' => '#bada55' );
	
	// Typography Options
	$typography_options = array(
		'sizes' => array( '11','12','13','14','15','16','18','19','20' ),
		'faces' => array( 'Open Sans' => 'Open Sans','Raleway' => 'Raleway','Noto Serif' => 'Noto Serif','Metal Mania' => 'Metal Mania','Noto Sans' => 'Noto Sans' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => true
		);

	// Typography Defaults
	$typography_defaultsh = array(
		'size' => '15px',
		'style' => 'bold',
		'face' => 'Raleway',
		'color' => '#000000' );
	
	// Typography Options
	$typography_optionsh = array(
		'sizes' => array( '11','12','13','14','15','16','18','19','20','21','22','23','24','25','26','27','28' ),
		'faces' => array( 'Open Sans' => 'Open Sans','Raleway' => 'Raleway','Noto Serif' => 'Noto Serif','Metal Mania' => 'Metal Mania','Noto Sans' => 'Noto Sans' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => true
		);		
		
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('General Settings', 'windcake'),
		'type' => 'heading',
		'icon' => 'cog');	

	$options[] = array(
		'name' => __('Custom Favicon', 'windcake'),
		'desc' => 'Upload your custom favicon icon.',
		'id' => 'favicon',
		'std' =>get_template_directory_uri().'/images/favicon.png',
		'desc' => 'Recommended sizes : 16x16 px , 32x32 px',	
		'type' => 'upload');
	
	$options[] = array(
		'name' => __('Custom Logo', 'windcake'),
		'desc' => 'Upload your custom logo.',		
		'id' => 'logoimg1',
		'std' =>get_template_directory_uri().'/images/logo.png',		
		'type' => 'upload');	

	$options[] = array(
		'name' => __('Retina Logo', 'windcake'),
		'desc' => 'Upload your retina logo.(It should be 2xlogo)',		
		'id' => 'retinalogo',
		'std' =>get_template_directory_uri().'/images/logo@2x.png',		
		'type' => 'upload');		
		
	$options[] = array(
		'name' => __('Iphone icon', 'windcake'),
		'id' => 'iphoneicon',
		'desc' => 'Size should be 57 x 57 px',
		'std' =>get_template_directory_uri().'/images/iphone-icon.png',				
		'type' => 'upload');

	$options[] = array(
		'name' => __('Iphone retina icon', 'windcake'),
		'id' => 'iphoneretinaicon',
		'desc' => 'Size should be 114 x 114 px',	
		'std' =>get_template_directory_uri().'/images/iphone-icon-retina.png',						
		'type' => 'upload');

	$options[] = array(
		'name' => __('Ipad icon', 'windcake'),
		'id' => 'ipadicon',
		'desc' => 'Size should be 72 x 72 px',
		'std' =>get_template_directory_uri().'/images/ipad-icon.png',						
		'type' => 'upload');

	$options[] = array(
		'name' => __('Ipad retina icon', 'windcake'),
		'id' => 'ipadretinaicon',
		'desc' => 'Size should be 144 x 144 px',		
		'std' =>get_template_directory_uri().'/images/ipad-icon-retina.png',						
		'type' => 'upload');			

	$options[] = array(
		'name' => __('Scroller Settings', 'windcake'),
		'desc' => '',
		'type' => 'info');			
		
	$options[] = array(
		'name' => __('Custom Scroller', 'windcake'),
		'id' => 'scrollertoggle',
		'std' => '0',
		'desc' => 'To display a custom scroller, switch the toggle to "ON" state. To display the default scroller, switch the toggle to "OFF" state.',
		'class1' => 'iphone-style-checkbox',		
		'type' => 'checkbox');		
		
	$options[] = array(
		'name' => __('Style Options', 'windcake'),
		'type' => 'heading',
		'icon' => 'indent-right');

	$options[] = array(
		'name' => __('Color Scheme', 'windcake'),
		'desc' => __('Choose the color scheme.', 'windcake'),
		'id' => 'scheme_select',
		'std' => 'blue',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $color_scheme);		

	$options[] = array(
		'name' =>  __('Primary Color', 'windcake'),
		'desc' => __('Set primary color', 'windcake'),
		'id' => 'pricolor',
		'std' => '#2a3239',
		'type' => 'color' );

	$options[] = array(
		'name' =>  __('Secondary Color', 'windcake'),
		'desc' => __('Set secondary color', 'windcake'),
		'id' => 'seccolor',
		'std' => '#000000',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Font Switcher', 'windcake'),
		'id' => 'fontstoggle',
		'std' => '0',
		'desc' => 'Toggle to enable or disable font switcher. You could change the fonts here.',
		'class1' => 'iphone-style-checkbox',		
		'type' => 'checkbox');	
		
	$options[] = array(
		'name' => __('Body Font', 'windcake'),
		'id' => 'bodyfont1',
		'type' => 'text');			

	$options[] = array(
		'name' => __('Heading Font', 'windcake'),
		'id' => 'headingfont1',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Menu Font', 'windcake'),
		'id' => 'menufont',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Custom CSS', 'windcake'),
		'desc' => 'Use this section to make some slight css changes.',
		'id' => 'customcss',
		'type' => 'textarea');		

	$options[] = array(
		'name' => __('Custom Javascript', 'windcake'),
		'desc' => 'Use this section to add some javascript or jquery code.',
		'id' => 'customjs',
		'type' => 'textarea');			
		
	$options[] = array(
		'name' => __('Footer', 'windcake'),
		'type' => 'heading',
		'icon' => 'th-large');	

	$options[] = array(
		'name' => __('Copyright Message', 'windcake'),
		'id' => 'copyright',
		'desc' => 'Set your copyright message here.',
		'std' => '<p>Copyright &copy; 2013 - Wjnd Cake Onepage PSD Template. </p><p>Designed by Wjnd. All rights reserved.</p>',	
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Testimonials', 'windcake'),
		'type' => 'heading',
		'icon' => 'user');

	$options[] = array(
		'name' => __('Background Image', 'windcake'),
		'id' => 'testimonialimg',
		'desc' => 'Set background image for testimonial block.',	
		'std' =>get_template_directory_uri().'/images/banner.jpg',						
		'type' => 'upload');		

	$options[] = array(
		'name' => __('Social', 'windcake'),
		'type' => 'heading',
		'icon' => 'twitter');					
		
	$options[] = array(
		'name' => __('Facebook', 'windcake'),
		'id' => 'facebook',
		'std' => '#',
		'desc' => 'Set Facebook URL',		
		'type' => 'text');		

	$options[] = array(
		'name' => __('Twitter', 'windcake'),
		'id' => 'twitter',
		'std' => '#',		
		'desc' => 'Set Twitter URL',		
		'type' => 'text');	

	$options[] = array(
		'name' => __('Skype', 'windcake'),
		'id' => 'skype',
		'std' => '#',
		'desc' => 'Set Skype URL',		
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Dribble', 'windcake'),
		'id' => 'dribble',
		'std' => '#',
		'desc' => 'Set Dribble URL',		
		'type' => 'text');

	$options[] = array(
		'name' => __('Flickr', 'windcake'),
		'id' => 'flickr',
		'std' => '#',		
		'desc' => 'Set Flickr URL',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google Plus', 'windcake'),
		'id' => 'gplus',
		'std' => '#',		
		'desc' => 'Set Google Plus URL',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Youtube', 'windcake'),
		'id' => 'youtube',
		'std' => '#',		
		'desc' => 'Set Youtube URL',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Pinterest', 'windcake'),
		'id' => 'pinterest',
		'std' => '#',		
		'desc' => 'Set Pinterest URL',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Instagram', 'windcake'),
		'id' => 'instagram',
		'std' => '#',		
		'desc' => 'Set Instagram URL',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('SEO Options', 'windcake'),
		'type' => 'heading',
		'icon' => 'asterisk');

	$options[] = array(
		'name' => __('Tracking Code', 'windcake'),
		'desc' => 'Paste your Google Analytics code (or any other tracking code) here. This will be added to the footer of your theme.',		
		'id' => 'googleanalytics',
		'type' => 'textarea');	

	$options[] = array(
		'name' => __('Site Description', 'windcake'),
		'desc' => 'Add the site decription. This will be added to the meta description tag in the header.',
		'id' => 'sitedescription',
		'type' => 'textarea');	
	
	$options[] = array(
		'name' => __('Site Keywords (seperated by commas)', 'windcake'),
		'desc' => 'Add 10 - 12 relevant keywords. This will be added to the meta keywords tag in the header.',		
		'id' => 'sitekeywords',
		'type' => 'textarea');	
		
	return $options;
}