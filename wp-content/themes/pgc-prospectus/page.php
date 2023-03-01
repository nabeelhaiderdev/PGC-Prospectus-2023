<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PGC Prospective 2023
 * @since 1.0.0
 *
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;


// $pgcpp_pagetitle = (isset($fields['pgcpp_pagetitle'])) ? $fields['pgcpp_pagetitle'] : null;
// if(!$pgcpp_pagetitle){
// 	$pgcpp_pagetitle = get_the_title();
// }
$pgcpp_pagetitle = glide_page_title('pgcpp_pagetitle');
?>

<section id="hero-section" class="hero-section">
	<!-- Hero Start -->

	<div class="hero-single">
		<div class="wrapper">
			<h1><?php echo the_title(); ?></h1>
		</div>
	</div>
	<!-- Hero End -->
</section>

<section id="page-section" class="page-section">
	<!-- Content Start -->

	<?php while ( have_posts() ) { the_post();
		//Include specific template for the content.
		get_template_part( 'partials/content', 'page' );

	} ?>

	<div class="clear"></div>
	<div class="ts-80"></div>

	<!-- Content End -->
</section>

<?php get_footer(); ?>
