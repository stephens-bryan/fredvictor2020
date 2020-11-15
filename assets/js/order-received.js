jQuery( function($) {
	if ($('body').hasClass('woocommerce-order-received') == true) {
		console.log('works');
		console.log(fv_or);
		$('#content').append('<div class="thank-you-graphic"><img src="' + fv_or.image + '" alt=""></div>')
	}
} );