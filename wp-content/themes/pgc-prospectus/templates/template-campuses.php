<?php
/**
 * Template Name: Campuses
 * Template Post Type: page
 *
 * This template is for displaying campus page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package PGC Prospectus 2023
 * @since 1.0.0
 *
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

$pgcpp_pagetitle = (isset($fields['pgcpp_tho_title']) && $fields['pgcpp_tho_title']!='' ) ? $fields['pgcpp_tho_title'] : get_the_title();
$pgcpp_tho_subtitle = ( isset( $fields['pgcpp_tho_subtitle'] ) ) ? $fields['pgcpp_tho_subtitle'] : null;
$pgcpp_tho_button = ( isset( $fields['pgcpp_tho_button'] ) ) ? $fields['pgcpp_tho_button'] : null;

?>
<!-- Subpage Visual -->
<section class="visual-section subpage-visual">
	<div class="container">
		<div class="textbox">
			<h1>Find a Campus</h1>
		</div>
	</div>
</section>
<!-- Campus Location -->
<section class="campus-location">
	<div class="container">
		<h2>Find a Campus</h2>
		<div class="row-block">
			<div class="col-block-6">
				<div class="map-holder">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.1039482350507!2d74.32387801549615!3d31.52130485424914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391905c0f8caf00d%3A0xa7b13bcea8a40571!2sPunjab%20College%20Main%20Campus%2C%20151%20Lahore%20%E2%80%93%20Kasur%20Rd%2C%20Fazlia%20Colony%2C%20Lahore%2C%20Punjab%2054000%2C%20Pakistan!5e0!3m2!1sen!2s!4v1680675866438!5m2!1sen!2s"
						width="600" height="615" allowfullscreen="" loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
			<div class="col-block-6 location-details">

				<div class="form-selection">
					<h3>Find Campus Details</h3>
					<div class="custom-select">
						<select>
							<option>Lahore Campus 8</option>
							<option>Lahore Campus 8</option>
							<option>Lahore Campus 8</option>
							<option>Lahore Campus 8</option>
							<option>Lahore Campus 8</option>
						</select>
					</div>
				</div>
				<ul class="details-list">
					<li>
						<h3>Campus Address:</h3>
						<span class="text">151 Ferozepur Road</span>
					</li>
					<li>
						<h3>Campus City:</h3>
						<span class="text">Lahore</span>
					</li>
					<li>
						<h3>Telephone:</h3>
						<span class="text">+92 42 37503281-86</span>
					</li>
					<li>
						<h3>Email:</h3>
						<span class="text"><a
								href="mailto:principal.lahore@cps.ucp.edu.pk">principal.lahore@cps.ucp.edu.pk</a></span>
					</li>
					<li>
						<h3>Fax:</h3>
						<span class="text">+92 42 37588537</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section id="page-section" class="page-section">
	<!-- Content Start --> <?php while ( have_posts() ) { the_post();
		//Include specific template for the content.
		get_template_part( 'partials/content', 'page' );

	} ?> <div class="clear"></div>
	<div class="ts-80"></div>
	<!-- Content End -->
</section>

<?php get_footer(); ?>
