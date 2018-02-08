<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?></title>
	
	<meta name="description" content="<?php echo of_get_option('sitedescription') ?>">
	<meta name="keywords" content="<?php echo of_get_option('sitekeywords') ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php if(of_get_option('favicon')){ ?>
	<link rel="icon" href="<?php echo of_get_option('favicon') ?>">
	<?php } ?>
	<?php if(of_get_option('iphoneicon')){ ?>
	<link rel="apple-touch-icon" href="<?php echo of_get_option('iphoneicon') ?>" />
	<?php } ?>	
	<?php if(of_get_option('iphoneretinaicon')){ ?>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo of_get_option('iphoneretinaicon') ?>" >
	<?php } ?>
	<?php if(of_get_option('ipadicon')){ ?>	
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo of_get_option('ipadicon') ?>" >
	<?php } ?>
	<?php if(of_get_option('ipadretinaicon')){ ?>	
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo of_get_option('ipadretinaicon') ?>" >	
	<?php } ?>
    
      <script type="text/javascript">		
      var ajaxurl1='<?php echo home_url();?>/wp-admin/admin-ajax.php'; 
      </script>
      
     
	  
      <?php if(of_get_option('customcss') != '') { ?> 

      <?php load_template( get_template_directory() . '/customcss.php' );?>

      <?php } ?>
	  
	   <?php wp_head(); ?>
	  
</head>
	  
<body <?php body_class(); ?> >


	<a href="#" id="gototop"><i class="fa fa-long-arrow-up fa-2x"></i></a>
	
	<div class="header">
		<div class="container header-inner">

				<nav class="navbar navbar-inverse">  

					<div class="header-logo">
						<?php 
							if(of_get_option('logoimg1'))
							{
								$logoimg=of_get_option('logoimg1');
							}
							if(of_get_option('retinalogo'))
							{
								$logoimg=of_get_option('retinalogo');
							}					
						?>
						<a href="<?php echo site_url(); ?>" class="logo">
							<img src="<?php echo $logoimg; ?>" alt="">
						</a>					
					</div>	
				
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
	

	
<?php
if(!is_page_template('template-home.php')){

    ob_start();
    $widgets = dynamic_sidebar( 'HomePage' );
    if($widgets){
         $html = ob_get_contents();
    }

    ob_end_clean();

	$DOM = new DOMDocument;
	$html = mb_convert_encoding($html, 'HTML-ENTITIES', "UTF-8");
	@$DOM->loadHTML($html);
	
	$items = $DOM->getElementsByTagName('h1');

	for ($i = 0; $i < $items->length; $i++)
		$navname[$i]= $items->item($i)->nodeValue;

	$dom = new DomDocument();
	@$dom->loadHTML($html);
	$finder = new DomXPath($dom);
	$findlink = new DomXPath($dom);
	$classname="block";
	$nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
	$linkname="menulink";
	$nodeslink = $findlink->query("//div[contains(@class, '$linkname')]");

	$j=0;
	$extcounter=0;

	foreach ($nodes as $node) {

		if (strpos($node->getAttribute('id'),'slider') !== false) {
		}
		else{
		if (strpos($node->getAttribute('id'),'externallink') !== false) {
			$navid[$j]= $nodeslink->item($extcounter)->nodeValue;
			$extcounter++;			
		}
		else
		{
			$navid[$j]= home_url()."#".$node->getAttribute('id');

		}

			$j++;
		}	
		
	}

?>

<?php 

if ( 'page' != get_option('show_on_front') ) {
?>
	<div class="nav-collapse navleft"> 
		<?php
			wp_nav_menu( array(
			'menu'              => 'left',
			'theme_location'    => 'left',
			'menu_class' => 'navigation',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker' => new wp_bootstrap_navwalker()						
			));
		?>
	</div>
	
	<div class="nav-collapse navright"> 
		<?php
			wp_nav_menu( array(
			'menu'              => 'right',
			'theme_location'    => 'right',
			'menu_class' => 'navigation',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker' => new wp_bootstrap_navwalker()						
			));
		?>
	</div>	
<?php
}
else
{

?>	
	
<div class="nav-collapse navleft"> 

	<ul class="navigation">
		
		<?php
		
		if(isset($navname))
		{
			for ($i = 0; $i < count($navname)/2; $i++)
			{
			
			if(isset($navid[$i]))
			{
			
				if($navid[$i]!="")
				{	
				
				?>
				<li><a href="<?php echo $navid[$i];?>" class="<?php echo substr($navid[$i],strripos($navid[$i],"#")+1);?>"><?php echo $navname[$i];?></a></li>
				<?php
				
				}
			}	
			
			}
		}
		?>

	</ul>							

</div>


<div class="nav-collapse navright"> 
							
	<ul class="navigation">
		
		<?php
		
		if(isset($navname))
		{
			for ($i = round(count($navname)/2); $i <= count($navname); $i++)
			{
			
			if(isset($navid[$i]))
			{
				if($navid[$i]!="")
				{		
				
				?>
				<li><a href="<?php echo $navid[$i];?>" class="<?php echo substr($navid[$i],strripos($navid[$i],"#")+1);?>"><?php echo $navname[$i];?></a></li>
				<?php
				
				}
			}
			
			}
		}	
		?>

	</ul>
							
</div>    				

<?php
}
?>

</nav> 																
					
		
		</div>
		
		
	</div>

<?php
}

?>	
