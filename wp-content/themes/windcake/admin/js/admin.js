jQuery(document).ready(function($) {
	
var img_holder;
jQuery('.upload_image_button').click(function() {
img_holder=jQuery(this).prev();
 formfield = jQuery(img_holder).attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery(img_holder).val(imgurl);
 tb_remove();
}
 
 return false;
});
	

});	