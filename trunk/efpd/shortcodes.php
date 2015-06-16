<?php function parsePageSignedRequest(){
	$signed_request=$_REQUEST['signed_request'];
    if(isset($_REQUEST['signed_request'])){
        $encoded_sig=null;
        $payload=null;
        list($encoded_sig, $payload) = explode('.',$_REQUEST['signed_request'],2);
        $sig=base64_decode(strtr($encoded_sig,'-_','+/'));
        $data=json_decode(base64_decode(strtr($payload,'-_','+/'), true));
        return $data;
    }
return false;
}

function notliked_efbpd($atts,$content = null ){
	global $wp,$signed_request;
	if($signed_request=parsePageSignedRequest()) :
		if($signed_request->page->liked) :
			return '';
		else :
			return do_shortcode($content);
		endif;
	else :
		return do_shortcode($content);
	endif;
}
add_shortcode('efpd-notliked','notliked_efbpd');

function liked_efbpd($atts,$content=null){
	global $wp,$signed_request;
	if($signed_request=parsePageSignedRequest()) :
		if($signed_request->page->liked) :
			return do_shortcode($content);
		else :
			return '';
		endif;
	else :
			return do_shortcode($content);
	endif;
}
add_shortcode('efpd-liked','liked_efbpd');

function autoresponder_efbpd($atts,$content=null){
	return htmlspecialchars_decode(do_shortcode($content));
}
add_shortcode('efpd-autoresponder','autoresponder_efbpd');
remove_filter('the_content', 'wptexturize'); ?>