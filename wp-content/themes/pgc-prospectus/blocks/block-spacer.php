<?php
/**
 * Block Name: Spacer
 *
 * The template for displaying the custom gutenberg block named Spacer.
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
$pgcpp_blk_spacer = html_entity_remove($block_fields['pgcpp_blk_spacer']);
$pgcpp_blk_spacer_class = null;

	 if($pgcpp_blk_spacer == 'space-50')  { $pgcpp_blk_spacer_class = 's-50'; }
else if($pgcpp_blk_spacer == 'space-60')  { $pgcpp_blk_spacer_class = 's-60'; }
else if($pgcpp_blk_spacer == 'space-80')  { $pgcpp_blk_spacer_class = 's-80'; }
else if($pgcpp_blk_spacer == 'space-100') { $pgcpp_blk_spacer_class = 's-100'; }
else if($pgcpp_blk_spacer == 'space-120') { $pgcpp_blk_spacer_class = 's-120'; }
else if($pgcpp_blk_spacer == 'space-140') { $pgcpp_blk_spacer_class = 's-140'; }
else if($pgcpp_blk_spacer == 'space-160') { $pgcpp_blk_spacer_class = 's-160 '; }
else if($pgcpp_blk_spacer == 'space-200') { $pgcpp_blk_spacer_class = 's-200'; }
else if($pgcpp_blk_spacer == 'space-270') { $pgcpp_blk_spacer_class = 's-270'; }


?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<div class="glide-spacer <?php echo $pgcpp_blk_spacer_class; ?>"> </div>

</div>
