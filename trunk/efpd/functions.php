<?php // Inclure les goodies!

	include 'tinymce.php';

	include 'shortcodes.php';

	include 'metabox.php';

	

	$themesdir = 'themes'; // Cela devrait être le nom du dossier  de stockant des thèmes.

	$defaulttheme = 'default.php'; // Il s'agit d'un fichier PHP du thème par défaut.

	

	// Modifier les conception de Pages de fans basée sur les options définies dans les Options Rebrandable et options ci-dessus.

	add_action('template_redirect','efbpd_template_redirect');

	function efbpd_template_redirect(){

	 global $wp,$pluginslug,$themesdir,$defaulttheme;

	 $custom_post_types=array('fanpages');

	 if(in_array($wp->query_vars['post_type'],$custom_post_types)){

	    if(get_post_type()=='fanpages'):

	    include(PLUGINDIR.'/'.$pluginslug.'/efpd/'.$themesdir.'/'.$defaulttheme.'');die();

	    endif;

		}

	}



// Créez la fonction qui permettra de créer le type de message personnalisé 'fanpages'. Le nom du type de poste doit être en minuscules.

function efbpd_create_post_type(){

	register_post_type('fanpages', // 'fanpages' (default) est le nom du type post.

		array('labels'=>array('name'=>__('Fan Pages'),'singular_name'=>__('Fan Page')),

		'public'=>true,

		'menu_position'=>5,

		'rewrite'=>array('slug'=>'fanpage','with_front'=>FALSE),

		'supports'=>array('title','editor','custom-fields','revisions','author')

		)

	);

	flush_rewrite_rules(false); // Résoudre problème de permaliens pour `%postname%` ou autres.

}



/* Créer le code HTML d'une page d'administration pour la clé de licence */

function efpd_settings_page(){ global $pluginname,$affbanner,$affurl,$showbanner,$helplink,$helpurl,$pluginurl;$app_id_main=get_option('app_id_main'); ?>

<div id="admin" class="wrap">
 
    <h2><?php echo $pluginname; ?></h2>

    <p><?php if($showbanner==true){echo '<a href="'.$affurl.'" target="_blank"><img src="'.$affbanner.'"></a>';} ?></p>

    <p>Merci d'utiliser <strong><?php echo '<a href="'.$pluginurl.'">'.$pluginname.'</a>'; ?></strong>.</p>

    <h3>Instructions</h3>

    <p>Nous vous avons fourni un service avec des fonctionnalités intéressantes à utiliser pour vos Pages avec les <strong>Boutons TinyMCE</strong>, pour des insertions de <strong title="Shortcodes qui sont habituellement sous forme de [shortcode-name optionname=''value''] et ils sont utilisés pour divers scripts sur la page de sortie.">shortcodes</strong> dans vos fanpages.</p>

    <p>Quand vous allez ajouter une nouvelle Page en accédant à <em>Fan Pages > Ajouter</em> (cela s'applique également tandis que vous modifiez une Page de votre blog), Il y a peu de boutons ajouté à l'éditeur de messages, <br />

   un pour votre <em>Autorépondeur personnalisé</em>, et le <em>Révéler des onglets</em>.</p>

    <p><strong>Autorépondeur:</strong><br />

   Cliquez sur le bouton de la liste préenregistrée dans le Code TinyMCE. Entrez votre code d’auto-répondeur personnalisé et cliquez sur Insérer.</p>

    <p><strong>Révéler des onglets:</strong><br />

    Vous pouvez utiliser autant d'instances de ces shortcodes dans vos pages fan que vous le souhaitez. Il y a un bouton pour chacun, les utilisateurs qui aime, et les utilisateurs qui n'aime pas.<br />

    Placer le contenu à afficher pour chacun à l'intérieur de ces numéros courts et c'est tout!<br />

    <small>N'oubliez pas d'inscrire votre ID App Facebook à droite de l'éditeur pour que cela fonctionne correctement.</small></p>

    <p>N'hésitez pas à visiter notre site pour obtenir de l'aide <?php echo '<a href="'.$helpurl.'" target="_blank">'.$helplink.'</a>'; ?></p>

</div>
<br>
<H2>Publicité<H2>

<script type="text/javascript"><!--
document.write('<s'+'cript type="text/javascript" src="http://www.trafictune.com/show.php?z=24&j=1&code='+new Date().getTime()+'"></s'+'cript>'); 
// --></script>





<?php }



/* Fonction pour ajouter la page d'administration sur WordPress */

function efpd_create_menu() {

	global $pluginname;

	add_submenu_page('edit.php?post_type=fanpages',''.$pluginname.' Instructions','Instructions','manage_options','plugin-instructions','efpd_settings_page');

	add_action('admin_init','register_efpdsettings');

}

/* Fonction d'enregistrer des options disponibles des pages et la clé de licence */

function register_efpdsettings() {

	register_setting('efpd-settings-group','app_id_main');

}

/* Fonction pour imprimer une feuille de style sur la page d'administration */

function efpd_admin_style() {

	global $pluginslug;

    wp_register_style($handle='efpd-admin-styles',$src=plugins_url($pluginslug.'/admin.css'),$deps=array(),$ver='1.0.0',$media='all');

    wp_enqueue_style('efpd-admin-styles');

}



// Maintenant faire exécuter les fonctions !

add_action('init','efbpd_create_post_type');

add_action('admin_print_styles','efpd_admin_style');

add_action('admin_menu','efpd_create_menu');



?>