﻿<?php 
/* 
Plugin Name: Facebook iFrame Pro 
Plugin URI: http://www.media-infoproduit.com/
Description: Facebook iFrame Pro™ est un Plugin Wordpress facile à utiliser qui vous permet de générer des Fanpages IFRAME en 5 Minutes. Vous pouvez également jouter un Code d'auto-répondeur automatique. Inclut PDF & Instructions vidéo. 
Version: 1.2 
Author: Abdellah 
Author URI: http://www.media-infoproduit.com/
*/ 
/* Rebrandable Options */ 
$pluginslug = 'FacebookIframePro'; // This should be the plugin's main folder name. For example `wp-content/plugins/{$pluginslug}/`. 
$pluginname = 'Facebook iFrame Pro'; // This is the name of the plugin that is displayed publicly. This should be the same as above in the plugin's headers. 
$pluginurl = 'http://www.media-infoproduit.com/'; // This is the URL to the plugin's main website. This variable is needed for displaying it on the site since I can't get the header information, and is the same as the plugin's headers above. 
$helplink = 'Click Here To Download Your Unadvertised Bonuses'; // This is the text of the 'help' link. 
$helpurl = 'http://www.media-infoproduit.com/bonus/'; // This is the URL to the 'help' website. 
$affbanner = 'http://www.fbiframepro.com/images/global-success-club.gif'; // This is a URL to an image, displayed on the WP Dashboard under the `Fan Pages > Instructions` page. 
$affurl = 'http://www.media-infoproduit.com/'; // The banner specified above will link to this URL on the Instructions page. 
$showbanner = True; // If false, the banner will not appear on the Instructions page. 
$showfooter = True; // If false, the footer will not appear on any pages. 
/* End Rebrandable Options */ 
include 'efpd/functions.php'; // Include everything! 
?>