let wpd_modal = ( show = true ) => {
	if(show) {
		jQuery('#wp-did-modal').show();
	}
	else {
		jQuery('#wp-did-modal').hide();
	}
}

jQuery(function($){

	$("#wptp_submit").attr("disabled", true);

	$('#wptp_nid').keyup(function(){
		let nid_length = $.trim($("#wptp_nid").val()).length
		if ( nid_length >= 10 && nid_length <= 15 ) {
			$("#wptp_submit").attr("disabled", false);
			$("#wptp_nid_warning").hide();
			$("#wptp_nid").css('border','');

		}
		else{
			$("#wptp_submit").attr("disabled", true);
			$("#wptp_nid_warning").show();
			$("#wptp_nid").css('border','1px solid red');
		}
	});

	// Upload Image

	$('#wpdid_img_upload').on( 'click', function (e){
		e.preventDefault();

		var image = wp.media({
			title: 'Upload Image',
			multiple: false // Set to true if you want to allow multiple image uploads
		}).open().on('select', function() {
			var attachment = image.state().get('selection').first().toJSON();
			
			$('#wpdid_nid_image').attr('src', attachment.url);
			$('#wp_nid_img_url').val(attachment.url);
		});
	} );

	$('#nid_submit').submit(function(e){
		e.preventDefault();
		let $form 	= $(this);

		wpd_modal(true);
		$.ajax({
			url: WP_DID.ajaxurl,			
			data: $form.serialize(),
			type: 'POST',
			dataType: 'JSON',
			success: function(resp) {
				if ( resp.data.status == 0 ) {
					toastr.error( resp.data.message );
				}
				else{
					toastr.success( resp.data.message );
					location.reload();
				}
								
				wpd_modal(false);
			},
			error: function(err) {
				wpd_modal(false);
			}
		});
	});

	DataTable
	// let table = new DataTable('#nid_submit');
	$table = new DataTable('#wp_did_table', {
		paging: true,
	    scrollCollapse: true,
	    scrollY: '50vh',
	    search: {
        	return: true
    	}
    	
	});

	// select2 for did 
	$("#wp_did_owner").select2({
		tags: false,
		placeholder: 'Select all owner',
		
	});

	// select2 for did 
	$("#wpdid_did_buyer").select2({
		tags: false,
		placeholder: 'Select all Buyer',
		
	});

	// form submit for did

	$('#did_submit').submit(function(e){
		e.preventDefault();

		let $form 	= $(this);
		// let owner 	=  $('#wp_did_owner').select2('data');
		// let owner 	=  $('#wp_did_owner').find(':selected').data('id');
		// console.log( owner );

		wpd_modal(true);
		$.ajax({
			url: WP_DID.ajaxurl,			
			data: $form.serialize(),
			type: 'POST',
			dataType: 'JSON',
			success: function(resp) {
				if ( resp.data.status == 0 ) {
					toastr.error( resp.data.message );
				}
				else{
					toastr.success( resp.data.message );
					// location.reload();
				}
								
				wpd_modal(false);
			},
			error: function(err) {
				wpd_modal(false);
			}
		});
	});

})

function getCurrentDate() {
    const today = new Date();
    const year = today.getFullYear();
    const month = (today.getMonth() + 1).toString().padStart(2, '0');
    const day = today.getDate().toString().padStart(2, '0');
    return `${year}-${month}-${day}`;
}
     const dateInput = document.getElementById('wpdid_date');
        dateInput.value = getCurrentDate();


// Set the options that I want
	toastr.options = {
		"closeButton": true,
		"newestOnTop": true,
		"progressBar": true,
		"positionClass": "toast-bottom-center",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}