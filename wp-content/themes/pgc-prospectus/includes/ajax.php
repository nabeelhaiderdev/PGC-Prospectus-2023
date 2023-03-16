<?php
/**
 * Ajax related functions
 *
 * @link https://codex.wordpress.org/AJAX#Ajax_in_WordPress
 *
 * @package PGC Prospective 2023
 * @since 1.0.0
 *
 */

 
function achiever_ajax_filter()
{
	$response = array();
	$html = $achiever_current_year = $achiever_board = null;
	if (isset($_POST['items'][0])) {
		$achiever_current_year = $_POST['items'][0];
		// $achiever_current_year = $achiever_current_year[0];
	} else {
		$achiever_current_year = null;
	}

	
	if (isset($_POST['items'][1])) {
		$achiever_current_board = $_POST['items'][1];
	} else {
		$achiever_current_board = null;
	}
	// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	if($achiever_current_year != '*' && $achiever_current_board != '*'){
		$news_args = array(
			'post_type'              => array( 'achiever' ),
			'posts_per_page'         => -1, //how many posts you need
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'achievers-board',
					'field'    => 'slug',
					'terms'    => $achiever_current_board
				),
				array(
					'taxonomy' => 'achievers-year',
					'field'    => 'slug',
					'terms'    => $achiever_current_year
				)
			)
		);
	} elseif($achiever_current_year != '*' && $achiever_current_board == '*'){ 
		$news_args = array(
			'post_type'              => array( 'achiever' ),
			'posts_per_page'         => -1, //how many posts you need
			'tax_query' => array(
				array(
					'taxonomy' => 'achievers-year',
					'field'    => 'slug',
					'terms'    => $achiever_current_year
				),
			)
		);
	} elseif($achiever_current_year == '*' && $achiever_current_board != '*'){ 
		$news_args = array(
			'post_type'              => array( 'achiever' ),
			'posts_per_page'         => -1, //how many posts you need
			'tax_query' => array(
				array(
					'taxonomy' => 'achievers-board',
					'field'    => 'slug',
					'terms'    => $achiever_current_board
				),
			)
		);
	} else {
		$news_args = array(
			'post_type'              => array( 'achiever' ),
			'posts_per_page'         => -1, //how many posts you need
		);
	}
	// The Query
	$news_query = new WP_Query($news_args);
	if ( $news_query->have_posts() ) {
		while ( $news_query->have_posts() ) {
			$news_query->the_post();
			$pID         = get_the_ID();
			$post_fields = get_fields( $pID );
			$pgcpp_sao_degree  = $post_fields['pgcpp_sao_degree'];
			$pgcpp_sao_position  = $post_fields['pgcpp_sao_position'];
			$pgcpp_sao_marks  = $post_fields['pgcpp_sao_marks'];
			$pgcpp_sao_total_marks  = $post_fields['pgcpp_sao_total_marks'];
			$achiever_year = wp_get_object_terms($pID, 'achievers-year');
			
			$achiever_board = wp_get_object_terms($pID, 'achievers-board');
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


			$html .= '<article class="col-block-3 box-achiever">';
				$html .= '<div class="box-holder">
					<div class="box-frame">
						<span class="board-name"> '.$current_board->name.' </span>
						<div class="img-profile">
							<img src="'.$src.'" alt="">
						</div>
						<strong class="name">'. get_the_title().'</strong>
						<span class="course">'.$pgcpp_sao_degree.'</span>
						<strong class="marks">Marks '.$pgcpp_sao_marks.'/'.$pgcpp_sao_total_marks.'</strong>
					</div>
					<div class="box-footer">
						<strong class="position">'.$pgcpp_sao_position. ' Position</strong>
					</div>
				</div>
			</article> ';

		}
	} else {

		$html .= '<article class="col-block-3 box-achiever nothing-found-container"><div class="box-holder"><h4>No results for your current search please try different input from top filters.</h4></div></article>';
	}


	$response['html'] = $html;
	echo json_encode( $response );
	wp_die();
}
add_action( 'wp_ajax_nopriv_achiever_ajax_filter', 'achiever_ajax_filter' );
add_action( 'wp_ajax_achiever_ajax_filter', 'achiever_ajax_filter' );
