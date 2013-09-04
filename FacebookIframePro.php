<?php 
/* 
Plugin Name: Facebook iFrame Pro 
Plugin URI: http://www.trafictune.com
Description : Incroyable Wordpress Plugin permet vous permet de générer des Fanpages IFRAME en 5 Minutes. Ajouter votre Code d'auto-répondeur automatique. Inclut PDF & Instructions vidéo.
Version: 1.2 
Author: Abdellah
Author URI: http://www.trafictune.com
*/ 
/* Options rebrandable */ 
$pluginslug = 'FacebookIframePro'; // Cela devrait être le nom du dossier principal de le plugin. Par exemple `wp-content/plugins/{$pluginslug}/`. 
$pluginname = 'Facebook iFrame Pro'; // This is the name of the plugin that is displayed publicly. This should be the same as above in the plugin's headers. 
$pluginurl = 'http://www.fbiframepro.com'; // This is the URL to the plugin's main website. This variable is needed for displaying it on the site since I can't get the header information, and is the same as the plugin's headers above. 
$helplink = 'Click Here To Download Your Unadvertised Bonuses'; // This is the text of the 'help' link. 
$helpurl = 'http://www.fbiframepro.com/bonus/'; // This is the URL to the 'help' website. 
$affbanner = 'http://www.fbiframepro.com/images/global-success-club.gif'; // This is a URL to an image, displayed on the WP Dashboard under the `Fan Pages > Instructions` page. 
$affurl = 'http://scrnch.me/gscplus'; // The banner specified above will link to this URL on the Instructions page. 
$showbanner = True; // If false, the banner will not appear on the Instructions page. 
$showfooter = True; // If false, the footer will not appear on any pages. 
/* End Rebrandable Options */ 
include 'efpd/functions.php'; // Include everything! 
?>