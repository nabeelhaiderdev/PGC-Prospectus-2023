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
} );
