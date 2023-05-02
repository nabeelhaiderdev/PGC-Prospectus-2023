<?php
/**
 * Template Name: Campus Life
 * Template Post Type: page
 *
 * This template is for displaying campus life page.
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


global $paged;
$campus_args = array(
	'post_type'              => array( 'campus-life' ),
	'posts_per_page'         => -1, //how many posts you need
	'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
);
// The Query
$campus_query = new WP_Query( $campus_args );

?>

<!-- Subpage Visual -->
<section class="visual-section subpage-visual">
	<div class="container">
		<div class="textbox">
			<h1>Campus Life</h1>
		</div>
	</div>
</section>
<!-- Campus Section -->
<section class="campus-block additionl-styles">
	<div class="container">
		<header class="campus-head">
			<h2>campus Life</h2>

			<?php if ( $campus_query->have_posts() ) { ?>

			<div class="filter-controls">
				<div class="slick-slide">
					<button type="button" data-filter="all">All</button>
				</div>
				<?php 
					$misc = "";
					$miscArray = array();
					while ( $campus_query->have_posts() ) {
						$campus_query->the_post();
						$title = sanitize_title(get_the_title());
						if(trim($title) == 'misc'){
							$misc = 1;
							$miscArray['title'] = "Misc";
							$miscArray['sanitize_title'] = sanitize_title(get_the_title());
						}
						if(trim($title) != 'misc'){
				?>

				<div class="slick-slide">
					<button type="button"
						data-filter=".<?php echo sanitize_title(get_the_title()); ?>"><?php the_title(); ?></button>
				</div>

				<?php 
					}
				} ?>

				<?php
					if($misc = 1 && isset($miscArray['title']) && isset($miscArray['sanitize_title'])){
				?>
				<div class="slick-slide">
					<button type="button"
						data-filter=".<?php echo $miscArray['sanitize_title']; ?>"><?php echo $miscArray['title']; ?></button>
				</div>
				<?php
					}
				?>
			</div>

			<?php } ?>

		</header>
		<?php if ( $campus_query->have_posts() ) { 
			
			$pgcpp_to_cl_page_description = ( isset( $option_fields['pgcpp_to_cl_page_description'] ) ) ? $option_fields['pgcpp_to_cl_page_description'] : null;
			?>

		<div class="campuslife-details-container">
			<p class="single-campuslife-detail" id="first-campuslife-detail">
				<b><?php echo $pgcpp_to_cl_page_description; ?></b>
			</p>
			<?php if ( $campus_query->have_posts() ) {
				while ( $campus_query->have_posts() ) {
						$campus_query->the_post();
			$pID         = $post->ID;
			$post_fields = get_fields( $pID );
			$pgcpp_sclo_photo_short_description  = $post_fields['pgcpp_sclo_photo_short_description'];
			?>
			<p class="single-campuslife-detail" id="<?php echo sanitize_title(get_the_title()); ?>">
				<b><?php echo $pgcpp_sclo_photo_short_description; ?></b>
			</p>
			<?php
			}
		} ?>
		</div>
		<div class="filters-container">
			<?php  
				while ( $campus_query->have_posts() ) {
					$counter = 0;
					$campus_query->the_post();
					$pID         = $post->ID;
					$post_fields = get_fields( $pID );
					$pgcpp_sclo_landing_pages_images  = $post_fields['pgcpp_sclo_landing_pages_images'];
					$pgcpp_sclo_photo_video_file  = $post_fields['pgcpp_sclo_photo_video_file'];
				if($pgcpp_sclo_landing_pages_images){
					foreach ($pgcpp_sclo_landing_pages_images as $photo ) {
						$counter++;
						if($counter == 16){
							break;
						}
			?>
			<?php
			if($pgcpp_sclo_photo_video_file && $website_display_count < 1){ 
				foreach ($pgcpp_sclo_photo_video_file as $video ) {
					$current_video = $video['video'];
					$current_image = $video['image'];
					$website_display_count++;
				?>
			<div class="filter-item mix video-box <?php echo sanitize_title(get_the_title()); ?>">
				<a href="<?php echo $current_video; ?>">
					<?php echo wp_get_attachment_image( $current_image, 'full');  ?>
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
			<?php } 
			} ?>
			<div class="filter-item mix <?php echo sanitize_title(get_the_title()); ?>">
				<a href="<?php the_permalink(); ?>">
					<?php echo wp_get_attachment_image( $photo, 'full');  ?>
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
			<?php } ?>
			<?php } ?>

			<?php } ?>

		</div>
		<?php } ?>

		<div class="filter-button-container" id="filter-campuslife-button" style="text-align:center;">
			<a href="/campus-life/" class="btn btn-lg btn-primary">View All</a>
		</div>
		<!-- /.filter-button-container -->

	</div>
</section>
<!-- Section Programs -->


<?php while ( have_posts() ) { the_post();
	//Include specific template for the content.
	get_template_part( 'partials/content', 'page' );

} ?>

<?php get_footer();
