<?php
/**
 * Block Name: High Achievers
 *
 * The template for displaying the custom gutenberg block named high achievers.
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
$pgcpp_blk_ha_title = ( isset( $block_fields['pgcpp_blk_ha_title'] ) ) ? $block_fields['pgcpp_blk_ha_title'] : null;
$pgcpp_blk_ha_achievers_year = ( isset( $block_fields['pgcpp_blk_ha_achievers_year'] ) ) ? $block_fields['pgcpp_blk_ha_achievers_year'] : null;
$pgcpp_blk_ha_button = ( isset( $block_fields['pgcpp_blk_ha_button'] ) ) ? $block_fields['pgcpp_blk_ha_button'] : null;


?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Section Achievers -->
	<section class="section-achievers section">
		<div class="container">
			<h2><?php echo $pgcpp_blk_ha_title; ?></h2>
			<?php if($pgcpp_blk_ha_achievers_year){ 
				$years_count = 0;
				?>
			<ul class="tabs-listing" id="tabs-nav">
				<?php foreach ($pgcpp_blk_ha_achievers_year as $year ) {
					$years_count++;
					if($years_count == 1){
						$current_active_class = ' active ';
					} else {
						$current_active_class = null;
					}
					?>
				<li class="<?php echo $current_active_class; ?>"><a
						href="#tab-<?php echo $year->slug; ?>"><?php echo $year->name; ?></a></li>
				<?php } ?>
			</ul>
			<?php } ?>
			<div class="block-achievers tab-content-holder">
				<?php foreach ($pgcpp_blk_ha_achievers_year as $year ) { ?>
				<div id="tab-<?php echo $year->slug; ?>" class="tab-content">
					<div class="row-block">
						<?php
						$args_year_posts = array(
						'post_type' => 'achiever',
							'tax_query' => array(
								array(
									'taxonomy' => 'achievers-year',
									'field' => 'term_id',
									'terms' => $year->term_id
								),
							),
						'posts_per_page'         => 8, //how many posts you need
						);
						
						$query_year_posts = new WP_Query( $args_year_posts );
						if ( $query_year_posts->have_posts() ) {
							while ( $query_year_posts->have_posts() ) {
								$query_year_posts->the_post();
								$pID         = get_the_ID();
								$post_fields = get_fields( $pID );
								$pgcpp_sao_degree  = $post_fields['pgcpp_sao_degree'];
								$pgcpp_sao_position  = $post_fields['pgcpp_sao_position'];
								$pgcpp_sao_marks  = $post_fields['pgcpp_sao_marks'];
								$pgcpp_sao_total_marks  = $post_fields['pgcpp_sao_total_marks'];
								$src         = wp_get_attachment_image_src( get_post_thumbnail_id( $pID ), 'full', false );
								if ( ! $src ) {
									$src = get_template_directory_uri() . '/assets/images/default-avatar.webp';
								} else {
									$src = $src[0];
								}
								$boards = get_the_terms( get_the_ID() , 'achievers-board' );
								foreach ($boards as $board ) {
									$board_name = $board->name;
									break;
								}
						?>
						<article class="col-block-3 box-achiever">
							<div class="box-holder">
								<div class="box-frame">
									<span class="board-name"><?php echo $board_name; ?></span>
									<div class="img-profile">
										<img src="<?php echo $src; ?>" alt="<?php the_title(); ?>">
									</div>
									<strong class="name"><?php the_title(); ?></strong>
									<span class="course"><?php echo $pgcpp_sao_degree; ?></span>
									<?php if($pgcpp_sao_marks){ ?>
									<strong class="marks">Marks
										<?php echo $pgcpp_sao_marks; ?>/<?php echo $pgcpp_sao_total_marks; ?></strong>
									<?php } ?>
								</div>
								<div class="box-footer">
									<strong class="position"><?php echo $pgcpp_sao_position; ?> Position</strong>
								</div>
							</div>
						</article>
						<?php } 
						} ?>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="btn-block">
				<?php
					if( $pgcpp_blk_ha_button ) :
						echo glide_acf_button( $pgcpp_blk_ha_button, 'btn btn-primary' );
					endif;
				?>
			</div>
		</div>

	</section>
</div>
