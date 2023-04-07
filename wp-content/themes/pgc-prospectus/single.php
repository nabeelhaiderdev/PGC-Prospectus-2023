<?php
/**
 * The template for displaying all posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
?>

<!-- Subpage Visual -->
<section class="visual-section subpage-visual">
	<div class="container">
		<div class="textbox">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</section>


<section id="page-section" class="page-section">
	<!-- Content Start -->

	<?php while ( have_posts() ) { the_post();
		//Include specific template for the content.
		get_template_part( 'partials/content', get_post_type() );
	} ?>

	<div class="clear"></div>
	<div class="ts-80"></div>

	<!-- Content End -->
</section>

<?php get_footer();
