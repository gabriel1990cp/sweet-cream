<?php
/**
 * Define widgets for this theme
 */

/* Slider Widget */
class SliderWidget extends WP_Widget
{
  function SliderWidget()
  {
    $widget_ops = array('classname' => 'SliderWidget', 'description' => 'Displays Slider.' );
    $this->__construct('SliderWidget', 'HomePage Slider', $widget_ops);
  }
  
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
    ?>
	<p>This widget will display slider. To add or edit slides, go to "Slider" => "Add New".</p>
    
    <?php
  }
  
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
  
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
    
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    
	
	
	$homeslider='';
					
	global $post; 
					
	query_posts(array(
		'post_type' => 'slider',
		'showposts' => -1,
	));
	
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	
	$homeslider=$homeslider.'<li>'.get_the_post_thumbnail().'<div class="slideoverlay"></div><div class="caption-container"><div class="captiontext1">'.esc_html( get_post_meta( $post->ID, 'slider_caption1', true ) ).'</div><div class="captiontext1">'.esc_html( get_post_meta( $post->ID, 'slider_caption2', true ) ).'</div></div></li>';	
	
	
	endwhile; ?>
	<?php else : ?>
	<?php endif; 
	wp_reset_query();
	?>	
	
	<div class="flexslider homepageslider">
		<ul class='slides'>
			<?php echo $homeslider;?>
		</ul>
	</div>	
	
	<?php
    echo $after_widget;
  }
  
}
add_action( 'widgets_init', create_function('', 'return register_widget("SliderWidget");') );


/* Services Widget */
class ServicesWidget extends WP_Widget
{
  function ServicesWidget()
  {
    $widget_ops = array('classname' => 'ServicesWidget', 'description' => 'Displays Service blocks.' );
    $this->__construct('ServicesWidget', 'HomePage Services', $widget_ops);
  }
  
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
    $title = $instance['title'];
	
    ?>
	<p>This widget will display service blocks. To add or edit "Services", go to "Services" and add or edit services.</p>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

    <?php
	
	

	
  }
  
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
  
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
    
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

    if (!empty($title))
	{
	?>
		<div class="titleblock">
			
			<div class="container titleinner">		
			
				<?php
				  echo $before_title . $title . $after_title;
				?>
				
			</div>	
		
		</div>

	<?php		
	  
	}
	
	?>
	
		<div class="container">
		
		
		
					<?php query_posts(array(
						'post_type' => 'services',
						'showposts' => -1,
						));
						$count=0;
						$countl=0;
						if ( have_posts() ) : while ( have_posts() ) : the_post(); 
						if($count==0)
						{
						echo '<div class="row-fluid serviceblock">';
						}						
					?>				
				
					<div class="span4">
									
						<div class="service-content">
							<span class="serviceicon">
						
							<?php the_post_thumbnail('service-icon'); ?>
						
						</span>					
							<div class="servicetitle"><h4><?php the_title();?></h4></div>
							
							<?php the_content();?>
						
						</div>
						
					</div>
			
					<?php
					
					if($count==2)
					{
					echo '</div>';
					$count=0;
					$countl=1;
					}
					else
					{
					$count++;
					$countl=0;
					}					
					
					endwhile; 
					if($countl==0)
					{
					echo '</div>';
					}					
					?>
					<?php else : ?>
					<?php endif; 
					wp_reset_query();
					?>
		
		
		</div>	
	
	<?php
	
    echo $after_widget;
  }
  
}
add_action( 'widgets_init', create_function('', 'return register_widget("ServicesWidget");') );

/* Page Section Widget */
class PageSectionWidget extends WP_Widget
{
  function PageSectionWidget()
  {
    $widget_ops = array('classname' => 'PageSectionWidget', 'description' => 'Displays the user selected page content as a section on the HomePage' );
    $this->__construct('PageSectionWidget', 'HomePage Page Section', $widget_ops);
  }
  
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '','url'=>'') );
    $title = $instance['title'];
    $instance['url'] = strip_tags( $instance['url'] );
	
    ?>
	<p>This widget will display the user selected page content as a section on the HomePage.</p>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
    <p>
        <label for="<?php echo $this->get_field_id('url'); ?>">Page: </label>
        <?php wp_dropdown_pages(array('id' => $this->get_field_id('url'),'name' => $this->get_field_name('url'), 'selected' => $instance['url'])); ?>
    </p>	
	<?php 
  }
  
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['url'] = strip_tags( $new_instance['url'] );	
    return $instance;
  }
  
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
    
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $url = $instance['url'];

    if (!empty($title))
	{
	?>
		<div class="titleblock">
			
			<div class="container titleinner">		
			
				<?php
				  echo $before_title . $title . $after_title;
				?>
				
			</div>	
		
		</div>

	<?php		
	  
	}
	
	?>
	
		<div class="container">
		
		<div class="row-fluid contenttext">
		
			<?php
			
			$post = get_page($url); 
			$content = apply_filters('the_content', $post->post_content); 
			echo $content;  			
			
			?>
		
		</div>
		
		</div>	
	
	<?php
	
    echo $after_widget;
  }
  
}
add_action( 'widgets_init', create_function('', 'return register_widget("PageSectionWidget");') );

/* External Menu Link Widget */
class ExternalLinkWidget extends WP_Widget
{
  function ExternalLinkWidget()
  {
    $widget_ops = array('classname' => 'ExternalLinkWidget', 'description' => 'Displays external link in the menu.' );
    $this->__construct('ExternalLinkWidget', 'HomePage External Menu Link', $widget_ops);
  }
  
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '','url'=>'') );
    $title = $instance['title'];
    $instance['url'] = strip_tags( $instance['url'] );
	
    ?>
	<p>This widget will add an external link to the menu.</p>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
    <p>
        <label for="<?php echo $this->get_field_id('url'); ?>">Page: </label>
        <?php wp_dropdown_pages(array('id' => $this->get_field_id('url'),'name' => $this->get_field_name('url'), 'selected' => $instance['url'])); ?>
    </p>	
	<?php 
  }
  
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['url'] = strip_tags( $new_instance['url'] );	
    return $instance;
  }
  
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
    
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $url = $instance['url'];

    if (!empty($title))
	{
	?>
		<div class="titleblock">
			
			<div class="container titleinner">		
			
				<?php
				  echo $before_title . $title . $after_title;
				?>
				
			</div>	
		
		</div>

	<?php		
	  
	}
	
	?>
	
		<div class="menulink"><?php echo get_page_link($url); ?></div>
	
	<?php
	
    echo $after_widget;
  }
  
}
add_action( 'widgets_init', create_function('', 'return register_widget("ExternalLinkWidget");') );

/* Contact Widget */
class ContactWidget extends WP_Widget
{
  function ContactWidget()
  {
    $widget_ops = array('classname' => 'ContactWidget', 'description' => 'Displays Contact Blocks' );
    $this->__construct('ContactWidget', 'HomePage Contact', $widget_ops);
  }
  
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '','gmap' => '') );
    $title = $instance['title'];
    $gmap = $instance['gmap'];
	
    ?>
	<p>This widget will display contact blocks. To add or edit "Contact Block", go to "Contact Block" and add or edit contact block.</p>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
    <p><label for="<?php echo $this->get_field_id('gmap'); ?>">Google Map Code: <textarea class="widefat" id="<?php echo $this->get_field_id('gmap'); ?>" name="<?php echo $this->get_field_name('gmap'); ?>"><?php echo esc_attr($gmap); ?></textarea></label></p>

    <?php
	
  }
  
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
	$instance['gmap'] = $new_instance['gmap'];	
    return $instance;
  }
  
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
    
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $gmap = $instance['gmap'];

    if (!empty($title))
	{
	?>
		<div class="titleblock">
			
			<div class="container titleinner">		
			
				<?php
				  echo $before_title . $title . $after_title;
				?>
				
			</div>	
		
		</div>

	<?php		
	  
	}
	
	?>
	
		<div class="container">
		
		
					<?php query_posts(array(
						'post_type' => 'contactblock',
						'showposts' => -1,
						));
						$count=0;
						$countl=0;
						if ( have_posts() ) : while ( have_posts() ) : the_post(); 
						if($count==0)
						{
						echo '<div class="row-fluid serviceblock">';
						}	
					?>				
				
					<div class="span4">
									
						<div class="service-content contact-block">
							<span class="serviceicon">
						
							<?php the_post_thumbnail('service-icon'); ?>
						
						</span>					
							<div class="servicetitle"><h4><?php the_title();?></h4></div>
							
							<?php the_content();?>
						
						</div>
						
					</div>
			
					<?php 

					if($count==2)
					{
					echo '</div>';
					$count=0;
					$countl=1;
					}
					else
					{
					$count++;
					$countl=0;
					}		
					
					endwhile; 
					if($countl==0)
					{
					echo '</div>';
					}
					?>
					<?php else : ?>
					<?php endif; 
					wp_reset_query();
					?>
		
					
		
		</div>	

		<div class="googlemap">	
		<?php
		if (!empty($gmap))
		{
				if (strpos($gmap,'&amp;') !== false) {
					echo $gmap;
				}
				else
				{
					echo str_replace("&","&amp;",$gmap);
				}
		}
		?>
		</div>
		<?php
		
    echo $after_widget;
  }
  
}
add_action( 'widgets_init', create_function('', 'return register_widget("ContactWidget");') );



/* Portfolio Widget */
class PortfolioWidget extends WP_Widget
{
  function PortfolioWidget()
  {
    $widget_ops = array('classname' => 'PortfolioWidget', 'description' => 'Displays Portfolio.' );
    $this->__construct('PortfolioWidget', 'HomePage Portfolio', $widget_ops);
  }
  
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
    $title = $instance['title'];
	
    ?>
	<p>This widget will display portfolio. To add or edit "Portfolio", go to "Portfolio" and add or edit portfolio.</p>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

    <?php
	
	

	
  }
  
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
  
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
    
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

    if (!empty($title))
	{
	?>
		<div class="titleblock">
			
			<div class="container titleinner">		
			
				<?php
				  echo $before_title . $title . $after_title;
				?>
				
			</div>	
		
		</div>

	<?php		
	  
	}
	
	?>
	
		<div class="container">

	
	<?php query_posts(array(
	'post_type' => 'portfolio',
	'showposts' => -1,
	));
	$count=0;
	$countl=0;
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	if($count==0)
	{
	echo '<div class="row-fluid portfolio-items">';
	}
	

	?>
	
		<!-- portfolio block !-->
        <div class="span4 prjt-item" >  
			
            <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>  
					<?php the_post_thumbnail('portfolio-thumb'); ?>
	

					<div class="prjt-item-hover">						
						<div class="prjt-item-inner">
							<div class="prjt-title"><?php the_title();?></div>
							
							<div class="prjt-content"><?php the_content();?></div>
						</div>

					</div>  
					
            <?php endif; ?>  
			        
        </div> 
		
	<?php 
	
	if($count==2)
	{
	echo '</div>';
	$count=0;
	$countl=1;
	}
	else
	{
	$count++;
	$countl=0;
	}
	endwhile;
					if($countl==0)
					{
					echo '</div>';
					}	
	?>
	<?php else : ?>
	<?php endif; 
	wp_reset_query();?>			
		
		</div>	
	
	<?php
	
    echo $after_widget;
  }
  
}
add_action( 'widgets_init', create_function('', 'return register_widget("PortfolioWidget");') );



/* Pricing Widget */
class PricingWidget extends WP_Widget
{
  function PricingWidget()
  {
    $widget_ops = array('classname' => 'PricingWidget', 'description' => 'Displays Pricing Blocks.' );
    $this->__construct('PricingWidget', 'HomePage Pricing', $widget_ops);
  }
  
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
    $title = $instance['title'];
	
    ?>
	<p>This widget will display pricing blocks. To add or edit "Pricing", go to "Pricing" and add or edit pricing block.</p>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

    <?php
	
	

	
  }
  
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
  
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
    
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

    if (!empty($title))
	{
	?>
		<div class="titleblock">
			
			<div class="container titleinner">		
			
				<?php
				  echo $before_title . $title . $after_title;
				?>
				
			</div>	
		
		</div>

	<?php		
	  
	}
	
	?>
	
		<div class="container">

				
					<?php 
					
						global $post; 
					
						query_posts(array(
						'post_type' => 'pricing',
						'showposts' => -1,
						));
						$count=0;
						$countl=0;						
						if ( have_posts() ) : while ( have_posts() ) : the_post(); 
						if($count==0)
						{
						echo '<div class="row-fluid pricingblock">';
						}					
					
					?>				
				
					<div class="span4 pricinginner">
						
						<div class="pricetriangle"><span class="pricetriangleinner"><?php echo esc_html( get_post_meta( $post->ID, 'pricing_price', true ) );?></span></div>
						
						<div class="pricingouterimg">
							
							<div class="pricingimg">
							
								<?php the_post_thumbnail('pricing'); ?>
							
							</div>
						
						</div>
						
						<div class="pricingtitle"><?php the_title();?></div>
						
						<div class="pricingtitleunderline"></div>
						
						<div class="pricingcontent">
						
							<?php the_content();?>
						
						</div>
						
						<div class="pricinglink">
						
							<a href="<?php echo esc_html( get_post_meta( $post->ID, 'pricing_buynowlink', true ) );?>" class="buynow">BUY NOW</a>
						
						</div>
						
					</div>

					<?php 

	
					if($count==2)
					{
					echo '</div>';
					$count=0;
					$countl=1;
					}
					else
					{
					$count++;
					$countl=0;
					}					
					
					endwhile; 
					if($countl==0)
					{
					echo '</div>';
					}						
					?>
					<?php else : ?>
					<?php endif; 
					wp_reset_query();
					?>
						
		
		</div>	
	
	<?php
	
    echo $after_widget;
  }
  
}
add_action( 'widgets_init', create_function('', 'return register_widget("PricingWidget");') );


/* Team Widget */
class TeamWidget extends WP_Widget
{
  function TeamWidget()
  {
    $widget_ops = array('classname' => 'TeamWidget', 'description' => 'Displays Team Members.' );
    $this->__construct('TeamWidget', 'HomePage Team', $widget_ops);
  }
  
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
    $title = $instance['title'];
	
    ?>
	<p>This widget will display team member. To add or edit team members, go to "Team" and add or edit team member.</p>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

    <?php
	
	

	
  }
  
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
  
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
    
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

    if (!empty($title))
	{
	?>
		<div class="titleblock">
			
			<div class="container titleinner">		
			
				<?php
				  echo $before_title . $title . $after_title;
				?>
				
			</div>	
		
		</div>

	<?php		
	  
	}
	
	?>
	
		<div class="container">
				
					<?php 
					
						global $post; 
					
						query_posts(array(
						'post_type' => 'team',
						'showposts' => -1,
						));
						$count=0;
						$countl=0;							
						if ( have_posts() ) : while ( have_posts() ) : the_post(); 
						
						if($count==0)
						{
						echo '<div class="row-fluid teamblock">';
						}							
						
					?>				
				
					<div class="span3">
						
						<?php the_post_thumbnail(); ?>				
						
						<div class="teamtitle"><?php the_title();?></div>
	
						<div class="pricingtitleunderline"></div>	
						
						<div class="member_designation"><?php echo esc_html( get_post_meta( $post->ID, 'team_designation', true ) );?></div>
						
						<div class="team_social">
						<?php if (esc_html( get_post_meta( $post->ID, 'team_instagram', true ) )!="") {?>
						<a href="<?php echo esc_html( get_post_meta( $post->ID, 'team_instagram', true ) );?>"><i class="fa fa-instagram fa-lg"></i></a>
						<?php } ?>
						<?php if (esc_html( get_post_meta( $post->ID, 'team_fb', true ) )!="") {?>						
						<a href="<?php echo esc_html( get_post_meta( $post->ID, 'team_fb', true ) );?>"><i class="fa fa-facebook-square fa-lg"></i></a>
						<?php } ?>
						<?php if (esc_html( get_post_meta( $post->ID, 'team_email', true ) )!="") {?>	
						<a href="<?php echo esc_html( get_post_meta( $post->ID, 'team_email', true ) );?>"><i class="fa fa-envelope-o fa-lg"></i></a>
						<?php } ?>
						<?php if (esc_html( get_post_meta( $post->ID, 'team_tw', true ) )!="") {?>	
						<a href="<?php echo esc_html( get_post_meta( $post->ID, 'team_tw', true ) );?>"><i class="fa fa-twitter fa-lg"></i></a>
						<?php } ?>
						
						</div>
						
						<div class="teamcontent">
						
							<?php the_content();?>
						
						</div>
						
					</div>	

					<?php 
					
					if($count==3)
					{
					echo '</div>';
					$count=0;
					$countl=1;
					}
					else
					{
					$count++;
					$countl=0;
					}						
					
					endwhile;

					if($countl==0)
					{
					echo '</div>';
					}	
					
					?>
					<?php else : ?>
					<?php endif; 
					wp_reset_query();
					?>
						
		
		</div>	
	
	<?php
	
    echo $after_widget;
  }
  
}
add_action( 'widgets_init', create_function('', 'return register_widget("TeamWidget");') );


/* Testimonial Widget */
class TestimonialWidget extends WP_Widget
{
  function TestimonialWidget()
  {
    $widget_ops = array('classname' => 'TestimonialWidget', 'description' => 'Displays Testimonials' );
    $this->__construct('TestimonialWidget', 'HomePage Testimonial', $widget_ops);
  }
  
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
    $title = $instance['title'];
	
    ?>
	<p>This widget will display testimonials. To add or edit testimonials, go to "Testimonials".</p>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

    <?php
	
	

	
  }
  
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
  
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
    
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

    if (!empty($title))
	{
	?>
		<div class="titleblock">
			
			<div class="container titleinner">		
			
				<?php
				  echo $before_title . $title . $after_title;
				?>
				
			</div>	
		
		</div>
	<?php
	$testimonial1='';
	$testimonial2='';
					
	global $post; 
					
	query_posts(array(
		'post_type' => 'testimonial',
		'showposts' => -1,
	));
	
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	
	$testimonial1=$testimonial1.'<li><span class="test-img-holder">'.get_the_post_thumbnail().'</span></li>';	
	
	$testimonial2=$testimonial2.'<li><span class="testimonial_title">'.get_the_title().'</span><span class="testimonial_content">'.get_the_content().'</span><span class="testimonial_author">'.esc_html( get_post_meta( $post->ID, 'testimonial_author', true ) ).'</span><span class="testimonial_designation">'.esc_html( get_post_meta( $post->ID, 'testimonial_designation', true ) ).'</span></li>';
	
	endwhile; ?>
	<?php else : ?>
	<?php endif; 
	wp_reset_query();
	?>	

		<div class="testimonialblock"> <!-- testimonial block !-->
			<div class="container">
				
					<div class="testimg">
					
						<div class="flexslider" id="testimonaial-slider1">
							<ul class="slides">
							
								<?php echo $testimonial1;?>
																
							</ul>
							<span class="triangle-arrow"></span>
						</div>
					
					</div>
					<div class="testtext">

						<div class="flexslider" id="testimonaial-slider2">
							<ul class="slides">
								
								<?php echo $testimonial2;?>
							
							</ul>
						</div>				
					
					</div>
				
			</div>		
		</div> <!-- end testimonial block !-->			

	<?php		
	  
	}
	
    echo $after_widget;
  }
  
}
add_action( 'widgets_init', create_function('', 'return register_widget("TestimonialWidget");') );

?>