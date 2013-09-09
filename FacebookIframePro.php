<?php 
/* 
Plugin Name: Facebook iFrame Pro™ WP-Plugin 
Plugin URI: http://www.media-infoproduit.com/facebookiframepro/ 
Description: Facebook iFrame Pro™ est un Plugin Wordpress facile à utiliser qui vous permet de générer des Fanpages IFRAME en moins de 5 Minutes.
Author: Media-Infoproduit
Author URI: http://www.media-infoproduit.com
  
Version: 1.2 
 
*/ 
/* Options rebrandable */ 
$pluginslug = 'facebook-iframe-pro'; // Cela devrait être le nom du dossier principal de plugin. Par exemple `wp-content/plugins/{$pluginslug}/`. 
$pluginname = 'Facebook iFrame Pro'; // C'est le nom du plugin qui est affiché publiquement. Cela devrait être le même que ci-dessus dans les en-têtes du plugin. 
$pluginurl = 'http://www.media-infoproduit.com/facebookiframepro/'; // Il s'agit de l'URL vers le site Web principal du plugin. Cette variable est nécessaire pour l'affichage sur le site puisque je ne peux pas obtenir les informations du plugin ci-dessus. 
$helplink = 'Cliquez ici'; // Ceci est le texte du lien « aide ». 
$helpurl = 'http://www.media-infoproduit.com/facebookiframepro/bonus/'; // Il s'agit de l'URL vers le site de « aide ». 
$affbanner = 'http://www.media-infoproduit.com/facebookiframepro/images/global-success-club.gif'; // Il s'agit d'une URL vers une image, affichée sur le tableau de bord WP sous `Fan Pages > Instructions` de Facebook iFrame Pro. 
$affurl = 'http://www.media-infoproduit.com/facebookiframepro/'; // La bannière spécifiée vers cette URL sur la page d'Instructions. 
$showbanner = True; // Si false, la bannière n'apparaîtra pas sur la page d'Instructions. 
$showfooter = True; // Si false, le pied de page n'apparaîtra pas sur toutes les pages. 
/* Fin des options de rebrandable  */ 
include 'efpd/functions.php'; // Inclure tout! 
?>