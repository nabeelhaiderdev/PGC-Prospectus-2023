<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PGC Prospectus 2023
 * @since 1.0.0
 */


// Global variables
global $option_fields;
global $pID;
global $fields;



$post_data=get_queried_object();
$pID  = get_the_ID();
if (function_exists('get_fields') && function_exists('get_fields_escaped')) {
	$post_fields = get_fields_escaped( $pID );
}

// Post Tags & Categories
// $pgcpp_post_tags = get_the_tags($pID);
$pgcpp_post_categories = get_categories($pID);

$pgcpp_posttitle=glide_page_title('pgcpp_posttitle');

$pgcpp_sclo_photo_gallery = ( isset( $fields['pgcpp_sclo_photo_gallery'] ) ) ? $fields['pgcpp_sclo_photo_gallery'] : null;
$pgcpp_sclo_photo_gallery_second = ( isset( $fields['pgcpp_sclo_photo_gallery_second'] ) ) ? $fields['pgcpp_sclo_photo_gallery_second'] : null;

// $testing = $_GET['testing'];
// if($testing){
// 	echo "First count is:: " . (count($pgcpp_sclo_photo_gallery_second));
// 	echo "Second count is:: " . (count($pgcpp_sclo_photo_gallery_second));
// }

if($pgcpp_sclo_photo_gallery || $pgcpp_sclo_photo_gallery_second){
?>

<!-- Campus Section -->
<section class="campus-block additionl-styles">
	<div class="container">
		<div class="filters-container">
			<?php foreach ($pgcpp_sclo_photo_gallery as $photo ) { ?>
			<div class="filter-item mix">
				<a href="<?php echo wp_get_attachment_image_url( $photo, 'full' ); ?>" data-fancybox="gallery">
					<?php echo wp_get_attachment_image( $photo, 'full' ); ?>
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
			<?php } ?>
			<?php foreach ($pgcpp_sclo_photo_gallery_second as $photo ) { ?>
			<div class="filter-item mix">
				<a href="<?php echo wp_get_attachment_image_url( $photo, 'full' ); ?>" data-fancybox="gallery">
					<?php echo wp_get_attachment_image( $photo, 'full' ); ?>
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
			<?php } ?>
		</div>
	</div>
</section>


<?php } ?>
