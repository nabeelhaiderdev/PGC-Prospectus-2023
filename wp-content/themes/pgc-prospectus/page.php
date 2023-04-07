<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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


// $pgcpp_pagetitle = (isset($fields['pgcpp_pagetitle'])) ? $fields['pgcpp_pagetitle'] : null;
// if(!$pgcpp_pagetitle){
// 	$pgcpp_pagetitle = get_the_title();
// }
$pgcpp_spo_title = glide_page_title('pgcpp_spo_title');
$pgcpp_spo_button = ( isset( $fields['pgcpp_spo_button'] ) ) ? $fields['pgcpp_spo_button'] : null;
?>

<!-- Subpage Visual -->
<section class="visual-section subpage-visual">
	<div class="container">
		<div class="textbox">
			<h1><?php echo $pgcpp_spo_title; ?></h1>
			<div class="s-50"></div>
			<?php
				if( $pgcpp_spo_button ) :
					echo glide_acf_button( $pgcpp_spo_button, 'btn btn-lg btn-primary' );
				endif;
			?>
		</div>
	</div>
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
