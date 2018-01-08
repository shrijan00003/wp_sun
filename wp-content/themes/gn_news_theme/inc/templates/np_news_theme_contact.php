<h1>Nepali News Contact Form</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php" class="gn_news-general-form">
	<?php 
		settings_fields('np-news-theme-support');
	   // settings_fields( $option_group )
	 ?>
	<?php 
		do_settings_sections('np_news_admin_page');
		// do_settings_sections( $page )
	?>
	<?php submit_button(); ?>
</form>