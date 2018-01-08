<?php 
/*
================================
	Admin Enqueue Functions
================================

*/
function np_news_load_admin_scripts( $hook ){
	if ('toplevel_page_shrijan_gn_news'!=$hook) {return; }
	// wp_register_style( $handle, $src, $deps = array, $ver = false, $media = 'all' )
	wp_register_style('np_news_admin',get_template_directory_uri().'/css/npnews.admin.css',array(),'1.0.0','all');
	wp_enqueue_style('np_news_admin');

	wp_enqueue_media();//for media uploader file 

	// wp_register_script( $handle, $src, $deps = array, $ver = false, $in_footer = false )
	wp_register_script('np_news_admin_script',get_template_directory_uri().'/js/npnews.admin.js',array('jquery'),'1.0.0',true);
	wp_enqueue_script('np_news_admin_script');
}

add_action('admin_enqueue_scripts','np_news_load_admin_scripts');