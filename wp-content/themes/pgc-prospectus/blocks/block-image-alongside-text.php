<?php
/**
 * Block Name: Image Alongside Text
 *
 * The template for displaying the custom gutenberg block named image alongside text.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package PGC Prospective 2023
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
$pgcpp_blk_iat_images_count = ( isset( $block_fields['pgcpp_blk_iat_images_count'] ) ) ? $block_fields['pgcpp_blk_iat_images_count'] : null;
$pgcpp_blk_iat_image_location = ( isset( $block_fields['pgcpp_blk_iat_image_location'] ) ) ? $block_fields['pgcpp_blk_iat_image_location'] : null;
if($pgcpp_blk_iat_image_location == 'Right'){
	$pgcpp_blk_iat_image_location_class = ' text-post-row-reverse ';
} else {
	$pgcpp_blk_iat_image_location_class = null;
}
$pgcpp_blk_iat_title = ( isset( $block_fields['pgcpp_blk_iat_title'] ) ) ? $block_fields['pgcpp_blk_iat_title'] : null;
$pgcpp_blk_iat_subtitle = ( isset( $block_fields['pgcpp_blk_iat_subtitle'] ) ) ? $block_fields['pgcpp_blk_iat_subtitle'] : null;
$pgcpp_blk_iat_image = ( isset( $block_fields['pgcpp_blk_iat_image'] ) ) ? $block_fields['pgcpp_blk_iat_image'] : null;
$pgcpp_blk_iat_top_image = ( isset( $block_fields['pgcpp_blk_iat_top_image'] ) ) ? $block_fields['pgcpp_blk_iat_top_image'] : null;
$pgcpp_blk_iat_bottom_image = ( isset( $block_fields['pgcpp_blk_iat_bottom_image'] ) ) ? $block_fields['pgcpp_blk_iat_bottom_image'] : null;
$pgcpp_blk_iat_popup_title = ( isset( $block_fields['pgcpp_blk_iat_popup_title'] ) ) ? $block_fields['pgcpp_blk_iat_popup_title'] : null;
$pgcpp_blk_iat_text = ( isset( $block_fields['pgcpp_blk_iat_text'] ) ) ? $block_fields['pgcpp_blk_iat_text'] : null;


?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<?php if($pgcpp_blk_iat_images_count == 'Two'){ ?>
	<!-- Section About -->
	<section class="section-about font-large">
		<div class="container">
			<?php if($pgcpp_blk_iat_popup_title){ ?>
			<span class="heading-side"><?php echo $pgcpp_blk_iat_popup_title; ?></span>
			<?php } ?>
			<div class="row-block <?php echo $pgcpp_blk_iat_image_location_class; ?>">
				<div class="col-block-5">
					<div class="images-block">
						<div class="img align-right">
							<?php echo wp_get_attachment_image( $pgcpp_blk_iat_top_image, 'thumb_370_145' ); ?>
						</div>
						<div class="img">
							<?php echo wp_get_attachment_image( $pgcpp_blk_iat_bottom_image, 'thumb_370_270' ); ?>
						</div>
					</div>
				</div>
				<div class="col-block-5 col-block-spacer-1 text-block">
					<h2><?php echo html_entity_decode($pgcpp_blk_iat_title); ?></h2>
					<?php echo html_entity_decode($pgcpp_blk_iat_text); ?>
				</div>

			</div>
		</div>
	</section>

	<?php } else { ?>


	<!-- E Learning Block -->
	<section class="learning-block">
		<div class="container">
			<section class="posts-block">
				<article class="text-post <?php echo $pgcpp_blk_iat_image_location_class; ?>">
					<div class="image-holder">
						<?php echo wp_get_attachment_image( $pgcpp_blk_iat_image, 'full' ); ?>
					</div>
					<div class="textbox">
						<?php if($pgcpp_blk_iat_subtitle){ ?>
						<h4><?php echo $pgcpp_blk_iat_subtitle; ?></h4>
						<?php } ?>
						<?php if($pgcpp_blk_iat_title){ ?>
						<h2><?php echo html_entity_decode($pgcpp_blk_iat_title); ?></h2>
						<?php } ?>
						<?php echo html_entity_decode($pgcpp_blk_iat_text); ?>
					</div>
				</article>
			</section>
		</div>
	</section>

	<?php } ?>
</div>
