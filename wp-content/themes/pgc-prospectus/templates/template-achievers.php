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
								<select class="achiever-ajaxfilter-element" id="achiever-year-element">
									<option value="*">Select Year</option>
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
								<select class="achiever-ajaxfilter-element" id="achiever-board-element">
									<option value="*">All Boards</option>
									<?php foreach ($all_boards as $board ) { ?>
									<option value="<?php echo $board->slug; ?>"><?php echo $board->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<?php } ?>
						<div class="btn-submit">
							<button type="button" id="achiever-year-element-button"
								class="btn btn-primary btn-sm">Search</button>
						</div>
					</div>
				</form>
			</div>
			<h2>Top Positions <mySpan id="high-achievers-archive-year">2019 </mySpan>
				<mySpan id="high-achievers-archive-board">Punjab</mySpan>
			</h2>
		</header>

		<div class="block-achievers tab-content-holder">
			<div class="achievers-content">
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
				<?php

					$taxonomy_args = array(
						'taxonomy' => 'achievers-board', 
						'hide_empty' => 0,
						'hierarchical' => 1,
						'parent' => 0,
						'orderby'=>'name',
						'order' => 'ASC',
						'fields' => 'ids',
					);
					$taxonomy_terms = get_terms('achievers-board', $taxonomy_args);

					$tax_count = count($taxonomy_terms);
					$current_tax_count = 0;
					foreach ($taxonomy_terms as $term_query ) {
						$current_tax_count++;

					// $tax_query = array(
					// 	array(
					// 		'taxonomy' => 'achievers-board', // Replace with your taxonomy name
					// 		'field' => 'term_id',
					// 		'terms' => $term_query // Replace with your term ID
					// 	)
					// );

					$args = array(
						'post_type' => 'achiever', // Replace with your post type
						// 'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'achievers-board', // Replace with your taxonomy name
								'field' => 'term_id',
								'terms' => $term_query // Replace with your term ID
							)
						),
						'meta_key'          => 'pgcpp_sao_position',
						'orderby'           => 'meta_value',
						'order'             => 'ASC',
						'meta_type' => 'CHAR', // Optional, if your meta field is not a number
					);
					// The Query
					$query = new WP_Query( $args );
					// The Loop
					if ( $query->have_posts() ) {
				?>

				<?php if($current_tax_count == 1){ ?>
				<div class="row-block" id="achiever-ajax-results">
					<?php } ?>

					<?php while ( $query->have_posts() ) {
						$query->the_post();
						$pID         = $post->ID;
						$post_fields = get_fields( $pID );
						$pgcpp_sao_degree  = $post_fields['pgcpp_sao_degree'];
						$pgcpp_sao_position  = $post_fields['pgcpp_sao_position'];
						if($pgcpp_sao_position == 'first'){
							$pgcpp_sao_position_text = '1st ';
						} elseif($pgcpp_sao_position == 'second'){
							$pgcpp_sao_position_text = '2nd ';
						} elseif($pgcpp_sao_position == 'third'){
							$pgcpp_sao_position_text = '3rd ';
						}
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
						$src         = wp_get_attachment_image_src( get_post_thumbnail_id( $pID ), 'full', false );
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
								<?php if($pgcpp_sao_marks){ ?>
								<strong class="marks">Marks
									<?php echo $pgcpp_sao_marks; ?>/<?php echo $pgcpp_sao_total_marks; ?></strong>
								<?php } ?>
							</div>
							<?php if($pgcpp_sao_position != 'None'){ ?>
							<div class="box-footer">
								<strong class="position"><?php echo $pgcpp_sao_position_text; ?> Position</strong>
							</div>
							<?php } ?>
						</div>
					</article>
					<?php } ?>
					<?php if($current_tax_count == $tax_count){ ?>
				</div>
				<?php } ?>
				<?php }  wp_reset_postdata();  wp_reset_query(); ?>
				<?php  } ?>
			</div>
		</div>
	</div>
</section>

<?php while ( have_posts() ) { the_post();
	//Include specific template for the content.
	get_template_part( 'partials/content', 'page' );

} ?>

<?php get_footer();
