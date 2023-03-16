/**
 * Document Ready Function
 * Triggered when document get's ready
 */
//  document.all.body.style.paddingBottom="189px";
jQuery( document ).ready( function( jQuery ) {
	const containerEl = document.querySelector( '.filters-container' );
	const mixer = mixitup( containerEl, {
		animation: {
			animateResizeContainer: false, // required to prevent column algorithm bug
		},
	} );

	// Resource Ajax Function -> Start
	jQuery( document ).on( 'click', '#achiever-year-element-button', function() {
		let year = '';
		let board = '';

		year = jQuery( '#achiever-year-element' ).val();
		board = jQuery( '#achiever-board-element' ).val();

		if ( year != '*' ) {
			jQuery( '#high-achievers-archive-year' ).html( year );
			jQuery( '#high-achievers-archive-year' ).css( 'display', 'inline-block' );
		} else {
			jQuery( '#high-achievers-archive-year' ).css( 'display', 'none' );
		}

		if ( board != '*' ) {
			jQuery( '#high-achievers-archive-board' ).html( board );
			jQuery( '#high-achievers-archive-board' ).css( 'display', 'inline-block' );
		} else {
			jQuery( '#high-achievers-archive-board' ).css( 'display', 'none' );
		}

		jQuery( '#achiever-ajax-results' ).html( '' );
		jQuery( '.lds-roller' ).show();

		jQuery.ajax( {
			url: localVars.ajax_url,
			type: 'post',
			dataType: 'json',
			data: {
				action: 'achiever_ajax_filter',
				items: [ year, board ],
			},
			success( response ) {
				jQuery( '#achiever-ajax-results' ).html( response.html );
				jQuery( '.lds-roller' ).hide();
			},
		} );
	} );
} );
