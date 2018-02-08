<?php
/*
 *Display all Blog Posts
 */
?>
<?php
if ( has_post_format( 'quote' ) || has_post_format( 'status' ) ) {

?>

	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>  	
		<div class="blog-thumb">		
			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail('post-thumbnail');?> 		<!-- set image here !-->
			</a>										
		</div>
	<?php endif ?>										
												
	<div class="row-fluid post-meta-outer">
						
		<ul class="post-meta-fields">
			<li><span class="title"><?php _e("Posted In ", "windcake"); ?>:</span> <?php the_category(', '); ?></li>
			<li><span class="title date-title"></span> <span class="date-color"><?php the_time(get_option('date_format'));?></span></li>							
			<li><span class="title by-title"></span> <?php the_author_posts_link(); ?></li>
			<?php $post_tags = wp_get_post_tags($post->ID);
				if(!empty($post_tags)) { ?>
			<li>
				<span class="title tag1-title1"></span>
				<span class="tags">
					<?php the_tags('', ', ', ''); ?>
				</span>
			</li>
			<?php } ?>
			<li><span class="title comment-title"></span> <?php comments_popup_link(__('0 Comments', 'windcake'), __('1 Comment', 'windcake'), __('% Comments', 'windcake')); ?></li>
		</ul>
						
	</div>						
			
	<div class="row-fluid contenttext">
		<?php the_content(); ?>	
		<?php
			wp_link_pages(array(
				'before' => '<div class="diamondtheme-post-pagination">' . __('Pages : ','windcake'),
				'after' => '</div>',
				'next_or_number' => 'next_and_number', # activate parameter overloading
				'nextpagelink'     => __('','windcake'),
				'previouspagelink' => __('','windcake'),
				'pagelink' => '<span class="currentpostno">%</span>',
				'highlight'   => 'current',
				'echo' => '"<span class="currentpostno">".1."</span>"' )
			);						
		?> 		
	</div>		

	<div class="quoteauthor">
		<span>- </span><?php echo get_post_meta( $post->ID, 'quote_a', true );?>						
	</div>
<?php
}
else if ( has_post_format( 'link' )) {
?>
	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>  	
		<div class="blog-thumb">		
			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail('post-thumbnail');?> 		<!-- set image here !-->
			</a>										
		</div>
	<?php endif ?>										
												
	<div class="row-fluid post-meta-outer">
						
		<ul class="post-meta-fields">
			<li><span class="title"><?php _e("Posted In ", "windcake"); ?>:</span> <?php the_category(', '); ?></li>
			<li><span class="title date-title"></span> <span class="date-color"><?php the_time(get_option('date_format'));?></span></li>							
			<li><span class="title by-title"></span> <?php the_author_posts_link(); ?></li>
			<?php $post_tags = wp_get_post_tags($post->ID);
				if(!empty($post_tags)) { ?>
			<li>
				<span class="title tag1-title1"></span>
				<span class="tags">
					<?php the_tags('', ', ', ''); ?>
				</span>
			</li>
			<?php } ?>
			<li><span class="title comment-title"></span> <?php comments_popup_link(__('0 Comments', 'windcake'), __('1 Comment', 'windcake'), __('% Comments', 'windcake')); ?></li>
		</ul>
						
	</div>						
			
	<div class="row-fluid contenttext">
		<?php the_content(); ?>	
		<?php
			wp_link_pages(array(
				'before' => '<div class="diamondtheme-post-pagination">' . __('Pages : ','windcake'),
				'after' => '</div>',
				'next_or_number' => 'next_and_number', # activate parameter overloading
				'nextpagelink'     => __('','windcake'),
				'previouspagelink' => __('','windcake'),
				'pagelink' => '<span class="currentpostno">%</span>',
				'highlight'   => 'current',
				'echo' => '"<span class="currentpostno">".1."</span>"' )
			);						
		?> 		
	</div>		

		<div class="quoteauthor">
			<a href="<?php echo get_post_meta( $post->ID, 'link_w', true );?>" target="_blank"><?php echo get_post_meta( $post->ID, 'link_n', true );?></a>						
		</div>
<?php
}
else if(has_post_format('video') || has_post_format('audio'))
{

		$video_description =   get_post_meta( $post->ID, 'video_description', true ) ;
		$pattern = '~<iframe.*</iframe>~';
		if(preg_match($pattern, $video_description))
		{
			$var=$video_description;
		}else
		{
		$var = apply_filters('the_content', "[embed]" . $video_description . "[/embed]");}
?>
							
	<div class="blog-thumb">		
						
		<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>  	
			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail('post-thumbnail');?> 		<!-- set image here !-->
			</a>										
		<?php endif ?>

		<div class="videoblock">
			<?php echo $var; ?>						
		</div>
	
	</div>
												
	<div class="row-fluid post-meta-outer">
						
		<ul class="post-meta-fields">
			<li><span class="title"><?php _e("Posted In ", "windcake"); ?>:</span> <?php the_category(', '); ?></li>
			<li><span class="title date-title"></span> <span class="date-color"><?php the_time(get_option('date_format'));?></span></li>							
			<li><span class="title by-title"></span> <?php the_author_posts_link(); ?></li>
			<?php $post_tags = wp_get_post_tags($post->ID);
				if(!empty($post_tags)) { ?>
			<li>
				<span class="title tag1-title1"></span>
				<span class="tags">
				<?php the_tags('', ', ', ''); ?>
				</span>
			</li>
			<?php } ?>
			<li><span class="title comment-title"></span> <?php comments_popup_link(__('0 Comments', 'windcake'), __('1 Comment', 'windcake'), __('% Comments', 'windcake')); ?></li>
		</ul>
						
	</div>						
			
	<div class="row-fluid contenttext">
		<?php the_content(); ?>	
		<?php
			wp_link_pages(array(
				'before' => '<div class="diamondtheme-post-pagination">' . __('Pages : ','windcake'),
				'after' => '</div>',
				'next_or_number' => 'next_and_number', # activate parameter overloading
				'nextpagelink'     => __('','windcake'),
				'previouspagelink' => __('','windcake'),
				'pagelink' => '<span class="currentpostno">%</span>',
				'highlight'   => 'current',
				'echo' => '"<span class="currentpostno">".1."</span>"' )
			);						
		?> 		
	</div>					

<?php
}
else if(has_post_format( 'gallery' ))
{
?>
	<div class="blog-thumb">		

		<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>  	
			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail('post-thumbnail');?> 		<!-- set image here !-->
			</a>		
		<?php endif ?>	
	</div>		
	
	<div class="gallery-thumb">		
	
		<?php gallery_slideshow($post);?> 	

	</div>
												
	<div class="row-fluid post-meta-outer">
						
		<ul class="post-meta-fields">
			<li><span class="title"><?php _e("Posted In ", "windcake"); ?>:</span> <?php the_category(', '); ?></li>
			<li><span class="title date-title"></span> <span class="date-color"><?php the_time(get_option('date_format'));?></span></li>							
			<li><span class="title by-title"></span> <?php the_author_posts_link(); ?></li>
			<?php $post_tags = wp_get_post_tags($post->ID);
				if(!empty($post_tags)) { ?>
			<li>
				<span class="title tag1-title1"></span>
				<span class="tags">
					<?php the_tags('', ', ', ''); ?>
				</span>
			</li>
			<?php } ?>
			<li><span class="title comment-title"></span> <?php comments_popup_link(__('0 Comments', 'windcake'), __('1 Comment', 'windcake'), __('% Comments', 'windcake')); ?></li>
		</ul>
						
	</div>						
			
	<div class="row-fluid contenttext">
		<?php the_content(); ?>	
		<?php
			wp_link_pages(array(
				'before' => '<div class="diamondtheme-post-pagination">' . __('Pages : ','windcake'),
				'after' => '</div>',
				'next_or_number' => 'next_and_number', # activate parameter overloading
				'nextpagelink'     => __('','windcake'),
				'previouspagelink' => __('','windcake'),
				'pagelink' => '<span class="currentpostno">%</span>',
				'highlight'   => 'current',
				'echo' => '"<span class="currentpostno">".1."</span>"' )
			);						
		?> 		
	</div>		

<?php
}
else if(has_post_format( 'aside' ) || has_post_format( 'image' ))
{
?>

	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>  	
		<div class="blog-thumb">		
			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail('post-thumbnail');?> 		<!-- set image here !-->
			</a>										
		</div>
	<?php endif ?>										
												
	<div class="row-fluid post-meta-outer">
						
		<ul class="post-meta-fields">
			<li><span class="title"><?php _e("Posted In ", "windcake"); ?>:</span> <?php the_category(', '); ?></li>
			<li><span class="title date-title"></span> <span class="date-color"><?php the_time(get_option('date_format'));?></span></li>							
			<li><span class="title by-title"></span> <?php the_author_posts_link(); ?></li>
			<?php $post_tags = wp_get_post_tags($post->ID);
				if(!empty($post_tags)) { ?>
			<li>
				<span class="title tag1-title1"></span>
				<span class="tags">
					<?php the_tags('', ', ', ''); ?>
				</span>
			</li>
			<?php } ?>
			<li><span class="title comment-title"></span> <?php comments_popup_link(__('0 Comments', 'windcake'), __('1 Comment', 'windcake'), __('% Comments', 'windcake')); ?></li>
		</ul>
						
	</div>						
			
	<div class="row-fluid contenttext">
		<?php the_content(); ?>	
		<?php
			wp_link_pages(array(
				'before' => '<div class="diamondtheme-post-pagination">' . __('Pages : ','windcake'),
				'after' => '</div>',
				'next_or_number' => 'next_and_number', # activate parameter overloading
				'nextpagelink'     => __('','windcake'),
				'previouspagelink' => __('','windcake'),
				'pagelink' => '<span class="currentpostno">%</span>',
				'highlight'   => 'current',
				'echo' => '"<span class="currentpostno">".1."</span>"' )
			);						
		?> 		
	</div>	

<?php
}
else if(has_post_format( 'chat' ))
{
?>

	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>  	
		<div class="blog-thumb">		
			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail('post-thumbnail');?> 		<!-- set image here !-->
			</a>										
		</div>
	<?php endif ?>										
												
	<div class="row-fluid post-meta-outer">
						
		<ul class="post-meta-fields">
			<li><span class="title"><?php _e("Posted In ", "windcake"); ?>:</span> <?php the_category(', '); ?></li>
			<li><span class="title date-title"></span> <span class="date-color"><?php the_time(get_option('date_format'));?></span></li>							
			<li><span class="title by-title"></span> <?php the_author_posts_link(); ?></li>
			<?php $post_tags = wp_get_post_tags($post->ID);
				if(!empty($post_tags)) { ?>
			<li>
				<span class="title tag1-title1"></span>
				<span class="tags">
					<?php the_tags('', ', ', ''); ?>
				</span>
			</li>
			<?php } ?>
			<li><span class="title comment-title"></span> <?php comments_popup_link(__('0 Comments', 'windcake'), __('1 Comment', 'windcake'), __('% Comments', 'windcake')); ?></li>
		</ul>
						
	</div>						
			
	<div class="row-fluid chat_post contenttext">
		<?php the_content(); ?>	
		<?php
			wp_link_pages(array(
				'before' => '<div class="diamondtheme-post-pagination">' . __('Pages : ','windcake'),
				'after' => '</div>',
				'next_or_number' => 'next_and_number', # activate parameter overloading
				'nextpagelink'     => __('','windcake'),
				'previouspagelink' => __('','windcake'),
				'pagelink' => '<span class="currentpostno">%</span>',
				'highlight'   => 'current',
				'echo' => '"<span class="currentpostno">".1."</span>"' )
			);						
		?> 		
	</div>	

<?php
}
else
{
	
?>	
				
	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>  	
		<div class="blog-thumb">		
			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail('post-thumbnail');?> 		<!-- set image here !-->
			</a>										
		</div>
	<?php endif ?>										
												
	<div class="row-fluid post-meta-outer">
						
		<ul class="post-meta-fields">
			<li><span class="title"><?php _e("Posted In ", "windcake"); ?>:</span> <?php the_category(', '); ?></li>
			<li><span class="title date-title"></span> <span class="date-color"><?php the_time(get_option('date_format'));?></span></li>							
			<li><span class="title by-title"></span> <?php the_author_posts_link(); ?></li>
			<?php $post_tags = wp_get_post_tags($post->ID);
				if(!empty($post_tags)) { ?>
			<li>
				<span class="title tag1-title1"></span>
				<span class="tags">
					<?php the_tags('', ', ', ''); ?>
				</span>
			</li>
			<?php } ?>
			<li><span class="title comment-title"></span> <?php comments_popup_link(__('0 Comments', 'windcake'), __('1 Comment', 'windcake'), __('% Comments', 'windcake')); ?></li>
		</ul>
						
	</div>						
			
	<div class="row-fluid contenttext">
		<?php the_content(); ?>		
		<?php
			wp_link_pages(array(
				'before' => '<div class="diamondtheme-post-pagination">' . __('Pages : ','windcake'),
				'after' => '</div>',
				'next_or_number' => 'next_and_number', # activate parameter overloading
				'nextpagelink'     => __('','windcake'),
				'previouspagelink' => __('','windcake'),
				'pagelink' => '<span class="currentpostno">%</span>',
				'highlight'   => 'current',
				'echo' => '"<span class="currentpostno">".1."</span>"' )
			);						
		?> 		
	</div>						

<?php
}
?>
