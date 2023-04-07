<?php
/**
 * Template part for footer cta
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package PGC Prospectus 2023
 * @since 1.0.0
 */

$pgcpp_page_cta_pagevisibility = ( isset( $fields['pgcpp_page_cta_pagevisibility'] ) ) ? $fields['pgcpp_page_cta_pagevisibility'] : null;


 $pgcpp_to_cta_headline = ( isset( $fields['pgcpp_to_cta_headline'] ) ) ? $option_fields['pgcpp_to_cta_headline'] : null;
$pgcpp_ftrcta_headline  = ( isset( $fields['pgcpp_page_cta_headline'] ) ) ? $fields['pgcpp_page_cta_headline'] : $pgcpp_to_cta_headline;
?>

<section id="cta-section" class="cta-section">
	<!-- cta Start -->
	<div class="cta-single">
		<div class="wrapper">
			<h4><?php echo $pgcpp_ftrcta_headline; ?></h4>
		</div>
	</div>
	<!-- cta End -->
</section>
