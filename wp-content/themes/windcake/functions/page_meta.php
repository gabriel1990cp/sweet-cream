<?php
/**
 * Create meta options for pages
 */
 
function icon_custom_meta_boxes() {
  add_meta_box( 'video_meta_box',
    'Video or Audio Section',
    'display_video_meta_box',
    'post', 'normal', 'high'
    );	
  add_meta_box( 'quote_meta_box',
    'Quote or Status Section',
    'display_quote_meta_box',
    'post', 'normal', 'high'
    );	
  add_meta_box( 'link_meta_box',
    'Link Section',
    'display_link_meta_box',
    'post', 'normal', 'high'
    );
}

add_action( 'admin_init', 'icon_custom_meta_boxes' );		

function display_video_meta_box( $video_val ) {

  $video_description = esc_html( get_post_meta( $video_val->ID, 'video_description', true ) );
  ?>
  
  <div class="meta_block">
		<div class="meta_option_label">
			Video URL
		</div>
		<div class="meta_option_value">
			<textarea name="video_desc" rows="6" cols="120"><?php echo $video_description; ?></textarea>
		</div>
		<p class="desc">Copy paste the video or audio url embed code or link.</p>
  </div>    

  <?php
}

add_action( 'save_post', 'add_video_fields', 10, 2 );

function add_video_fields( $video_val_id, $video_val ) {
  if ( $video_val->post_type == 'post' ) {
    if ( isset( $_POST['video_desc'] ) ) {
      update_post_meta( $video_val_id, 'video_description', $_POST['video_desc'] );
    }
    
  }
}

function display_quote_meta_box( $quote_val ) {

  $quote_a = esc_html( get_post_meta( $quote_val->ID, 'quote_a', true ) );
  ?>
  
  <div class="meta_block">
		<div class="meta_option_label">
			Author Name
		</div>
		<div class="meta_option_value">
			<input type="text" name="quote_a" value="<?php echo $quote_a; ?>">
		</div>
		<p class="desc">Enter the author's name for the quote.</p>
  </div>    

  <?php
}

add_action( 'save_post', 'add_quote_fields', 10, 2 );

function add_quote_fields( $quote_val_id, $quote_val ) {
  if ( $quote_val->post_type == 'post' ) {
    if ( isset( $_POST['quote_a'] )) {
      update_post_meta( $quote_val_id, 'quote_a', $_POST['quote_a'] );
    }
    
  }
}

function display_link_meta_box( $link_val ) {

  $link_w = esc_html( get_post_meta( $link_val->ID, 'link_w', true ) );
  $link_n = esc_html( get_post_meta( $link_val->ID, 'link_n', true ) );

  if($link_n=="")
  {
	$link_n="Visit Website";
  }
  
  ?>
  <div class="meta_block">
		<div class="meta_option_label">
			Website URL
		</div>
		<div class="meta_option_value">
			<input type="text" name="link_w" value="<?php echo $link_w; ?>">
		</div>
		<p class="desc">Enter the website URL.</p>
  </div>  
  <div class="meta_block">
		<div class="meta_option_label">
			Link Name
		</div>
		<div class="meta_option_value">
			<input type="text" name="link_n" value="<?php echo $link_n; ?>">
		</div>
		<p class="desc">Enter the name for above link.</p>
  </div>  
  <?php
}

add_action( 'save_post', 'add_link_fields', 10, 2 );

function add_link_fields( $link_val_id, $link_val ) {
  if ( $link_val->post_type == 'post' ) {
    if ( isset( $_POST['link_w'] )) {
      update_post_meta( $link_val_id, 'link_w', $_POST['link_w'] );
    }
    if ( isset( $_POST['link_n'] )) {
      update_post_meta( $link_val_id, 'link_n', $_POST['link_n'] );
    }    
  }
}

?>