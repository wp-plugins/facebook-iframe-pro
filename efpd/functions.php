<?php // Include the goodies!
	include 'tinymce.php';
	include 'shortcodes.php';
	include 'metabox.php';
	
	$themesdir = 'themes'; // This should be the folder name of where the themes are stored.
	$defaulttheme = 'default.php'; // This is the default theme's PHP file.
	
	// Make the Fan Pages change design based on options set in the Rebrandable Options and above options.
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

// Create the function that will create the custom post type `fanpages`. The name of the post type must be in lowercase.
function efbpd_create_post_type(){
	register_post_type('fanpages', // 'fanpages' (default) is the name of the post type.
		array('labels'=>array('name'=>__('Fan Pages'),'singular_name'=>__('Fan Page')),
		'public'=>true,
		'menu_position'=>5,
		'rewrite'=>array('slug'=>'fanpage','with_front'=>FALSE),
		'supports'=>array('title','editor','custom-fields','revisions','author')
		)
	);
	flush_rewrite_rules(false); // Fix permalinks issue for `%postname%` or other.
}

/* Create the HTML for an administration page for the License Key */
function efpd_settings_page(){ global $pluginname,$affbanner,$affurl,$showbanner,$helplink,$helpurl,$pluginurl;$app_id_main=get_option('app_id_main'); ?>
<div id="admin" class="wrap">
    <h2><?php echo $pluginname; ?></h2>
    <p><?php if($showbanner==true){echo '<a href="'.$affurl.'" target="_blank"><img src="'.$affbanner.'"></a>';} ?></p>
    <p>Thank you for using <strong><?php echo '<a href="'.$pluginurl.'">'.$pluginname.'</a>'; ?></strong>.</p>
    <h3>Instructions</h3>
    <p>We have provided you with some great features to use for your fan pages in <strong>TinyMCE buttons</strong> that insert <strong title="Shortcodes are usually in the form of [shortcode-name optionname=''value''] and are used to output various scripts on the page.">shortcodes</strong> into your fanpages.</p>
    <p>When you go to add a new fan page by navigating to <em>Fan Pages > Add New</em> (also applies to while you are editing fan pages), there are little buttons<br />
    added to the post editor which are for a <em>Custom Autoresponder</em>, and <em>Reveal Tabs</em>.</p>
    <p><strong>Autoresponder:</strong><br />
    Click the Autoresponder Code TinyMCE button. Enter your custom autoresponder code and click Insert.</p>
    <p><strong>Reveal Tabs:</strong><br />
    You can use as many instances of these shortcodes in your fan pages as you want. There is one button for each, Liked users and Not Liked users.<br />
    Put the content you want to display for each inside these shortcodes and that's all!<br />
    <small>Be sure to include your App ID to the right of the editor for this to work properly.</small></p>
    <p><?php echo '<a href="'.$helpurl.'" target="_blank">'.$helplink.'</a>'; ?></p>
</div>
<?php }

/* Function to add the administration page to WordPress */
function efpd_create_menu() {
	global $pluginname;
	add_submenu_page('edit.php?post_type=fanpages',''.$pluginname.' Instructions','Instructions','manage_options','plugin-instructions','efpd_settings_page');
	add_action('admin_init','register_efpdsettings');
}
/* Function to register the License Key pages' available options */
function register_efpdsettings() {
	register_setting('efpd-settings-group','app_id_main');
}
/* Function to print a stylesheet on the administration page */
function efpd_admin_style() {
	global $pluginslug;
    wp_register_style($handle='efpd-admin-styles',$src=plugins_url($pluginslug.'/admin.css'),$deps=array(),$ver='1.0.0',$media='all');
    wp_enqueue_style('efpd-admin-styles');
}

// Now make the functions run!
add_action('init','efbpd_create_post_type');
add_action('admin_print_styles','efpd_admin_style');
add_action('admin_menu','efpd_create_menu');

?>