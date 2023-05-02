<?php
/**
 * Block Name: Campus
 *
 * The template for displaying the custom gutenberg block named Campus.
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

$args = array(
    'post_type' => 'campus',
    'posts_per_page' => -1, // To retrieve all posts
    'orderby' => 'title', // Order by post title
    'order' => 'ASC' // Order in ascending order (use 'DESC' for descending order)
);

$campus_query = new WP_Query( $args );

// Block variables
// $custom_field_of_block = html_entity_decode($block_fields['custom_field_of_block']); // for keeping html from input
// $custom_field_of_block = html_entity_remove($block_fields['custom_field_of_block']); // for removing html from input
$pgcpp_blk_cmp_title = ( isset( $block_fields['pgcpp_blk_cmp_title'] ) ) ? $block_fields['pgcpp_blk_cmp_title'] : null;
$pgcpp_blk_cmp_campuses = ( isset( $block_fields['pgcpp_blk_cmp_campuses'] ) ) ? $block_fields['pgcpp_blk_cmp_campuses'] : null;

$counter = 0;


?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">
	<!-- Campus Location -->
	<section class="campus-location">
		<div class="container">

			<h2><?php echo $pgcpp_blk_cmp_title; ?></h2>
			<?php if ( $campus_query->have_posts() ) { ?>
			<div class="row-block">
				<div class="col-block-6">
					<?php  while ( $campus_query->have_posts() ) {
						$campus_query->the_post();
						$pID         = get_the_ID();
						$post_fields = get_fields( $pID );
						$pccpp_sco_google_iframe  = $post_fields['pccpp_sco_google_iframe'];

						
						  ?>

					<div class="map-holder" id="<?php echo sanitize_title(get_the_title()); ?>-campus-map">
						<?php /* echo html_entity_decode($pccpp_sco_google_iframe); */ ?>
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.1039482350507!2d74.32387801549615!3d31.52130485424914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391905c0f8caf00d%3A0xa7b13bcea8a40571!2sPunjab%20College%20Main%20Campus%2C%20151%20Lahore%20%E2%80%93%20Kasur%20Rd%2C%20Fazlia%20Colony%2C%20Lahore%2C%20Punjab%2054000%2C%20Pakistan!5e0!3m2!1sen!2s!4v1680675866438!5m2!1sen!2s"
							width="600" height="615" allowfullscreen="" loading="lazy"
							referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					<?php break; } ?>
				</div>
				<div class="col-block-6 location-details">

					<div class="form-selection">
						<h3>Find Campus Details</h3>
						<div class="custom-select">
							<select id="campus-selection">
								<?php while ( $campus_query->have_posts() ) {
									$campus_query->the_post();
									 ?>
								<option value="<?php echo sanitize_title(get_the_title()); ?>">
									<?php the_title(); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="lds-roller">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<?php while ( $campus_query->have_posts() ) {
						$campus_query->the_post();
						$counter++;
						$pID         = get_the_ID();
						$post_fields = get_fields( $pID );
						$pccpp_sco_address  = $post_fields['pccpp_sco_address'];
						$pccpp_sco_city  = $post_fields['pccpp_sco_city'];
						$pccpp_sco_telephone  = $post_fields['pccpp_sco_telephone'];
						$pccpp_sco_email  = $post_fields['pccpp_sco_email'];
						$pccpp_sco_fax  = $post_fields['pccpp_sco_fax'];
						if($counter == 1){
							$details_list_class = ' visible ';
						} else {
							$details_list_class = ' hidden ';
						}
						?>



					<ul class="details-list <?php echo $details_list_class; ?>"
						id="<?php echo sanitize_title(get_the_title()); ?>-details-list">
						<?php if($pccpp_sco_address){ ?>
						<li>
							<h3>Campus Address:</h3>
							<span class="text"><?php echo $pccpp_sco_address; ?></span>
						</li>
						<?php } ?>
						<?php if($pccpp_sco_city){ ?>
						<li>
							<h3>Campus City:</h3>
							<span class="text"><?php echo $pccpp_sco_city; ?></span>
						</li>
						<?php } ?>
						<?php if($pccpp_sco_telephone){ 
							$phone = $pccpp_sco_telephone;
							$phone_link = preg_replace( '/[^0-9]/', '', $phone );
							?>
						<li>
							<h3>Telephone:</h3>
							<span class="text"><a
									href="tel:+<?php echo $phone_link; ?>"><?php echo $pccpp_sco_telephone; ?></a></span>
						</li>
						<?php } ?>
						<?php if($pccpp_sco_email){ ?>
						<li>
							<h3>Email:</h3>
							<span class="text"><a
									href="mailto:<?php echo $pccpp_sco_email; ?>"><?php echo $pccpp_sco_email; ?></a></span>
						</li>
						<?php } ?>
						<?php if($pccpp_sco_fax){ ?>
						<li>
							<h3>Fax:</h3>
							<span class="text"><?php echo $pccpp_sco_fax; ?></span>
						</li>
						<?php } ?>
					</ul>
					<?php } ?>

				</div>
			</div>
			<?php } ?>
		</div>
	</section>
</div>
