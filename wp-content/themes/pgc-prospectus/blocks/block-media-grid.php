<?php
/**
 * Block Name: Media Grid
 *
 * The template for displaying the custom gutenberg block named Media Grid.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package PGC Prospectus 2023
 * @since 1.0.0
 */

// Get all the fields from ACF for this block ID
// $block_fields = get_fields( $block['id'] );
$block_fields = get_fields_escaped( $block['id'] );
// $block_fields = get_fields_escaped( $block['id'] ,'sanitize_text_field' ); // if want to remove all html

// Set the block name for it's ID & class from it's file name
$block_glide_name = $block['name'];
$block_glide_name = str_replace("acf/" , "" , $block_glide_name);

// Set the preview thumbnail for this block for gutenberg editor view.
if( isset( $block['data']['preview_image_help'] )  ) {    /* rendering in inserter preview  */
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
}

// create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = (isset($block['className'])) ? $block['className'] : null;

// Making the unique ID for the block.
$id = 'block-' .$block_glide_name . "-" . $block['id'];

// Making the unique ID for the block.
if($block['name']){
	$block_name = $block['name'];
	$block_name = str_replace("/" , "-" , $block_name);
	$name = 'block-' .  $block_name;
}

// Block variables
// $custom_field_of_block = html_entity_decode($block_fields['custom_field_of_block']); // for keeping html from input
// $custom_field_of_block = html_entity_remove($block_fields['custom_field_of_block']); // for removing html from input
$pgcpp_blk_mg_title = ( isset( $block_fields['pgcpp_blk_mg_title'] ) ) ? $block_fields['pgcpp_blk_mg_title'] : null;
$pgcpp_blk_mg_grid_type = ( isset( $block_fields['pgcpp_blk_mg_grid_type'] ) ) ? $block_fields['pgcpp_blk_mg_grid_type'] : null;
$pgcpp_blk_mg_title = ( isset( $block_fields['pgcpp_blk_mg_title'] ) ) ? $block_fields['pgcpp_blk_mg_title'] : null;
$pgcpp_blk_mg_button = ( isset( $block_fields['pgcpp_blk_mg_button'] ) ) ? $block_fields['pgcpp_blk_mg_button'] : null;
$pgcpp_blk_mg_description = ( isset( $block_fields['pgcpp_blk_mg_description'] ) ) ? $block_fields['pgcpp_blk_mg_description'] : null;


?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<?php $pgcpp_blk_md_media = ( isset( $block_fields['pgcpp_blk_md_media'] ) ) ? $block_fields['pgcpp_blk_md_media'] : null;	?>

	<!-- Campus Section -->
	<section class="campus-block additionl-styles">
		<div class="container">
			<header class="campus-head">
				<h2><?php echo $pgcpp_blk_mg_title; ?></h2>
				<?php if($pgcpp_blk_mg_description){ ?>
				<h3><?php echo $pgcpp_blk_mg_description; ?></h3>
				<?php } ?>
			</header>
			<?php if($pgcpp_blk_md_media){  ?>
			<div class="filters-container">
				<?php foreach ($pgcpp_blk_md_media as $media ) { 
					$media_image = $media['image'];
					$media_video_link = $media['video_link'];
					if($media_video_link){
						$video_box_class = ' video-box ';
						$href_link = $media_video_link;
					} else {
						$href_link = $media_image;
						$href_image_url = wp_get_attachment_url($media_image, 'full');
						$video_box_class = null;
					}
					?>
				<div class="filter-item mix <?php echo $video_box_class; ?>">
					<a href="<?php echo $href_image_url; ?>" data-fancybox="gallery">
						<?php echo wp_get_attachment_image( $media_image, 'full' ); ?>
						<span class="btn-play"><i class="fas fa-play"></i></span>
					</a>
				</div>
				<?php } ?>
			</div>
			<?php }	?>
		</div>
	</section>

</div>
