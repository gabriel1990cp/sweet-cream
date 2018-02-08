<?php
/*
Default Page
*/
 ?>
<?php get_header(); ?>

<div class="pagetitle">
			
	<div class="container titleinner">		
		<span class="titlestart">{</span>	
		<div class="maintitle fadeInUp"><?php the_title(' '); ?></div>
		<span class="titlestart">}</span>		
	</div>	
		
</div>

<div class="container blog-content1">					

	<div class="row-fluid">
	
		<div class="span12">
	
			<?php 
			
			while ( have_posts() ) : the_post(); 
			?>
			
			<div class="contenttext">
			
				<?php
				the_content();
				?>
			
			</div>
			
			<?php
			endwhile;
			
			?>
		
		
		</div>
		

	</div>		

</div>	


<?php get_footer(); ?>