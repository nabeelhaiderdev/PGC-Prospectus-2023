<?php
/**
 * Block Name: Programmes
 *
 * The template for displaying the custom gutenberg block named programmes.
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
$pgcpp_blk_prg_title = ( isset( $block_fields['pgcpp_blk_prg_title'] ) ) ? $block_fields['pgcpp_blk_prg_title'] : null;
$pgcpp_blk_prg_button = ( isset( $block_fields['pgcpp_blk_prg_button'] ) ) ? $block_fields['pgcpp_blk_prg_button'] : null;

global $post;
$lp_select_posts = array();
$lp_select_posts = $block_fields['pgcpp_blk_prg_programmes'];

?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Section Programs -->
	<section class="section-programs">
		<div class="container">
			<div class="content-holder">
				<h2><?php echo $pgcpp_blk_prg_title; ?></h2>
				<?php if ( $lp_select_posts ) { ?>
				<div class="row-block">
					<?php 
					foreach ( $lp_select_posts as $lp_posts ) {
						$post = $lp_posts;
						setup_postdata( $post );
						$pID         = $post->ID;
						$post_fields = get_fields( $pID );
						$pgcpp_spo_dot_color = ( isset( $post_fields['pgcpp_spo_dot_color'] ) ) ? $post_fields['pgcpp_spo_dot_color'] : null;
						if($pgcpp_spo_dot_color == 'Red'){
							$pgcpp_spo_dot_color_class = ' red-dot ';
						} else {
							$pgcpp_spo_dot_color_class = null;
						}
						$pgcpp_spo_short_description  = $post_fields['pgcpp_spo_short_description'];
					?>
					<div class="col-block-4 box-program">
						<a class="box-holder <?php echo $pgcpp_spo_dot_color_class; ?>"
							href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
							<p><?php echo html_entity_decode($pgcpp_spo_short_description); ?></p>
						</a>
					</div>
					<?php } ?>
				</div>
				<?php } wp_reset_query(); ?>
				<div class="btn-block">
					<?php
						if( $pgcpp_blk_prg_button ) :
							echo glide_acf_button( $pgcpp_blk_prg_button, 'btn btn-primary' );
						endif;
					?>
				</div>
			</div>
		</div>
	</section>

</div>
