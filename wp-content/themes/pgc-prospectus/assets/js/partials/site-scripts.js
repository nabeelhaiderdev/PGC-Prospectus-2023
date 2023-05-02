/**
 * Document Ready Function
 * Triggered when document get's ready
 */
//  document.all.body.style.paddingBottom="189px";
jQuery(document).ready(function (jQuery) {
	const containerEl = document.querySelector('.filters-container');
	const mixer = mixitup(containerEl, {
		animation: {
			animateResizeContainer: false, // required to prevent column algorithm bug
		},
	});

	// Resource Ajax Function -> Start
	jQuery(document).on('click', '#achiever-year-element-button', function () {
		let year = '';
		let board = '';

		year = jQuery('#achiever-year-element').val();
		board = jQuery('#achiever-board-element').val();

		if (year != '*') {
			jQuery('#high-achievers-archive-year').html(year);
			jQuery('#high-achievers-archive-year').css('display', 'inline-block');
		} else {
			jQuery('#high-achievers-archive-year').css('display', 'none');
		}

		if (board != '*') {
			jQuery('#high-achievers-archive-board').html(board);
			jQuery('#high-achievers-archive-board').css('display', 'inline-block');
		} else {
			jQuery('#high-achievers-archive-board').css('display', 'none');
		}

		jQuery('#achiever-ajax-results').html('');
		jQuery('.lds-roller').show();

		jQuery.ajax({
			url: localVars.ajax_url,
			type: 'post',
			dataType: 'json',
			data: {
				action: 'achiever_ajax_filter',
				items: [year, board],
			},
			success(response) {
				jQuery('#achiever-ajax-results').html(response.html);
				jQuery('.lds-roller').hide();
			},
		});
	});

	if (jQuery('body').hasClass('page-template-template-achievers')) {
		setTimeout(function () {
			jQuery('select#achiever-year-element option:eq(1)').attr('selected', 'selected');
			jQuery('select#achiever-board-element').val('lahore');
			jQuery('#achiever-year-element-button').click();
		}, 2000);
	}

	jQuery('.page-links').insertAfter('figure.is-layout-flex.wp-block-gallery-1');

	jQuery('.slick-slide').on('click', function () {
		let current_campuslife_attribute = jQuery(this).find('button').data('filter');
		// current_campuslife_attribute = current_campuslife_attribute.substring(1);
		current_link = jQuery('.filter-item.mix' + current_campuslife_attribute + ' a').attr('href');

		jQuery('#filter-campuslife-button a').attr('href', current_link);

		console.log(current_campuslife_attribute);

		if (current_campuslife_attribute == 'all') {
			jQuery('.single-campuslife-detail').css('display', 'none');
			jQuery('#first-campuslife-detail').css('display', 'block');
		} else {
			// current_campuslife_attribute = current_campuslife_attribute.replace(/[_\W]+/g, '');
			current_campuslife_attribute = current_campuslife_attribute.substring(1, current_campuslife_attribute.length);
			console.log('#' + current_campuslife_attribute + '.single-campuslife-detail');

			jQuery('.single-campuslife-detail').css('display', 'none');
			jQuery('#' + current_campuslife_attribute + '.single-campuslife-detail').css('display', 'block');
		}
	});

	jQuery('#campus-selection').on('change', function () {
		jQuery('.lds-roller').show();
		const current_selected_option = jQuery(this).val();
		// jQuery('.map-holder').css('display', 'none');
		jQuery('.details-list').css('display', 'none');

		setTimeout(function () {
			jQuery('.lds-roller').hide();
			jQuery('#' + current_selected_option + '-details-list').css('display', 'block');
			// console.log('#' + current_selected_option + '-details-list');
			// jQuery('#' + current_selected_option + '-campus-map').css('display', 'block');
		}, 1000);
	});
});
