<?php add_action('init','tabs_mce');
function tabs_mce(){
   if(!current_user_can('edit_posts') && !current_user_can('edit_pages')){
     return;
   }
 
   if(get_user_option('rich_editing')=='true'){
       add_filter('mce_external_plugins','add_plugin_tabs');
       add_filter('mce_buttons','tabs_mce_shortcode');
   }
}
function tabs_mce_shortcode($buttons){
 array_push($buttons,'|','autorespondermce');
 array_push($buttons,'|','likedmce');
 array_push($buttons,'','notlikedmce');
 return $buttons;
}
 
function add_plugin_tabs($plugin_array){
   $plugin_array['autorespondermce']=plugins_url('/script/autorespondermce.js',__FILE__);
   $plugin_array['likedmce']=plugins_url('/script/likedmce.js',__FILE__);
   $plugin_array['notlikedmce']=plugins_url('/script/notlikedmce.js',__FILE__);
   return $plugin_array;
} ?>