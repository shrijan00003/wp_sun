<?php 
/*
========================
	Admin Page
========================

*/
function np_news_add_admin_page(){
	//generate News Setting admin page
add_menu_page( 'Nepali News Theme Options', 'News Setting', 'manage_options', 'np_news_admin_page', 'np_news_theme_create_admin',get_template_directory_uri().'/img/s.png',110);
// add_menu_page('Page title', 'menu title', manage_options, unique_slug, callable function, icon url, position)

//==========*******generate news setting admin sub pages*****================
// add_submenu_page( parent_slug, page title, menu title, capability, menu_slug, callable function )

//=================duplicate of admin page for general==========
add_submenu_page( 'np_news_admin_page','Nepali News Options', 'General', 'manage_options','np_news_admin_page', 'np_news_theme_create_admin' );


//====================sidebar page===============
add_submenu_page( 'np_news_admin_page','Nepali News Sidebar Options', 'Sidebar', 'manage_options','np_news_sidebar_page', 'np_news_create_sidebar_page' );

//=====================theme support page=================
add_submenu_page( 'np_news_admin_page','Nepali News Theme Options', 'Theme Options', 'manage_options','np_news_theme_option_page', 'np_news_create_support_page' );

//=======================contact page======================
add_submenu_page( 'np_news_admin_page','Nepali News Contact Form', 'Contact Form', 'manage_options','np_news_contact_page', 'np_news_create_contact_page' );

//=========================css option======================
add_submenu_page( 'np_news_admin_page','Nepali News Css Options', 'Custom Css', 'manage_options','np_news_custom_css_page', 'np_news_create_css_page' );


//activate custom settings see in guide.txt for details.
add_action('admin_init','np_news_custom_settings');


}
add_action('admin_menu','np_news_add_admin_page');

function np_news_custom_settings(){
	
	//===========*******sidebar options*******===============
	//register_setting( $option_group, $option_name, $args = array )
	register_setting('np-news-sidebar-group','profile_picture');
	register_setting('np-news-sidebar-group','first_name');
	register_setting('np-news-sidebar-group','last_name');
	register_setting('np-news-sidebar-group','user_description');
	register_setting('np-news-sidebar-group','twitter_handler','np_news_sanitize_twitter_handler');// the sanitize function 
	register_setting('np-news-sidebar-group','fb_handler');
	register_setting('np-news-sidebar-group','gplus_handler');

	//========setting sidebar section======
	//add_settings_section( $id, $title, $callback, $page )
	add_settings_section('np-news-sidebar-options','Sidebar Options','np_news_sidebar_options','np_news_admin_page');
	//===========setting sidebar fields=====
	//add_settings_field( $id, $title, $callback, $page, $section = 'default', $args = array )
	add_settings_field('np-sidebar-profile-picture','Profile Picture','np_sidebar_profile_picture','np_news_admin_page','np-news-sidebar-options');
	add_settings_field('np-sidebar-user-name','Full Name','np_sidebar_user_name','np_news_admin_page','np-news-sidebar-options');
	add_settings_field('np-sidebar-user-description','Description','np_sidebar_user_description','np_news_admin_page','np-news-sidebar-options');
	add_settings_field('np-sidebar-twitter','Twitter Handler','np_sidebar_twitter','np_news_admin_page','np-news-sidebar-options');
	add_settings_field('np-sidebar-fb','Facebook Handler','np_sidebar_fb','np_news_admin_page','np-news-sidebar-options');
	add_settings_field('np-sidebar-gplus','G+ Handler','np_sidebar_gplus','np_news_admin_page','np-news-sidebar-options');

	//===============****Theme support options*****========
	register_setting('np-news-theme-support','post_format');
	register_setting('np-news-theme-support','custom_header');
	register_setting('np-news-theme-support','custom_background');

    //add_settings_section( $id, $title, $callback, $page )
	add_settings_section('np-news-theme-options','Theme Options','np_news_theme_options','np_news_theme_option_page');
	add_settings_field('post-formats','Post Formats','np_news_post_formats','np_news_theme_option_page','np-news-theme-options');
	add_settings_field('custom-header','Custom Header','np_news_custom_header','np_news_theme_option_page','np-news-theme-options');
	add_settings_field('custom-background','Custom Background','np_news_custom_background','np_news_theme_option_page','np-news-theme-options');

	//Contact form options
	register_setting('np-news-contact-options','activate_contact');
	add_settings_section('np-news-contact-section','Contact Form','np_news_contact_section','shrijan_np_news_theme_contact');
	add_settings_field('activate-form','Activate Contact Form','np_news_activate_contact','shrijan_np_news_theme_contact','np_news-contact-section');


}

//post format callback options
// function np_news_post_format_callback($input){
// 	return $input;
// }


function np_news_theme_create_admin(){
	//generation of our admin page -general
	require_once(get_template_directory().'/inc/templates/np_news_admin_general.php');
	
}

//for sidebar for now we have created same as create admin function 
function np_news_create_sidebar_page(){
	require_once(get_template_directory().'/inc/templates/np_news_admin_general.php');
}

function np_news_create_css_page(){
	# generation of general page custom css page 
	require_once(get_template_directory().'/inc/templates/np_news_admin_custom_css.php');
} 
//function for theme options
function np_news_create_support_page(){
		require_once(get_template_directory().'/inc/templates/np_news_theme_support.php');
}
//contact page
function np_news_create_contact_page(){
		require_once(get_template_directory().'/inc/templates/np_news_theme_contact.php');
}

function np_news_theme_options(){
	echo 'Activate and Deactivate Specific Support';
}
function np_news_contact_section(){
	echo 'Activate and Deactivate Built-in contact form';
}

function np_news_post_formats(){
	$options=get_option('post_format');
	$formats=array('aside','gallery','link','image','quote','status','video','audio','chat');
	$output=' ';
	foreach ($formats as $format) {
		$checked=(@$options[$format]=='1'? 'checked':' ');
		$output .='<label><input type="checkbox" id="'.$format.'" name="post_format['.$format.']" value="1" '.$checked.' />'.$format.'</label><br>';
	}
	echo $output;
}
function np_news_custom_header(){
	$header=get_option('custom_header');
	$checked=(@$header=='1'? 'checked':' ');
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' />Activate The Custom Header</label>';
}
function np_news_custom_background(){
	$background=get_option('custom_background');
	$checked=(@$background=='1'? 'checked':' ');
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' />Activate The Custom Background</label>';
}
//for contact form
function np_news_activate_contact(){
	$header=get_option('activate_contact');
	$checked=(@$header=='1'? 'checked':' ');
	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
}



//np_news sidebar options
function np_news_sidebar_options(){
	echo "Customize Your Sidebar Information";
}

function np_sidebar_profile_picture(){
	$picture=esc_attr(get_option('profile_picture'));
	if (empty($picture)) {
		echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" name="profile_picture" id="profile_picture" value="">';
	}else{
		echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" name="profile_picture" id="profile_picture" value="'.$picture.'"><input type="button" id="remove-picture" class="button button-secondary" value="Remove"/>';
	}
}
	

function np_sidebar_user_name(){
	$firstName=esc_attr(get_option('first_name'));
	$lastName=esc_attr(get_option('last_name'));
	#esc_attr is used for Filters a string cleaned and escaped for output in an HTML attribute


	echo '<input type="text" name="first_name" value="'.$firstName.'"> <input type="text" name="last_name" value="'.$lastName.'" placeholder="last name" >';
}
function np_sidebar_user_description(){
	$description=esc_attr(get_option('user_description'));
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="user descripion" size="50">';
}
function np_sidebar_twitter(){
	$twitter=esc_attr(get_option('twitter_handler'));
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="twitter"><p class="description">Please write your twitter account without @ sinp</p>';
}
function np_sidebar_fb(){
	$fb=esc_attr(get_option('fb_handler'));
	echo '<input type="text" name="fb_handler" value="'.$fb.'" placeholder="Facebook Handler">';
}
function np_sidebar_gplus(){
	$gplus=esc_attr(get_option('gplus_handler'));
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="G+ Handler">';
}


//sanitize settings or validataion 
function np_news_sanitize_twitter_handler($input){
	$output=sanitize_text_field($input);
	$output=str_replace('@','',$output);
	return $output; //never use echo instead of return echo create a html 
}