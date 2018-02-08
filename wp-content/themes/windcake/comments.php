<?php
/*
Comments Page
*/
if ( post_password_required() )
	return;
?>

<?php if ( have_comments() ) : ?>
			
	<div class="blogsingleblock" id="comments">	
		<div class="blocktitle"><?php comments_number('No Comments', '1 Comment', '% Comments' );?></div>
	
		<ol class="commentlist">
				<?php wp_list_comments('type=comment&callback=windcake_comment'); ?>
		</ol>
	</div>
<?php else : ?>

	<?php if ( comments_open() ) : ?>
	<?php else :  ?>
	<p class="nocomments">Comments are closed.</p>
	
	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	
			
		<section id="respond" class="respond-form">


		<div class="blocktitle">Post a Comment</div>

		<div class="comment-block">
		
		<div id="cancel-comment-reply">
			<p class="small"><?php cancel_comment_reply_link(); ?></p>
		</div>

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<div class="help">
				<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in </a>to post a comment.</p>
			</div>
		<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				

					<?php if ( is_user_logged_in() ) : ?>

					<div class="comments-logged-in-as"><span class="loginc">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a></span></div>
							
					<?php else : ?>
					
					<?php

					ob_start();
					comment_form($args);
					$comment_form = ob_get_clean();
					?>
					
					<div class="row-fluid">
						<div class="contact-input">
							<div class="contact-label">Your Name</div>
								<input class="textname" type="text" name="author" id="author" placeholder="What are you called:" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" >
							</div>
						<div class="contact-input">
							<div class="contact-label">Your Email Address</div>							
								<input class="textemail" type="email" name="email" id="email" placeholder="Will not be published" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" >
						</div>
					</div>

						
					<?php endif; ?>

					<div class="contact-textarea">
						<div class="contact-label">Your Message</div>								
							<textarea name="comment" id="comment" tabindex="4" placeholder="What would you like to say? please be polite"></textarea>
					</div>
					
					<div class="row-fluid">
						<input name="submit" type="submit" id="postcomment" class="bloglink postsubmit" tabindex="5" value="POST NOW" />
					</div>					


					
					<?php comment_id_fields(); ?>
				
					<?php do_action('comment_form', $post->ID); ?>
				
			</form>
		
		<?php endif;?>
		
		</div>
	

	
		</section>


	
<?php endif; ?>
