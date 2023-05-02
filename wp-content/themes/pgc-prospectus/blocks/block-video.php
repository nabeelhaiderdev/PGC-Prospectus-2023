<?php
/**
 * Block Name: Video
 *
 * The template for displaying the custom gutenberg block named video.
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

// Block variables
// $custom_field_of_block = html_entity_decode($block_fields['custom_field_of_block']); // for keeping html from input
// $custom_field_of_block = html_entity_remove($block_fields['custom_field_of_block']); // for removing html from input

$pgcpp_blk_vd_title = ( isset( $block_fields['pgcpp_blk_vd_title'] ) ) ? $block_fields['pgcpp_blk_vd_title'] : null;
$pgcpp_blk_vd_video_file = ( isset( $block_fields['pgcpp_blk_vd_video_file'] ) ) ? $block_fields['pgcpp_blk_vd_video_file'] : null;
$pgcpp_blk_vd_videourlvideo_type = ( isset( $block_fields['pgcpp_blk_vd_videourlvideo_type'] ) ) ? $block_fields['pgcpp_blk_vd_videourlvideo_type'] : null;
$pgcpp_blk_vd_videourl = ( isset( $block_fields['pgcpp_blk_vd_videourl'] ) ) ? $block_fields['pgcpp_blk_vd_videourl'] : null;
$pgcpp_blk_vd_url = ( isset( $block_fields['pgcpp_blk_vd_url'] ) ) ? $block_fields['pgcpp_blk_vd_url'] : null;

function getYoutubeEmbedUrl($url)
{
     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

	 $youtube_id = null;
    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id . '?rel=0';
}

$pgcpp_blk_vd_videourl = getYoutubeEmbedUrl($pgcpp_blk_vd_videourl);


?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- E Learning Block -->
	<section class="learning-block">
		<div class="container">
			<?php if($pgcpp_blk_vd_title){ ?>
			<h2><?php echo $pgcpp_blk_vd_title; ?></h2>
			<?php } ?>

			<?php if($pgcpp_blk_vd_videourlvideo_type == 'youtube'){ ?>
			<?php if($pgcpp_blk_vd_videourl){ ?>
			<div class="video-block">
				<iframe width="560" height="315" src="<?php echo $pgcpp_blk_vd_videourl; ?>"
					title="YouTube video player"
					allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
					allowfullscreen></iframe>
			</div>
			<?php } ?>
			<?php } elseif($pgcpp_blk_vd_videourlvideo_type == 'upload') { ?>
			<div class="video-block">
				<video id='video' controls="controls" preload='none' width="100%"
					poster="http://pgc21.azurewebsites.net/prospectus/wp-content/uploads/2023/03/Video-Posts-PGC-Prospectus.jpg">
					<source id='mp4' src="<?php echo $pgcpp_blk_vd_video_file; ?>" type='video/mp4'>
				</video>
			</div>
			<?php } else { ?>
			<div class="video-block">
				<video id='video' controls="controls" preload='none' width="100%"
					poster="http://pgc21.azurewebsites.net/prospectus/wp-content/uploads/2023/03/Video-Posts-PGC-Prospectus.jpg">
					<source id='mp4' src="<?php echo $pgcpp_blk_vd_url; ?>" type='video/mp4'>
				</video>
			</div>
			<?php } ?>
	</section>
</div>
