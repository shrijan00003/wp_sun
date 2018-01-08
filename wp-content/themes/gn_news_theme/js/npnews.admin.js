jQuery(document).ready(function($){
	var medaiUploader;

	$('#upload-button').on('click',function(e){
		e.preventDefault();
		if(medaiUploader){
			medaiUploader.open();
			return;
		}

		medaiUploader=wp.media.frames.file_frame=wp.media({
			title: 'Choose a Profile Picture',
			button: { text: 'Choose Picture' },
			multiple: false
			});

		medaiUploader.on('select',function(){
			attachment=medaiUploader.state().get('selection').first().toJSON();
			$('#profile_picture').val(attachment.url);
			$('#profile-picture-preview').css('background-image','url('+attachment.url+')');
		});
		medaiUploader.open();

	});

	//for removing picture in the profile picture
	$('#remove-picture').on('click',function(e){
		e.preventDefault();
		var answer=confirm('Are you sure to delete the profile picture');
		if (answer==true) {
				$('#profile_picture').val('');
				$('.np-news-general-form').submit();
		}
		return;
	});

});