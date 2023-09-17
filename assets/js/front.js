let wpd_modal = ( show = true ) => {
	if(show) {
		jQuery('#wp-did-modal').show();
	}
	else {
		jQuery('#wp-did-modal').hide();
	}
}



jQuery(function($){

	let is_nid_vlid = false;

	$("#wptp_submit").attr("disabled", true);

	$('#wptp_nid').on('focusout', function(){
		let nid_length = $.trim($("#wptp_nid").val()).length
		if ( nid_length >= 10 && nid_length <= 15 ) {
			is_nid_vlid = true;
			$("#wptp_submit").attr("disabled", false);
			$("#wptp_nid_warning").hide();

		}
		else{
			$("#wptp_submit").attr("disabled", true);
			$("#wptp_nid_warning").show();
		}
	});

	if ( true == is_nid_vlid ) {
		
	}

	$('#nid_submit').submit(function(e){
		e.preventDefault();
		let $form 	= $(this);

		// console.log( $form.serialize() );
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
				}
				wpd_modal(false);
			},
			error: function(err) {
				wpd_modal(false);
			}
		});
	});
})

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