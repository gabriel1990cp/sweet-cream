<?php
function button( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'size'		=>	'',
		'text'      => ''
        ), $atts));

    $output .= "<a href=\"#\" class=\"buttonlink buttonlink-$size\">$text</a>";

    $output .= do_shortcode($content);

    return $output;
}
add_shortcode('button', 'button');

function alert( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'type'      => 'alert-block',
		'text'      => ''
        ), $atts));

    if($type != 'alert-block') $type = "alert-$type";

    $output = "<div class=\"alert $type\">$text";

    $output .= "<a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a>";

    $output .= do_shortcode($content) . "</div>";

    return $output;
}
add_shortcode('alert', 'alert');

function heading( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'type'      => '',
		'text'      => ''
        ), $atts));

    $output = "<$type>$text";

    $output .= do_shortcode($content) . "</$type>";

    return $output;
}
add_shortcode('heading', 'heading');

function col( $atts, $content) {
    extract(shortcode_atts(array(
        'number'      => '',	
        ), $atts));

        ob_start(); ?>
		
<?php if ( !empty($number) ) {?>

	<div class="span<?php echo 12/($number);?>">
		<?php echo do_shortcode($content);?>
	</div>
<?php } ?>
<?php return ob_get_clean();

}
add_shortcode('col', 'col');

function cols( $atts, $content) {

    ob_start(); ?>
		
<div class="row-fluid">
	<?php echo do_shortcode($content);?>
</div>

<?php return ob_get_clean();

}
add_shortcode('cols', 'cols');

function divider( $atts, $content) {
    extract(shortcode_atts(array(
        'size'      => '',	
        ), $atts));

        ob_start(); ?>
		
<?php if ( !empty($size) ) {?>
	<?php if($size=="regular") {?>
		<div class="divider"></div>
	<?php }?>	
	<?php if($size=="double"){?>
		<div class="dividerd"></div>
	<?php }?>	
<?php } ?>
<?php return ob_get_clean();

}
add_shortcode('divider', 'divider');

function title( $atts, $content) {
    extract(shortcode_atts(array(
        'title'      => '',	
        ), $atts));

        ob_start(); ?>
		
<?php if ( !empty($title) ) {?>
	<div class="titleinner">		
		<span class="titlestart">{</span>	
		<div class="maintitle maintitle1 flyIn animated"><?php echo $title;?></div>
		<span class="titlestart">}</span>		
	</div>		
<?php } ?>
<?php return ob_get_clean();

}
add_shortcode('title', 'title');



?>