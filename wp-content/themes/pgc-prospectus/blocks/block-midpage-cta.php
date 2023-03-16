<?php
/**
 * Block Name: Midpage CTA
 *
 * The template for displaying the custom gutenberg block named Midpage CTA.
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
$pgcpp_blk_mcta_title = ( isset( $block_fields['pgcpp_blk_mcta_title'] ) ) ? $block_fields['pgcpp_blk_mcta_title'] : null;
$pgcpp_blk_mcta_text = ( isset( $block_fields['pgcpp_blk_mcta_text'] ) ) ? $block_fields['pgcpp_blk_mcta_text'] : null;
$pgcpp_blk_mcta_button = ( isset( $block_fields['pgcpp_blk_mcta_button'] ) ) ? $block_fields['pgcpp_blk_mcta_button'] : null;
$pgcpp_blk_mcta_types = ( isset( $block_fields['pgcpp_blk_mcta_types'] ) ) ? $block_fields['pgcpp_blk_mcta_types'] : null;
$pgcpp_blk_mcta_bgimage = ( isset( $block_fields['pgcpp_blk_mcta_bgimage'] ) ) ? $block_fields['pgcpp_blk_mcta_bgimage'] : null;
$pgcpp_blk_mcta_Link = ( isset( $block_fields['pgcpp_blk_mcta_Link'] ) ) ? $block_fields['pgcpp_blk_mcta_Link'] : null;


?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Incentives Section -->
	<section class="incentives-block">
		<div class="bg-image">
			<?php if($pgcpp_blk_mcta_bgimage){ ?>
			<img src="<?php echo $pgcpp_blk_mcta_bgimage; ?>" width="1920" height="897" alt="incentives">
			<?php } ?>
		</div>
		<div class="container">
			<div class="holder">
				<div class="textbox">
					<h2><?php echo $pgcpp_blk_mcta_title; ?></h2>
					<p><?php echo $pgcpp_blk_mcta_text; ?></p>
				</div>
				<?php
					if( $pgcpp_blk_mcta_button ) :
						echo glide_acf_button( $pgcpp_blk_mcta_button, 'btn btn-primary' );
					endif;
				?>
				<?php if($pgcpp_blk_mcta_types){ ?>
				<ul class="info-list">
					<?php foreach ($pgcpp_blk_mcta_types as $type) {
						?>
					<li>
						<?php
							if( $type ) :
								echo glide_acf_button( $type['type'], 'button plain-button' );
							endif;
						?>
					</li>
					<?php } ?>
					<?php if($pgcpp_blk_mcta_Link){ ?>
					<li><a href="<?php echo $pgcpp_blk_mcta_Link; ?>">More</a></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</section>

</div>
