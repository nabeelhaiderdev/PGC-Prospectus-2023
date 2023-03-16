<?php
/**
 * Block Name: Media Grid
 *
 * The template for displaying the custom gutenberg block named Media Grid.
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
$pgcpp_blk_mg_title = ( isset( $block_fields['pgcpp_blk_mg_title'] ) ) ? $block_fields['pgcpp_blk_mg_title'] : null;
$pgcpp_blk_mg_grid_type = ( isset( $block_fields['pgcpp_blk_mg_grid_type'] ) ) ? $block_fields['pgcpp_blk_mg_grid_type'] : null;
$pgcpp_blk_mg_title = ( isset( $block_fields['pgcpp_blk_mg_title'] ) ) ? $block_fields['pgcpp_blk_mg_title'] : null;
$pgcpp_blk_mg_button = ( isset( $block_fields['pgcpp_blk_mg_button'] ) ) ? $block_fields['pgcpp_blk_mg_button'] : null;


?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<?php if($pgcpp_blk_mg_grid_type == 'simple'){ ?>
	<?php $pgcpp_blk_md_media = ( isset( $block_fields['pgcpp_blk_md_media'] ) ) ? $block_fields['pgcpp_blk_md_media'] : null;	?>

	<!-- Campus Section -->
	<section class="campus-block additionl-styles">
		<div class="container">
			<header class="campus-head">
				<h2><?php echo $pgcpp_blk_mg_title; ?></h2>
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
						$video_box_class = null;
					}
					?>
				<div class="filter-item mix <?php echo $video_box_class; ?>">
					<a href="<?php echo $href_link; ?>" data-fancybox="gallery">
						<?php echo wp_get_attachment_image( $media_image, 'full' ); ?>
						<span class="btn-play"><i class="fas fa-play"></i></span>
					</a>
				</div>
				<?php } ?>
			</div>
			<?php }	?>
		</div>
	</section>

	<?php } else { 
		$pgcpp_blk_mg_allposts = ( isset( $block_fields['pgcpp_blk_mg_allposts'] ) ) ? $block_fields['pgcpp_blk_mg_allposts'] : null;
		$pgcpp_blk_mg_clposts = ( isset( $block_fields['pgcpp_blk_mg_clposts'] ) ) ? $block_fields['pgcpp_blk_mg_clposts'] : null;
		
		$terms = get_terms([
			'taxonomy' => 'campuslife-category',
			'hide_empty' => false,
		]);
	
	
	?>
	<!-- Campus Section -->
	<section class="campus-block additionl-styles">
		<div class="container">
			<header class="campus-head">
				<h2>campus Life</h2>

				<div class="filter-controls">
					<div class="slick-slide">
						<button type="button" data-filter="all">All</button>
					</div>
					<?php foreach ($terms as $term ) { ?>
					<div class="slick-slide">
						<button type="button"
							data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
					</div>
					<?php } ?>

				</div>
			</header>
			<div class="filters-container">

				<?php 

			if($pgcpp_blk_mg_allposts){
				global $paged;
				$args = array(
					'post_type'              => array( 'campus-life' ),
					'posts_per_page'         => -1, //how many posts you need
					'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
				);
				// The Query
				$query = new WP_Query( $args );
				// The Loop
				if ( $query->have_posts() ) {
					while($query->have_posts()){
						$query->the_post();
						$pID         = get_the_ID();
						$post_fields = get_fields( $pID );
						$pgcpp_sclo_video_url  = $post_fields['pgcpp_sclo_video_url'];
						if ( has_post_thumbnail() ) {
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );
							$image_url = $image_url[0];
						} else {
							$image_url = null;
						}
						if($pgcpp_sclo_video_url){
							$achor_link = $pgcpp_sclo_video_url;
							$video_class = ' video-box ';
						} else {
							$video_class = null;
							$achor_link = $image_url;
						}
						$campuslife_cats = get_the_terms( get_the_ID() , 'campuslife-category' );
						// echo "<pre>";
						// var_dump($campuslife_cats);
						// echo "</pre>";

						$cat_classes = null;
						foreach ($campuslife_cats as $cat) {
							$cat_classes = $cat_classes . " " . $cat->slug;
						}
				?>

				<div class="filter-item mix <?php echo $video_class; ?> <?php echo $cat_classes; ?> ">
					<a href="<?php echo $achor_link; ?>" data-fancybox="gallery">
						<?php the_post_thumbnail('full'); ?>
						<span class="btn-play"><i class="fas fa-play"></i></span>
					</a>
				</div>

				<?php
				}
				
			} else {

			global $post;
			$lp_select_posts = array();
			$lp_select_posts = $block_fields['pgcpp_blk_mg_clposts'];
			if ( $lp_select_posts ) {
				foreach ( $lp_select_posts as $lp_posts ) {
					$post = $lp_posts;
					setup_postdata( $post );
					$pID         = $post->ID;
					$post_fields = get_fields( $pID );
					$pgcpp_sclo_video_url  = $post_fields['pgcpp_sclo_video_url'];
					if ( has_post_thumbnail() ) {
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );
						$image_url = $image_url[0];
					} else {
						$image_url = null;
					}
					if($pgcpp_sclo_video_url){
						$achor_link = $pgcpp_sclo_video_url;
						$video_class = ' video-box ';
					} else {
						$video_class = null;
						$achor_link = $image_url;
					}
					$campuslife_cats = get_the_terms( $post->ID , 'campuslife-category' );
					// echo "<pre>";
					// var_dump($campuslife_cats);
					// echo "</pre>";

					$cat_classes = null;
					foreach ($campuslife_cats as $cat) {
						$cat_classes = $cat_classes . " " . $cat->slug;
					}
			?>
				<div class="filter-item mix <?php echo $video_class; ?> <?php echo $cat_classes; ?> ">
					<a href="<?php echo $achor_link; ?>" data-fancybox="gallery">
						<?php the_post_thumbnail('full'); ?>
						<span class="btn-play"><i class="fas fa-play"></i></span>
					</a>
				</div>
				<?php } } } wp_reset_query(); ?>
			</div>
		</div>
		<div class="btn-block">
			<?php
				if( $pgcpp_blk_mg_button ) :
					echo glide_acf_button( $pgcpp_blk_mg_button, 'btn btn-primary' );
				endif;
			?>
		</div>
	</section>
	<?php } ?>
	<?php } ?>


</div>
