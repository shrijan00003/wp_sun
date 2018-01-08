<h1>Nepali News Theme Options</h1>
<?php settings_errors(); ?>
<?php 
	//$picture=esc_attr(get_option('profile_picture'));
	
 ?>
<form method="post" action="options.php" class="np-news-general-form">
	<?php settings_fields('np-news-theme-support') ?>
	<?php do_settings_sections('np_news_theme_option_page') ?>
	<?php submit_button(); ?>
</form>