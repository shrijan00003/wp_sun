<h1>Nepali News Sidebar Options</h1>
<?php settings_errors(); ?>
<?php 
	$picture=esc_attr(get_option('profile_picture'));
	$firstName=esc_attr(get_option('first_name'));
	$lastName=esc_attr(get_option('last_name'));
	$fullname=$firstName.' '.$lastName;
	$description=esc_attr(get_option('user_description'));
 ?>
<div class="np-news-sidebar-preview">
	<div class="np-news-sidebar">
		<div class="image-container">
			<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>)"></div>
		</div>
		<h1 class="np-news-username"><?php print $fullname; ?></h1>
		<h2 class="np-news-description"><?php print $description; ?></h2>
		<div class="icon-wrapper"></div>
	</div>
</div>
<form method="post" action="options.php" class="gn_news-general-form">
	<?php 
		settings_fields('np-news-sidebar-group');
		// settings_fields( $option_group )
	 ?>
	<?php 
		do_settings_sections('np_news_admin_page');
	//do_settings_sections( $page )
	?>
	<?php submit_button('Save Changes','primary','btnSubmit'); ?>
	<!-- these attribute in submit button are for clearing interference with dyanamic with jqueries -->
</form>