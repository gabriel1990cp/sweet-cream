<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>

<?php

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
	$nodes = $nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
	$linkname="menulink";
	$nodeslink = $findlink->query("//div[contains(@class, '$linkname')]");

	$j=0;
	$extcounter=0;

	foreach ($nodes as $node) {

		if (strpos($node->getAttribute('id'),'slider') !== false) 
		{
		}
		else
		{
			if (strpos($node->getAttribute('id'),'externallink') !== false) 
			{
				$navid[$j]= $nodeslink->item($extcounter)->nodeValue;
				$extcounter++;							
			}
			else
			{
				$navid[$j]= "#".$node->getAttribute('id');

			}

			$j++;
		}	
	}

?>	

<?php 

if ( 'page' != get_option('show_on_front') ) {
?>   

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
				
					if (strpos($navid[$i],'http:') !== false) {
					?>
					<li><a href="<?php echo $navid[$i];?>"><?php echo $navname[$i];?></a></li>
					<?php
					}
					else
					{
					?>
					<li><a href="<?php echo $navid[$i];?>" class="onepagelink <?php echo substr($navid[$i],1);?>" data-scroll><?php echo $navname[$i];?></a></li>
					<?php
					}
					
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
				
					if (strpos($navid[$i],'http:') !== false) {
					?>
					<li><a href="<?php echo $navid[$i];?>"><?php echo $navname[$i];?></a></li>
					<?php
					}
					else
					{
					?>
					<li><a href="<?php echo $navid[$i];?>" class="onepagelink <?php echo substr($navid[$i],1);?>" data-scroll><?php echo $navname[$i];?></a></li>
					<?php
					}
				
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
		
		<!--<div class="header_design"></div>!-->

		
	</div>


<?php

if(isset($html))
{
    echo $html;
}
?>					

<?php get_footer(); ?>