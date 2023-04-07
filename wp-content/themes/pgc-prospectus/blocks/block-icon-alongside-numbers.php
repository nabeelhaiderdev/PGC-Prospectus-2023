<?php
/**
 * Block Name: Icon Alongside Numbers
 *
 * The template for displaying the custom gutenberg block named icon alongside numbers.
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
$pgcpp_blk_ian_icons = ( isset( $block_fields['pgcpp_blk_ian_icons'] ) ) ? $block_fields['pgcpp_blk_ian_icons'] : null;


?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<?php if($pgcpp_blk_ian_icons){ ?>
	<!-- Section Stats -->
	<section class="section-stats">
		<div class="container">
			<div class="row-block">
				<?php foreach ($pgcpp_blk_ian_icons as $icon ) {
					$icon_image = $icon['icon'];
					$icon_number = $icon['number'];
					$icon_title = $icon['title'];
				?>
				<div class="col-block box-stat">
					<div class="box-holder">
						<div class="ico">
							<?php echo wp_get_attachment_image( $icon_image, 'thumb_70_70' ); ?>
						</div>
						<div class="text-box">
							<h2><?php echo $icon_number; ?></h2>
							<h5><?php echo $icon_title; ?></h5>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<?php } ?>

</div>
