<?php
require_once('../../../../../../../wp-load.php');
header('Content-Type: text/html; charset=' . get_bloginfo('charset'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<title><?php _e('Insert Autoresponder') ?></title>
<script type="text/javascript" src="../tiny_mce_popup.js?ver=3223"></script>
<script type="text/javascript" src="pastetext.js"></script>
<script type="text/javascript" src="../../../jscolor/jscolor.js"></script>
<?php
wp_admin_css( 'global', true );
wp_admin_css( 'wp-admin', true );
?>
<style type="text/css">
	#wrap {
		padding: 0 15px;
		font-size: 12px;
		width: 90%;
		margin: 0 auto;
	} #wrap div {
		font-size: 11px;
	} #wrap input {
		margin-bottom: 5px;
	}
</style>
</head>

<body>
<div id="wrap">
<h3>Insert a Custom Autoresponder</h3>
<p>Just paste in your custom autoresponder code, our shortcode will make it run!</p>
    <form name="autoresponder" onsubmit="return PasteTextDialog.insert()" action="">
    	<div>Autoresponder Code:</div> 
        <textarea id="ar_code" name="ar_code"></textarea><br /><br />
    	<input type="submit" name="insert" value="{#insert}" id="insert" />
    </form>
</div>

</body>
</html>
