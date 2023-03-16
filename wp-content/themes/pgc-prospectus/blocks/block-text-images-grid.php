<?php
/**
 * Block Name: Text & Images Grid
 *
 * The template for displaying the custom gutenberg block named text & images grid.
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
$pgcpp_blk_twig_title = ( isset( $block_fields['pgcpp_blk_twig_title'] ) ) ? $block_fields['pgcpp_blk_twig_title'] : null;
$pgcpp_blk_twig_subtitle = ( isset( $block_fields['pgcpp_blk_twig_subtitle'] ) ) ? $block_fields['pgcpp_blk_twig_subtitle'] : null;
$pgcpp_blk_twig_grid = ( isset( $block_fields['pgcpp_blk_twig_grid'] ) ) ? $block_fields['pgcpp_blk_twig_grid'] : null;

?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- programs Block -->
	<section class="programs-block">
		<div class="container">
			<div class="programs-header">
				<h2><?php echo $pgcpp_blk_twig_title; ?></h2>
				<h4><?php echo $pgcpp_blk_twig_subtitle; ?></h4>
			</div>
			<?php if($pgcpp_blk_twig_grid){ ?>
			<div class="programs-columns">
				<?php foreach ($pgcpp_blk_twig_grid as $twig ) {
					$twig_variation = $twig['variation'];
					if($twig_variation == 'headings'){ 
						$twig_heading = $twig['heading'];
						$twig_subheading = $twig['subheading'];
						?>

				<div class="program-box">
					<h4><?php echo $twig_heading; ?></h4>
					<?php echo html_entity_decode($twig_subheading); ?>
				</div>

				<?php } elseif($twig_variation == 'text'){
						$twig_big_heading = $twig['big_heading'];
						$twig_text_heading = $twig['text_heading'];
						$twig_heading_size = $twig['heading_size'];
						$twig_text = $twig['text'];
					?>

				<div class="programs-header">
					<?php if($twig_big_heading){ ?>
					<h2><?php echo $twig_big_heading; ?></h2>
					<?php } ?>
					<?php if($twig_heading_size == 'h3'){ ?>
					<?php if($twig_text_heading){ ?>
					<h3><?php echo $twig_text_heading; ?></h3>
					<?php } ?>
					<?php } elseif($twig_heading_size == 'h4'){ ?>
					<?php if($twig_text_heading){ ?>
					<h4><?php echo $twig_text_heading; ?></h4>
					<?php } ?>
					<?php } ?>
					<?php echo html_entity_decode($twig_text); ?>
				</div>

				<?php } else { 
					$twig_image = $twig['image'];
					?>
				<div class="image-box">
					<?php echo wp_get_attachment_image( $twig_image, 'full' ); ?>
				</div>
				<?php	}
				} ?>
			</div>
			<?php } ?>
		</div>
	</section>
</div>
