<?php 
/*
================================
	Theme Support Options
================================
-This page is made for front end for gn_news_theme_support.php file
-it will be shown in each post page with add_theme_support
*/
$options=get_option('post_format');
$formats=array('aside','gallery','link','image','quote','status','video','audio','chat');
$output=array();
	foreach ($formats as $format) {
		$output[]=(@$options[$format]=='1'? $format:' ');
	}
if(!empty($options)){
	add_theme_support('post-formats',$output);
}
// theme support for custom header
$header=get_option('custom_header');
if(@$header==1){
	add_theme_support('custom-header');
}
$background=get_option('custom_background');
if(@$background==1){
	add_theme_support('custom-background');
}
