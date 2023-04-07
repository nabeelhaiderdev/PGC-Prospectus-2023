<?php
/**
 * Template Name: Homepage
 * Template Post Type: page
 *
 * This template is for displaying home page.
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
<!-- Visual Section -->
<section class="visual-section">
	<div class="container">
		<div class="textbox">
			<h1><?php echo html_entity_decode($pgcpp_pagetitle); ?></h1>
			<strong class="session"><?php echo html_entity_decode($pgcpp_tho_subtitle); ?></strong>
			<!-- <a href="#" class="btn btn-lg btn-primary">Apply Now</a> -->
			<?php
				if( $pgcpp_tho_button ) :
					echo glide_acf_button( $pgcpp_tho_button, 'btn btn-lg btn-primary' );
				endif;
			?>
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
</section> <?php get_footer(); ?>
