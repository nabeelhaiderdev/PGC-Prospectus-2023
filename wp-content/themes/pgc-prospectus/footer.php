<?php
/**
 * The template for displaying website footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PGC Prospectus 2023
 * @since 1.0.0
 */
// Global variables
global $option_fields;
global $pID;
global $fields;

$pID = get_the_ID();

if ( is_home() ) {
	$pID = get_option( 'page_for_posts' );
}

if ( is_404() || is_archive() || is_category() || is_search() ) {
	$pID = get_option( 'page_on_front' );
}

if ( function_exists( 'get_fields' ) && function_exists( 'get_fields_escaped' ) ) {
	$option_fields = get_fields_escaped( 'option' );
	$fields        = get_fields_escaped( $pID );
}
?> <?php

// Default Footer Options

$footer_scripts = ( isset( $option_fields['footer_scripts'] ) ) ? $option_fields['footer_scripts'] : null;


// Schema Markup - ACF variables.

$pgcpp_schema_check = $option_fields['pgcpp_schema_check'];
if ( $pgcpp_schema_check ) {
	$pgcpp_schema_business_name       = html_entity_remove( $option_fields['pgcpp_schema_business_name'] );
	$pgcpp_schema_business_legal_name = html_entity_remove( $option_fields['pgcpp_schema_business_legal_name'] );
	$pgcpp_schema_street_address      = html_entity_remove( $option_fields['pgcpp_schema_street_address'] );
	$pgcpp_schema_locality            = html_entity_remove( $option_fields['pgcpp_schema_locality'] );
	$pgcpp_schema_region              = html_entity_remove( $option_fields['pgcpp_schema_region'] );
	$pgcpp_schema_postal_code         = html_entity_remove( $option_fields['pgcpp_schema_postal_code'] );
	$pgcpp_schema_map_short_link      = html_entity_remove( $option_fields['pgcpp_schema_map_short_link'] );
	$pgcpp_schema_latitude            = html_entity_remove( $option_fields['pgcpp_schema_latitude'] );
	$pgcpp_schema_longitude           = html_entity_remove( $option_fields['pgcpp_schema_longitude'] );
	$pgcpp_schema_opening_hours       = html_entity_remove( $option_fields['pgcpp_schema_opening_hours'] );
	$pgcpp_schema_telephone           = html_entity_remove( $option_fields['pgcpp_schema_telephone'] );
	$pgcpp_schema_business_email      = html_entity_remove( $option_fields['pgcpp_schema_business_email'] );
	$pgcpp_schema_business_logo       = html_entity_remove( $option_fields['pgcpp_schema_business_logo'] );
	$pgcpp_schema_price_range         = html_entity_remove( $option_fields['pgcpp_schema_price_range'] );
	$pgcpp_schema_type                = html_entity_remove( $option_fields['pgcpp_schema_type'] );
}

// Custom - ACF variables.
$pgcpp_ftrop_contact = ( isset( $option_fields['pgcpp_ftrop_contact'] ) ) ? $option_fields['pgcpp_ftrop_contact'] : null;
$pgcpp_ftrop_copyright = html_entity_decode( $option_fields['pgcpp_ftrop_copyright'] );
$pgcpp_social_fb       = ( isset( $option_fields['pgcpp_social_fb'] ) ) ? $option_fields['pgcpp_social_fb'] : null;
$pgcpp_social_tw       = ( isset( $option_fields['pgcpp_social_tw'] ) ) ? $option_fields['pgcpp_social_tw'] : null;
$pgcpp_social_yt       = ( isset( $option_fields['pgcpp_social_yt'] ) ) ? $option_fields['pgcpp_social_yt'] : null;
$pgcpp_social_in       = ( isset( $option_fields['pgcpp_social_in'] ) ) ? $option_fields['pgcpp_social_in'] : null;

?>
<?php get_template_part( 'partials/cta' ); ?> </main>
<footer id="footer-section" class="footer-section">
	<!-- Footer of the page -->
	<footer class="footer">
		<div class="pri-footer">
			<div class="container container-large">
				<strong class="logo">
					<a href="<?php echo home_url(); ?>"><img
							src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.svg"
							width="151" height="80" alt="Punjab Colleges"></a>
				</strong>
				<?php if($pgcpp_ftrop_contact){ ?>
				<ul class="additional-info">
					<?php foreach($pgcpp_ftrop_contact as $contact){
						$contact_title = $contact['title'];
						$contact_value = $contact['value'];
						$contact_type = $contact['type'];
						if($contact_type == 'Phone'){
							$contact_value = preg_replace( '/[^0-9]/', '', $contact_value );
							// $contact_value = int($contact_value);
							$contact_link = 'tel:' . $contact_value;
						} elseif($contact_type == 'Whatsapp'){
							$contact_value = preg_replace( '/[^0-9]/', '', $contact_value );
							// $contact_value = int($contact_value);
							$contact_link = 'https://wa.me/+92' . $contact_value;
						} else{
							$contact_link = 'mailto:'. $contact_value;
						}
						?>
					<li>
						<strong class="title"><?php echo $contact_title; ?></strong>
						<span class="text"><a
								href="<?php echo $contact_link; ?>"><?php echo $contact_value; ?></a></span>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
		</div>
		<div class="sec-footer">
			<div class="container">
				<ul class="social-networks">
					<?php if($pgcpp_social_fb){ ?>
					<li><a href="<?php echo $pgcpp_social_fb; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
					</li>
					<?php } ?>
					<?php if($pgcpp_social_in){ ?>
					<li><a href="<?php echo $pgcpp_social_in; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
					</li>
					<?php } ?>
					<?php if($pgcpp_social_tw){ ?>
					<li><a href="<?php echo $pgcpp_social_tw; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
					</li>
					<?php } ?>
					<?php if($pgcpp_social_yt){ ?>
					<li><a href="<?php echo $pgcpp_social_yt; ?>" target="_blank"><i class="fab fa-youtube"></i></a>
					</li>
					<?php } ?>
				</ul>
				<div class="footer-copyrights">
					<p><?php echo date('Y') . " " . $pgcpp_ftrop_copyright; ?></p>
				</div>
			</div>
		</div>
	</footer>
	<?php
	if ( $pgcpp_schema_check ) {
		?>
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "<?php echo $pgcpp_schema_type; ?>",
		"address": {
			"@type": "PostalAddress",
			"addressLocality": "<?php echo $pgcpp_schema_locality; ?>",
			"addressRegion": "<?php echo $pgcpp_schema_region; ?>",
			"postalCode": "<?php echo $pgcpp_schema_postal_code; ?>",
			"streetAddress": "<?php echo $pgcpp_schema_street_address; ?>"
		},
		"hasMap": "<?php echo $pgcpp_schema_map_short_link; ?>",
		"geo": {
			"@type": "GeoCoordinates",
			"latitude": "<?php echo $pgcpp_schema_latitude; ?>",
			"longitude": "<?php echo $pgcpp_schema_longitude; ?>"
		},
		"name": "<?php echo $pgcpp_schema_business_name; ?>",
		"openingHours": "<?php echo $pgcpp_schema_opening_hours; ?>",
		"telephone": "<?php echo $pgcpp_schema_telephone; ?>",
		"email": "<?php echo $pgcpp_schema_business_email; ?>",
		"url": "<?php echo esc_url( home_url() ); ?>",
		"image": "<?php echo $pgcpp_schema_business_logo; ?>",
		"legalName": "<?php echo $pgcpp_schema_business_legal_name; ?>",
		"priceRange": "<?php echo $pgcpp_schema_price_range; ?>"
	}
	</script> <?php } ?>
</footer> <?php wp_footer(); ?> <?php
if ( $footer_scripts != '' ) {
	?>
<div style="display: none;">
	<?php echo html_entity_decode( $footer_scripts, ENT_QUOTES ); ?> </div> <?php } ?> </body>

</html>
