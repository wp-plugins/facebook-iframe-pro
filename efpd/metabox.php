<?php add_action('admin_menu','efbpd_create_meta_box');
add_action('save_post','efbpd_save_meta_data');

function efbpd_create_meta_box(){
	global $theme_name;
	add_meta_box('post-meta-boxes',__('Paramètres de Fan Page'),'post_meta_boxes_efbpd','fanpages','side','low');
}

function efbpd_post_meta_boxes(){
	$meta_boxes=array(
		'background'=>array('name'=>'_EFBPDBgColor','title'=>__('BG Color','efbpd'),'type'=>'colortext'),
		'appid'=>array('name'=>'_EFBPDAppID','title'=>__('Votre ID App','efbpd'),'type' =>'text')
	);
	return apply_filters('efbpd_post_meta_boxes',$meta_boxes);
}

function post_meta_boxes_efbpd(){
	global $post;
	$meta_boxes=efbpd_post_meta_boxes(); ?>
	<script type="text/javascript" src="<?php echo plugins_url('/jscolor/jscolor.js', __FILE__) ?>"></script>
	<table class="form-table">
	<?php foreach($meta_boxes as $meta):

		$value=get_post_meta($post->ID,$meta['name'],true);

		if($meta['type']=='colortext')
			get_meta_text_colorinput_efbpd($meta,$value);
		elseif($meta['type']=='text')
			get_meta_text_input_efbpd($meta,$value);
		elseif($meta['type']=='textarea')
			get_meta_textarea_efbpd($meta,$value);
		elseif($meta['type']=='select')
			get_meta_select_efbpd($meta,$value);

	endforeach; ?>
	</table>

 
 


<?php
}

function get_meta_text_colorinput_efbpd($args=array(),$value=false){
	extract($args); ?>
	<tr>
		<th style="width:30%;"><label for="<?php echo $name; ?>"><?php echo $title; ?></label></th>
		<td>
			<input class="color" type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo wp_specialchars($value,1); ?>" size="30" tabindex="30" style="width: 97%;" />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
		</td>
	</tr>
	<?php
}

function get_meta_text_input_efbpd($args=array(),$value=false){
	extract($args); ?>
	<tr>
		<th style="width:30%;"><label for="<?php echo $name; ?>"><?php echo $title; ?></label></th>
		<td>
			<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo wp_specialchars($value,1); ?>" size="30" tabindex="30" style="width: 97%;" />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
            <p>For Help, visit <a href="<?php global $helpurl; echo $helpurl; ?>" target="_blank"><?php global $helplink; echo $helplink; ?></a></p>
		</td>
	</tr>
	<?php
}

function get_meta_select_efbpd($args=array(),$value=false){
	extract($args); ?>
	<tr>
		<th style="width:30%;"><label for="<?php echo $name; ?>"><?php echo $title; ?></label></th>
		<td>
			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<?php foreach($options as $option ): ?>
				<option <?php if(htmlentities($value,ENT_QUOTES)==$option) echo 'selected="selected"'; ?>>
					<?php echo $option; ?>
				</option>
			<?php endforeach; ?>
			</select>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
		</td>
	</tr>
	<?php
}

function get_meta_textarea_efbpd($args=array(),$value=false){
	extract($args); ?>
	<tr>
		<th style="width:30%;"><label for="<?php echo $name; ?>"><?php echo $title; ?></label></th>
		<td>
			<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo wp_specialchars($value,1); ?></textarea>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__)); ?>" />
		</td>
	</tr>
	<?php
}

function efbpd_save_meta_data($post_id){
	global $post;
	$meta_boxes=array_merge(efbpd_post_meta_boxes());
	foreach ($meta_boxes as $meta_box) :
		if(!wp_verify_nonce($_POST[$meta_box['name'].'_noncename'],plugin_basename(__FILE__)))
		return $post_id;
		
		if('page'==$_POST['post_type'] && !current_user_can('edit_page',$post_id))
		return $post_id;
		
		elseif('post'==$_POST['post_type'] && !current_user_can('edit_post',$post_id))
		return $post_id;
		
		$data=stripslashes($_POST[$meta_box['name']]);
		
		if(get_post_meta($post_id,$meta_box['name'])=='')
		add_post_meta($post_id,$meta_box['name'],$data,true);
		
		elseif($data != get_post_meta($post_id,$meta_box['name'],true))
		update_post_meta($post_id,$meta_box['name'],$data);
		
		elseif($data=='')
		delete_post_meta($post_id,$meta_box['name'],get_post_meta($post_id,$meta_box['name'],true));
		
	endforeach;
} ?>