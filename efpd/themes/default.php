<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php the_title(); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('/files.default/style.css',__FILE__); ?>" />
<link rel="icon" type="image/png" href="http://divinethemes.com/dt-favicon.gif" />
<script type="text/javascript">window.fbAsyncInit=function(){fb.canvas.setautoresize();}
function sizeChangeCallback(){FB.Canvas.setSize();}</script>
<?php wp_head(); ?>
</head>
<?php $bgColor=get_post_meta(get_the_ID(),'_EFBPDBgColor',true); ?>
<body onload="FB.Canvas.setSize({width: 520, height: 2000})" <?php if($bgColor!='') echo 'style="background:#'.$bgColor.' !important;"'; ?>>
    <?php if(have_posts()):while(have_posts()):the_post(); ?>            
	    <?php the_content(); ?>
    <?php endwhile;endif; ?>
	<?php global $showfooter;if($showfooter==true){global $pluginname,$pluginurl; echo '<div style="font-size:10px;font-family:Helvetica,Arial,sans-serif;text-align:center;">Powered by <a href="'.$pluginurl.'" target="_blank">'.$pluginname.'</a></div>';} ?>
<?php $appidglobal = get_option('app_id_main'); $appid=get_post_meta(get_the_ID(),'_EFBPDAppID',true); ?>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/fr_FR/all.js"></script>
<script>FB.init({appId:'<?php if($appidglobal!=''): echo $appidglobal; else : echo $appid; endif; ?>',status:true,cookie:true,xfbml : true});FB.Event.subscribe('edge.create',function(response){window.location.reload();});</script>
<?php wp_footer(); ?>
</body>
</html>