		
		<!-- footer block !-->
		<div class="footer">
			
			<div class="container">
                <div class="row-fuid social_box">
					<?php
					if( of_get_option('facebook') !="") { ?>      
					<a href="<?php echo of_get_option('facebook'); ?>" class="social" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
					<?php 
					}
                    if( of_get_option('pinterest') !="") { ?>
					<a href="<?php echo of_get_option('pinterest'); ?>" class="social" target="_blank"><i class="fa fa-pinterest fa-lg"></i></a>
					<?php
					}
                    if( of_get_option('twitter') !="") { ?>
                        <a href="<?php echo of_get_option('twitter'); ?>" class="social" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                        <?php
                    }
                    if( of_get_option('instagram') !="") { ?>
					<a href="<?php echo of_get_option('instagram'); ?>" class="social" target="_blank"><i class="fa fa-instagram fa-lg"></i></a>
					<?php 
					}
					?>
                </div>
                <div class="row-fluid footerblock">
                    <?php echo of_get_option('copyright'); ?>
                </div>
            </div>
        </div>
		
		<!-- end footer block !-->
										
	  <?php echo of_get_option('customjs'); ?>      
	  <?php echo of_get_option('googleanalytics'); ?>
	  <?php wp_footer(); ?>
</body>
</html>