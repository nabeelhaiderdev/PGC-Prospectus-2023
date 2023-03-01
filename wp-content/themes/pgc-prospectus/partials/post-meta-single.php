<?php
/**
 * Template part for displaying content of about us page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package PGC Prospective 2023
 * @since 1.0.0
 *
 */

$pID = get_the_ID();
$author_id = $post->post_author;

// Post ACf fields
// Author profile image
if (function_exists('get_field') ) {
	$pgcpp_author_avatar = get_field('pgcpp_author_avatar', 'user_'.$author_id);
}

if(!$pgcpp_author_avatar){
	$pgcpp_author_avatar =  get_avatar_url($author_id);
}

// Get author name with fallback to display name
 if ( get_the_author_meta( 'first_name', $author_id ) || get_the_author_meta( 'last_name', $author_id ) ) {
	$pgcpp_author_name = get_the_author_meta( 'first_name', $author_id ) . ' ' . get_the_author_meta( 'last_name', $author_id );
} else if ( get_the_author_meta( 'display_name', $author_id ) ) {
	$pgcpp_author_name = get_the_author_meta( 'display_name', $author_id );
}

// Post Tags & Categories
$pgcpp_post_tags = get_the_tags($pID);
$pgcpp_post_categories = get_categories($pID);

?>

	<div class="post-box-meta">
		<div class="post-author-ctn d-flex">
			<?php if($pgcpp_author_avatar){ ?>
				<div class="post-author-img"
					style="background-image: url(<?php echo $pgcpp_author_avatar; ?>); width:50px; height:50px; background-size:cover">
				</div>
			<?php } ?>
			<div class="author-meta">
				<?php if($pgcpp_author_name){ ?>
					<div class="post-author-name">By: <?php echo $pgcpp_author_name; ?></div>
				<?php } ?>
				<div class="post-meta-date"><?php the_time( project_dtformat ); ?></div>
			</div>
		</div>
	</div>
