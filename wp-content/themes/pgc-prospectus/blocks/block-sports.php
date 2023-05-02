<?php
/**
 * Block Name: Sports
 *
 * The template for displaying the custom gutenberg block named Sports.
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

$pgcpp_blk_sprt_title = ( isset( $block_fields['pgcpp_blk_sprt_title'] ) ) ? $block_fields['pgcpp_blk_sprt_title'] : null;
$pgcpp_blk_sprt_sports = ( isset( $block_fields['pgcpp_blk_sprt_sports'] ) ) ? $block_fields['pgcpp_blk_sprt_sports'] : null;

?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Sports Block -->
	<section class="sports-block">
		<div class="container">
			<div class="sports-header">
				<p><?php echo $pgcpp_blk_sprt_title; ?></p>
			</div>
			<div class="sports-columns">
				<?php if($pgcpp_blk_sprt_sports){
				foreach ($pgcpp_blk_sprt_sports as $board ) { 
					$single_achievement  = $board['single_achievement'];
					?>

				<div class="sport-box">
					<h2><?php echo $board['board_name']; ?></h2>
					<?php if($single_achievement){ 
						foreach ($single_achievement as $achievement ) {
							$title = $achievement['title'];
							$winner = $achievement['winner'];
							$runnerup = $achievement['runnerup'];
							$image = $achievement['image'];
						?>
					<div class="textbox">
						<h3><?php echo $title; ?></h3>
						<?php if($winner){ ?>
						<p><strong>WINNER:</strong> <?php echo $winner; ?></p>
						<?php } ?>
						<?php if($runnerup){ ?>
						<p><strong>RUNNER-UP:</strong> <?php echo $runnerup; ?></p>
						<?php } ?>
					</div>
					<div class="image-holder">
						<?php echo wp_get_attachment_image( $image, 'full' ); ?>
					</div>
					<?php }
					} ?>
				</div>
				<?php }
			} ?>
			</div>
		</div>
	</section>
</div>
