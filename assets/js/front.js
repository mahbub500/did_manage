let wpd_modal = ( show = true ) => {
	if(show) {
		jQuery('#wp-did-modal').show();
	}
	else {
		jQuery('#wp-did-modal').hide();
	}
}



jQuery(function($){

	

	// $( "#nid_submit" ).on( 'click', function(e){
	$('#nid_submit').submit(function(e){
		e.preventDefault();
		let $name 	= $( '#wptp_name' ).val();
		let $f_name = $( '#wptp_f_name' ).val();
		let $nid  	= $( '#wptp_nid' ).val();
		wpd_modal(true);
		$.ajax({
			url: WP_DID.ajaxurl,
			data: {action : 'store_nid', 
				name 	: $name, 
				f_name 	: $f_name, 
				nid 	: $nid, 
			},
			type: 'POST',
			dataType: 'JSON',
			success: function(resp) {
				// $('#cf7s-contact-msg').text(resp.data.message);
				console.log( resp );
				toastr.success("Hello World!");
				wpd_modal(false);
			},
			error: function(err) {
				// $('#cf7s-contact-msg').text(err.data.message);
				wpd_modal(false);
			}
		});
			console.log( $f_name );
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