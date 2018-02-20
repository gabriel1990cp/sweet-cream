<?php
/*
Plugin Name: DiamondTheme Tools
Plugin URI: http://we-biz.biz/wp/
Description: Plugin which consists of shortcodes and portfolio fields
Author: DiamondTheme
Author URI: http://themeforest.net/user/diamondtheme
Version: 1.0
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
***/


if ( ! class_exists( 'DiamondTheme_Tools' ) ) :
class DiamondTheme_Tools {

	// Current plugin version
	var $version = 1.0;

	function __construct() {

		// Runs when the plugin is activated
		register_activation_hook( __FILE__, array( &$this, 'plugin_activation' ) );

		// Add support for translations
		load_plugin_textdomain( 'diamondtheme', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

		add_action( 'init', array( &$this, 'shortcodes_init' ) );
		add_action( 'init', array( &$this, 'create_shortcodes' ) );

		add_action('admin_enqueue_scripts', array( &$this, 'diamondtheme_styles' ));
		
	}

	function plugin_activation() {
		$this->shortcodes_init();
		flush_rewrite_rules();
	}

	function shortcodes_init() {
		
	if ( get_user_option('rich_editing') == 'true' ) {

	add_filter("mce_external_plugins", "diamondtheme_tools_add_buttons");
    add_filter('mce_buttons', 'diamondtheme_tools_register_buttons');
	
	}
	
	function diamondtheme_tools_add_buttons($plugin_array) {
		$plugin_array['diamondtheme_tools'] = plugins_url() . '/diamondtheme_tools/diamondtheme_tools.js';
		return $plugin_array;
	}
	function diamondtheme_tools_register_buttons($buttons) {
		array_push( $buttons, 'dropcap', 'showrecent','shortcodes' ); // dropcap', 'recentposts
		return $buttons;
	}	


	}

	function create_shortcodes() {
		include_once( 'shortcodes.php' );
	}

	function diamondtheme_styles() {
	  wp_enqueue_style( 'diamondthemesstyle', plugins_url() .'/diamondtheme_tools/css/style.css' );	  
	}


}

new DiamondTheme_Tools;


// Adds the portfolio post type and taxonomies
add_action( 'init', 'portfolio_init'  );

add_action( 'init', 'portfolio_filter') ;

add_action( 'admin_init', 'custom_meta_boxes' );		

add_action( 'save_post', 'add_team_fields',10,2 );

add_action( 'save_post', 'add_pricing_fields',10,2 );

add_action( 'save_post', 'add_testimonial_fields',10,2 );

add_action( 'save_post', 'add_slider_fields',10,2 );
		
function portfolio_init()  
{ 
	register_post_type( 'Contact Block',
		array(
			'labels' => array(
			'name' => __( 'Contact Block','windcake' ),
			'singular_name' => __( 'Contact Block','windcake' ),		
			'add_new' => _x( 'Add New', 'Contact Block','windcake' ),
			'add_new_item' => __( 'Add New Contact Block' ),
			'edit_item' => __( 'Edit Contact Block','windcake' ),
			'new_item' => __( 'New Contact Block','windcake' ),
			'view_item' => __( 'View Contact Block','windcake' ),
			'search_items' => __( 'Search Contact Block','windcake' ),
			'not_found' =>  __( 'No Contact Block found','windcake' ),
			'not_found_in_trash' => __( 'No Contact Block found in Trash','windcake' ),
			'parent_item_colon' => '',
			),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail'),
		  'query_var' => true,
		  'capability_type' => 'post',
		  'rewrite' => array( 'slug' => 'contactblock' ),
		  'has_archive' => true,
		  'exclude_from_search' => true,
		  'can_export' => true,
		)
    );
	
  register_post_type( 'Portfolio',
    array(
      'labels' => array(
        'name' => __( 'Portfolio','windcake' ),
        'singular_name' => __( 'Portfolio','windcake' ),		
        'add_new' => _x( 'Add New', 'Portfolio Project' ),
        'add_new_item' => __( 'Add New Portfolio Project','windcake' ),
        'edit_item' => __( 'Edit Portfolio Project','windcake' ),
        'new_item' => __( 'New Portfolio Project','windcake' ),
        'view_item' => __( 'View Portfolio Project','windcake' ),
        'search_items' => __( 'Search Portfolio Projects','windcake' ),
        'not_found' =>  __( 'No Portfolio Projects found','windcake' ),
        'not_found_in_trash' => __( 'No Portfolio Projects found in Trash','windcake' ),
        'parent_item_colon' => '',
        
        ),
      'public' => true,
      'supports' => array('title','editor','thumbnail'),
      'query_var' => true,
      'rewrite' => array( 'slug' => 'portfolio' ),
      'has_archive' => true,
	  'exclude_from_search' => true,
	  'can_export' => true,
      )
    );

	register_post_type( 'Pricing',
		array(
			'labels' => array(
			'name' => __( 'Pricing','windcake' ),
			'singular_name' => __( 'Pricing','windcake' ),		
			'add_new' => _x( 'Add New', 'Pricing' ),
			'add_new_item' => __( 'Add New Pricing','windcake' ),
			'edit_item' => __( 'Edit Pricing','windcake' ),
			'new_item' => __( 'New Pricing','windcake' ),
			'view_item' => __( 'View Pricing','windcake' ),
			'search_items' => __( 'Search Pricing','windcake' ),
			'not_found' =>  __( 'No Pricing found','windcake' ),
			'not_found_in_trash' => __( 'No Pricing found in Trash','windcake' ),
			'parent_item_colon' => '',
			),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'pricing' ),
		  'has_archive' => true,
		  'exclude_from_search' => true,
		  'can_export' => true,
		)
    );
	
	register_post_type( 'Services',
		array(
			'labels' => array(
			'name' => __( 'Service','windcake' ),
			'singular_name' => __( 'Service','windcake' ),		
			'add_new' => _x( 'Add New', 'Service' ),
			'add_new_item' => __( 'Add New Service','windcake' ),
			'edit_item' => __( 'Edit Service','windcake' ),
			'new_item' => __( 'New Service','windcake' ),
			'view_item' => __( 'View Service','windcake' ),
			'search_items' => __( 'Search Service','windcake' ),
			'not_found' =>  __( 'No Service found','windcake' ),
			'not_found_in_trash' => __( 'No Service found in Trash','windcake' ),
			'parent_item_colon' => '',
			),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'services' ),
		  'has_archive' => true,
		  'exclude_from_search' => true,
		  'can_export' => true,
		)
    );

	register_post_type( 'Team',
		array(
			'labels' => array(
			'name' => __( 'Team','windcake' ),
			'singular_name' => __( 'Team','windcake' ),		
			'add_new' => _x( 'Add New', 'Team Member' ),
			'add_new_item' => __( 'Add New Team Member','windcake' ),
			'edit_item' => __( 'Edit Team Member','windcake' ),
			'new_item' => __( 'New Team Member','windcake' ),
			'view_item' => __( 'View Team Member','windcake' ),
			'search_items' => __( 'Search Team Member','windcake' ),
			'not_found' =>  __( 'No Team Member found','windcake' ),
			'not_found_in_trash' => __( 'No Team Member found in Trash','windcake' ),
			'parent_item_colon' => '',
			),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'team' ),
		  'has_archive' => true,
		  'exclude_from_search' => true,
		  'can_export' => true,
		)
    );	
	
	register_post_type( 'Testimonial',
		array(
			'labels' => array(
			'name' => __( 'Testimonial','windcake' ),
			'singular_name' => __( 'Testimonial','windcake' ),		
			'add_new' => _x( 'Add New', 'Testimonial' ),
			'add_new_item' => __( 'Add New Testimonial','windcake' ),
			'edit_item' => __( 'Edit Testimonial','windcake' ),
			'new_item' => __( 'New Testimonial','windcake' ),
			'view_item' => __( 'View Testimonials','windcake' ),
			'search_items' => __( 'Search Testimonial','windcake' ),
			'not_found' =>  __( 'No Testimonial found','windcake' ),
			'not_found_in_trash' => __( 'No Testimonial found in Trash','windcake' ),
			'parent_item_colon' => '',
			),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'testimonial' ),
		  'has_archive' => true,
		  'exclude_from_search' => true,
		  'can_export' => true,
		)
    );		
	
	register_post_type( 'Slider',
		array(
			'labels' => array(
			'name' => __( 'Slider','windcake' ),
			'singular_name' => __( 'Slider','windcake' ),		
			'add_new' => _x( 'Add New', 'Slides' ),
			'add_new_item' => __( 'Add New Slides','windcake' ),
			'edit_item' => __( 'Edit Slide','windcake' ),
			'new_item' => __( 'New Slide','windcake' ),
			'view_item' => __( 'View Slides','windcake' ),
			'search_items' => __( 'Search Slides','windcake' ),
			'not_found' =>  __( 'No Slide found','windcake' ),
			'not_found_in_trash' => __( 'No Slides found in Trash','windcake' ),
			'parent_item_colon' => '',
			),
		  'public' => true,
		  'supports' => array('title','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'slider' ),
		  'has_archive' => true,
		  'exclude_from_search' => true,
		  'can_export' => true,
		)
    );			
	
}
	

function portfolio_filter()  
{  
  register_taxonomy(  
    __( "filter" ),  
    array(__( "portfolio" )),  
    array(  
      "hierarchical" => true,  
      "label" => __( "Category",'windcake' ),  
      "singular_label" => __( "Category",'windcake' ),  
      "rewrite" => array(  
        'slug' => 'filter',  
        'hierarchical' => true  
        )  
      )  
    );  
} 
	
function custom_meta_boxes() {
  add_meta_box( 'team_meta_box',
    'Designation',
    'display_team_meta_box',
    'team', 'normal', 'low'
    );
  add_meta_box( 'team_social_meta_box',
    'Social Links',
    'display_team_social_meta_box',
    'team', 'normal', 'low'
    );	
  add_meta_box( 'pricing_meta_box',
    'Pricing',
    'display_pricing_meta_box',
    'pricing', 'normal', 'low'
    );	
  add_meta_box( 'testimonial_meta_box',
    'Testimonial',
    'display_testimonial_meta_box',
    'testimonial', 'normal', 'low'
    );	
  add_meta_box( 'slider_meta_box',
    'Slider',
    'display_slider_meta_box',
    'slider', 'normal', 'low'
    );		
}

function display_team_meta_box( $team_val ) {

  $team_designation = esc_html( get_post_meta( $team_val->ID, 'team_designation', true ) );
  
  ?>
  <div class="meta_block">
		<div class="meta_option_label">
			Designation
		</div>
		<div class="meta_option_value">
			<input type="text" name="team_designation" value="<?php echo $team_designation; ?>">
		</div>
  </div>    
  
  <?php
}

function display_team_social_meta_box( $team_val ) {

  $team_fb = esc_html( get_post_meta( $team_val->ID, 'team_fb', true ) );
  $team_tw = esc_html( get_post_meta( $team_val->ID, 'team_tw', true ) );
  $team_email = esc_html( get_post_meta( $team_val->ID, 'team_email', true ) );
  $team_instagram = esc_html( get_post_meta( $team_val->ID, 'team_instagram', true ) );
  
  ?>
  <div class="meta_block">
		<div class="meta_option_label">
			Facebook
		</div>
		<div class="meta_option_value">
			<input type="text" name="team_fb" value="<?php echo $team_fb; ?>">
		</div>
  </div>    
  <div class="meta_block">
		<div class="meta_option_label">
			Twitter
		</div>
		<div class="meta_option_value">
			<input type="text" name="team_tw" value="<?php echo $team_tw; ?>">
		</div>
  </div>  
  <div class="meta_block">
		<div class="meta_option_label">
			Email
		</div>
		<div class="meta_option_value">
			<input type="text" name="team_email" value="<?php echo $team_email; ?>">
		</div>
  </div>  
  <div class="meta_block">
		<div class="meta_option_label">
			Instagram
		</div>
		<div class="meta_option_value">
			<input type="text" name="team_instagram" value="<?php echo $team_instagram; ?>">
		</div>
  </div>    

 
  <?php
}

function add_team_fields( $team_val_id, $team_val ) {
  if ( $team_val->post_type == 'team' ) {
  
    if ( isset( $_POST['team_designation'] ) ) {  
		update_post_meta( $team_val_id, 'team_designation', $_POST['team_designation'] );
	}

    if ( isset( $_POST['team_fb'] ) ) {  
		update_post_meta( $team_val_id, 'team_fb', $_POST['team_fb'] );
	}	

    if ( isset( $_POST['team_tw'] ) ) {  
		update_post_meta( $team_val_id, 'team_tw', $_POST['team_tw'] );
	}
	
    if ( isset( $_POST['team_email'] ) ) {  
		update_post_meta( $team_val_id, 'team_email', $_POST['team_email'] );
	}

    if ( isset( $_POST['team_instagram'] ) ) {  
		update_post_meta( $team_val_id, 'team_instagram', $_POST['team_instagram'] );
	}	
	
  }
}


function display_pricing_meta_box( $pricing_val ) {

  $pricing_price = esc_html( get_post_meta( $pricing_val->ID, 'pricing_price', true ) );
  $pricing_buynowlink = esc_html( get_post_meta( $pricing_val->ID, 'pricing_buynowlink', true ) );
  
  ?>
  <div class="meta_block">
		<div class="meta_option_label">
			Price
		</div>
		<div class="meta_option_value">
			<input type="text" name="pricing_price" value="<?php echo $pricing_price; ?>">
		</div>
  </div>    
  <div class="meta_block">
		<div class="meta_option_label">
			Buy Now URL
		</div>
		<div class="meta_option_value">
			<input type="text" name="pricing_buynowlink" value="<?php echo $pricing_buynowlink; ?>">
		</div>
  </div>  

  <?php
}

function add_pricing_fields( $pricing_val_id, $pricing_val ) {
  if ( $pricing_val->post_type == 'pricing' ) {
 
    if ( isset( $_POST['pricing_price'] ) ) {  
		update_post_meta( $pricing_val_id, 'pricing_price', $_POST['pricing_price'] );
	}	

    if ( isset( $_POST['pricing_buynowlink'] ) ) {  
		update_post_meta( $pricing_val_id, 'pricing_buynowlink', $_POST['pricing_buynowlink'] );
	}
	
  }
}

function display_testimonial_meta_box( $testimonial_val ) {

  $testimonial_author = esc_html( get_post_meta( $testimonial_val->ID, 'testimonial_author', true ) );
  $testimonial_designation = esc_html( get_post_meta( $testimonial_val->ID, 'testimonial_designation', true ) );
  
  ?>
  <div class="meta_block">
		<div class="meta_option_label">
			Author
		</div>
		<div class="meta_option_value">
			<input type="text" name="testimonial_author" value="<?php echo $testimonial_author; ?>">
		</div>
  </div>    
  <div class="meta_block">
		<div class="meta_option_label">
			Designation
		</div>
		<div class="meta_option_value">
			<input type="text" name="testimonial_designation" value="<?php echo $testimonial_designation; ?>">
		</div>
  </div>  

  <?php
}

function add_testimonial_fields( $testimonial_val_id, $testimonial_val ) {
  if ( $testimonial_val->post_type == 'testimonial' ) {
 
    if ( isset( $_POST['testimonial_author'] ) ) {  
		update_post_meta( $testimonial_val_id, 'testimonial_author', $_POST['testimonial_author'] );
	}	

    if ( isset( $_POST['testimonial_designation'] ) ) {  
		update_post_meta( $testimonial_val_id, 'testimonial_designation', $_POST['testimonial_designation'] );
	}
	
  }
}

function display_slider_meta_box( $slider_val ) {

  $slider_caption1 = esc_html( get_post_meta( $slider_val->ID, 'slider_caption1', true ) );
  $slider_caption2 = esc_html( get_post_meta( $slider_val->ID, 'slider_caption2', true ) );
  
  ?>
  <div class="meta_block">
		<div class="meta_option_label">
			Caption 1
		</div>
		<div class="meta_option_value">
			<textarea name="slider_caption1"><?php echo $slider_caption1; ?></textarea>
		</div>
  </div>    
  <div class="meta_block">
		<div class="meta_option_label">
			Caption 2
		</div>
		<div class="meta_option_value">
			<textarea name="slider_caption2"><?php echo $slider_caption2; ?></textarea>
		</div>
  </div>  

  <?php
}

function add_slider_fields( $slider_val_id, $slider_val ) {
  if ( $slider_val->post_type == 'slider' ) {
 
    if ( isset( $_POST['slider_caption1'] ) ) {  
		update_post_meta( $slider_val_id, 'slider_caption1', $_POST['slider_caption1'] );
	}	

    if ( isset( $_POST['slider_caption2'] ) ) {  
		update_post_meta( $slider_val_id, 'slider_caption2', $_POST['slider_caption2'] );
	}
	
  }
}

endif;