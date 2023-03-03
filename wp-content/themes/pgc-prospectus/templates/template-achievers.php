<?php
/**
 * Template Name: High Achievers
 * Template Post Type: page
 *
 * This template is for displaying high achievers page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package PGC Prospective 2023
 * @since 1.0.0
 *
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

$all_years = get_terms([
	'taxonomy' => 'achievers-year',
	'hide_empty' => false,
	'orderby' => 'name',
	'order' => 'DESC'
]);
$all_boards = get_terms([
	'taxonomy' => 'achievers-board',
	'hide_empty' => false,
	'orderby' => 'name',
	'order' => 'ASC'
]);


?>

<!-- Subpage Visual -->
<section class="visual-section subpage-visual">
	<div class="container">
		<div class="textbox">
			<h1><?php echo the_title(); ?></h1>
		</div>
	</div>
</section>

<!-- Section Achievers -->
<section class="section-achievers">
	<div class="container">
		<header class="achievers-header">
			<div class="header-top">
				<h3>High Achievers</h3>
				<form class="form-holder">
					<div class="form-frame">
						<?php if($all_years){ ?>
						<div class="input-holder">
							<div class="custom-select">
								<select>
									<option>Select Year</option>
									<?php foreach ($all_years as $year ) { ?>
									<option value="<?php echo $year->slug; ?>"><?php echo $year->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<?php } ?>
						<?php if($all_years){ ?>
						<div class="input-holder">
							<div class="custom-select">
								<select>
									<option>Select Board</option>
									<?php foreach ($all_boards as $board ) { ?>
									<option value="<?php echo $board->slug; ?>"><?php echo $board->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<?php } ?>
						<div class="btn-submit">
							<button type="button" class="btn btn-primary btn-sm">Search</button>
						</div>
					</div>
				</form>
			</div>
			<h2>Top Positions 2019</h2>
		</header>
		<?php
			// WP_Query arguments
			global $paged;
			$args = array(
				'post_type'              => array( 'achiever' ),
				'posts_per_page'         => -1, //how many posts you need
				'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
			);
			// The Query
			$query = new WP_Query( $args );
			// The Loop
			if ( $query->have_posts() ) {
		?>
		<div class="block-achievers tab-content-holder">
			<div class="achievers-content">
				<div class="row-block">
					<?php while ( $query->have_posts() ) {
						$query->the_post();
						$pID         = $post->ID;
						$post_fields = get_fields( $pID );
						$pgcpp_sao_degree  = $post_fields['pgcpp_sao_degree'];
						$pgcpp_sao_position  = $post_fields['pgcpp_sao_position'];
						$pgcpp_sao_marks  = $post_fields['pgcpp_sao_marks'];
						$pgcpp_sao_total_marks  = $post_fields['pgcpp_sao_total_marks'];
						$achiever_year = wp_get_object_terms($post->ID, 'achievers-year');
						
						$achiever_board = wp_get_object_terms($post->ID, 'achievers-board');
						foreach ($achiever_board as $board ) {
							$current_board = $board;
							break;
						}
						if(!$current_board){
							$current_board = null;
						}
						$src         = wp_get_attachment_image_src( get_post_thumbnail_id( $pID ), 'thumb_achiever', false );
						if ( ! $src ) {
							$src = get_template_directory_uri() . '/assets/images/default-avatar.webp';
						} else {
							$src = $src[0];
						}
						?>
					<article class="col-block-3 box-achiever">
						<div class="box-holder">
							<div class="box-frame">
								<span class="board-name"><?php echo $current_board->name; ?></span>
								<div class="img-profile">
									<img src="<?php echo $src; ?>" alt="<?php the_title(); ?>">
								</div>
								<strong class="name"><?php the_title(); ?></strong>
								<span class="course"><?php echo $pgcpp_sao_degree; ?></span>
								<strong class="marks">Marks
									<?php echo $pgcpp_sao_marks; ?>/<?php echo $pgcpp_sao_total_marks; ?></strong>
							</div>
							<div class="box-footer">
								<strong class="position"><?php echo $pgcpp_sao_position; ?></strong>
							</div>
						</div>
					</article>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</section>

<?php while ( have_posts() ) { the_post();
	//Include specific template for the content.
	get_template_part( 'partials/content', 'page' );

} ?>

<?php get_footer();
