<?php 
/*
========================
	Admin Page
========================

*/
function sunset_add_admin_page(){
	//generate sunset admin page
add_menu_page( 'Sunset Theme Options', 'Sunset', 'manage_options', 'shrijan_sunset', 'sunset_theme_create_page',get_template_directory_uri().'/img/s.png',110);
    // add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
//generate sunset admin sub pages
add_submenu_page( 'shrijan_sunset','Sunset Sidebar Options', 'Sidebar', 'manage_options','shrijan_sunset', 'sunset_theme_create_page' );
add_submenu_page( 'shrijan_sunset','Sunset Theme Options', 'Theme Options', 'manage_options','shrijan_sunset_theme', 'sunset_theme_support_page' );
add_submenu_page( 'shrijan_sunset','Sunset Contact Form', 'Contact Form', 'manage_options','shrijan_sunset_theme_contact', 'sunset_theme_contact_page' );

add_submenu_page( 'shrijan_sunset','Sunset Css Options', 'Custom Css', 'manage_options','shrijan_sunset_css', 'sunset_theme_create_page_custom_css' );


//activate custom settings
add_action('admin_init','sunset_custom_settings');


}
add_action('admin_menu','sunset_add_admin_page');

function sunset_custom_settings(){
	//sidebar options
	register_setting('sunset-settings-group','profile_picture');
	register_setting('sunset-settings-group','first_name');
	register_setting('sunset-settings-group','last_name');
	register_setting('sunset-settings-group','user_description');
	register_setting('sunset-settings-group','twitter_handler','sunset_sanitize_twitter_handler');// the sanitize function 
	register_setting('sunset-settings-group','fb_handler');
	register_setting('sunset-settings-group','gplus_handler');


	add_settings_section('sunset-sidebar-options','Sidebar Options','sunset_sidebar_options','shrijan_sunset');

	add_settings_field('sidebar-profile-picture','Profile Picture','sunset_sidebar_profile','shrijan_sunset','sunset-sidebar-options');
	add_settings_field('sidebar-name','Full Name','sunset_sidebar_name','shrijan_sunset','sunset-sidebar-options');
	add_settings_field('sidebar-user-description','Description','sunset_sidebar_description','shrijan_sunset','sunset-sidebar-options');
	add_settings_field('sidebar-twitter','Twitter Handler','sunset_sidebar_twitter','shrijan_sunset','sunset-sidebar-options');
	add_settings_field('sidebar-fb','Facebook Handler','sunset_sidebar_fb','shrijan_sunset','sunset-sidebar-options');
	add_settings_field('sidebar-gplus','G+ Handler','sunset_sidebar_gplus','shrijan_sunset','sunset-sidebar-options');

	// Theme support options
	register_setting('sunset-theme-support','post_format');
	register_setting('sunset-theme-support','custom_header');
	register_setting('sunset-theme-support','custom_background');

	add_settings_section('sunset-theme-options','Theme Options','sunset_theme_options','shrijan_sunset_theme');
	add_settings_field('post-formats','Post Formats','sunset_post_formats','shrijan_sunset_theme','sunset-theme-options');
	add_settings_field('custom-header','Custom Header','sunset_custom_header','shrijan_sunset_theme','sunset-theme-options');
	add_settings_field('custom-background','Custom Background','sunset_custom_background','shrijan_sunset_theme','sunset-theme-options');

	//Contact form options
	register_setting('sunset-contact-options','activate_contact');
	add_settings_section('sunset-contact-section','Coantact Form','sunset_contact_section','shrijan_sunset_theme_contact');
	add_settings_field('activate-form','Activate Contact Form','sunset_activate_contact','shrijan_sunset_theme_contact','sunset-contact-section');


}

//post format callback options
// function sunset_post_format_callback($input){
// 	return $input;
// }


function sunset_theme_create_page(){
	//generation of our admin page -general
	require_once(get_template_directory().'/inc/templates/sunset_admin_general.php');
	
}

function sunset_theme_create_page_custom_css(){
	# generation of general page for admin panel
	require_once(get_template_directory().'/inc/templates/sunset_admin_custom_css.php');
} 
//function for theme options
function sunset_theme_support_page(){
		require_once(get_template_directory().'/inc/templates/sunset_theme_support.php');
}
//contact page
function sunset_theme_contact_page(){
		require_once(get_template_directory().'/inc/templates/sunset_theme_contact.php');
}

function sunset_theme_options(){
	echo 'Activate and Deactivate Specific Support';
}
function sunset_contact_section(){
	echo 'Activate and Deactivate Built-in contact form';
}

function sunset_post_formats(){
	$options=get_option('post_format');
	$formats=array('aside','gallery','link','image','quote','status','video','audio','chat');
	$output=' ';
	foreach ($formats as $format) {
		$checked=(@$options[$format]=='1'? 'checked':' ');
		$output .='<label><input type="checkbox" id="'.$format.'" name="post_format['.$format.']" value="1" '.$checked.' />'.$format.'</label><br>';
	}
	echo $output;
}
function sunset_custom_header(){
	$header=get_option('custom_header');
	$checked=(@$header=='1'? 'checked':' ');
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' />Activate The Custom Header</label>';
}
function sunset_custom_background(){
	$background=get_option('custom_background');
	$checked=(@$background=='1'? 'checked':' ');
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' />Activate The Custom Background</label>';
}
//for contact form
function sunset_activate_contact(){
	$header=get_option('activate_contact');
	$checked=(@$header=='1'? 'checked':' ');
	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
}



//sunset sidebar options
function sunset_sidebar_options(){
	echo "Customize Your Sidebar Information";
}

function sunset_sidebar_profile(){
	$picture=esc_attr(get_option('profile_picture'));
	if (empty($picture)) {
		echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" name="profile_picture" id="profile_picture" value="">';
	}else{
		echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" name="profile_picture" id="profile_picture" value="'.$picture.'"><input type="button" id="remove-picture" class="button button-secondary" value="Remove"/>';
	}
}
	

function sunset_sidebar_name(){
	$firstName=esc_attr(get_option('first_name'));
	$lastName=esc_attr(get_option('last_name'));
	#esc_attr is used for Filters a string cleaned and escaped for output in an HTML attribute


	echo '<input type="text" name="first_name" value="'.$firstName.'"> <input type="text" name="last_name" value="'.$lastName.'" placeholder="last name" >';
}
function sunset_sidebar_description(){
	$description=esc_attr(get_option('user_description'));
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="user descripion" size="50">';
}
function sunset_sidebar_twitter(){
	$twitter=esc_attr(get_option('twitter_handler'));
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="twitter"><p class="description">Please write your twitter account without @ sign</p>';
}
function sunset_sidebar_fb(){
	$fb=esc_attr(get_option('fb_handler'));
	echo '<input type="text" name="fb_handler" value="'.$fb.'" placeholder="Facebook Handler">';
}
function sunset_sidebar_gplus(){
	$gplus=esc_attr(get_option('gplus_handler'));
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="G+ Handler">';
}


//sanitize settings or validataion 
function sunset_sanitize_twitter_handler($input){
	$output=sanitize_text_field($input);
	$output=str_replace('@','',$output);
	return $output; //never use echo instead of return echo create a html 
}