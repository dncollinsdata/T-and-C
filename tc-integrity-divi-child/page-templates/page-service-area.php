<?php
/**
 * Template Name: Service Area Page
 * Description: SEO and AEO optimized service area landing page for T&C Integrity.
 *
 * @package TC_Integrity_Divi_Child
 */

get_header();

// Get the location slug from page meta or derive from slug
$location_slug = get_post_meta( get_the_ID(), '_tc_location_slug', true );
if ( ! $location_slug ) {
	$location_slug = basename( get_permalink() );
}

$location = tc_get_location( $location_slug );
if ( ! $location ) {
	$location = tc_get_location( 'houston' ); // fallback
}

$city      = $location['name'];
$state     = 'TX';
$county    = $location['county'];
$nearby    = $location['nearby'];
$hoods     = $location['neighborhoods'];
$landmarks = $location['landmarks'];
$phone     = $location['phone'];

// Build FAQ data for schema
$faqs = array(
	array(
		'question' => "How much does eviction junk removal cost in {$city}, TX?",
		'answer'   => "Eviction junk removal pricing in {$city} depends on the volume of items, property size, and services needed. T&C Integrity provides free, no-obligation on-site estimates with transparent, upfront pricing. Most single-unit eviction cleanouts range from \$300-\$1,500 depending on scope. We never charge hidden fees.",
	),
	array(
		'question' => "How fast can you do an eviction cleanout in {$city}?",
		'answer'   => "T&C Integrity offers same-day and next-day eviction cleanout service in {$city}, TX. Most single-unit cleanouts are completed within 24-48 hours of booking. For urgent situations, call us directly for priority scheduling.",
	),
	array(
		'question' => "Do you offer deep cleaning after junk removal in {$city}?",
		'answer'   => "Yes. T&C Integrity is one of the few companies in {$city} that offers both junk removal and professional deep cleaning as a combined service. This means one team, one schedule, and one invoice — saving property managers time and money while ensuring the unit is completely turnover-ready.",
	),
	array(
		'question' => "What areas of {$city} do you serve?",
		'answer'   => "T&C Integrity serves all of {$city}, TX and surrounding areas in {$county}. This includes " . implode( ', ', array_slice( $hoods, 0, 6 ) ) . ", and more. We also serve nearby cities including " . implode( ', ', $nearby ) . ".",
	),
	array(
		'question' => "Are you licensed and insured for junk removal in {$city}, TX?",
		'answer'   => "Absolutely. T&C Integrity & Reliable Trash Services is fully licensed, bonded, and insured with general liability and workers' compensation coverage. All crew members are background-checked and professionally trained.",
	),
	array(
		'question' => "What do you do with items removed from {$city} properties?",
		'answer'   => "T&C Integrity is committed to eco-friendly disposal. We donate usable items to local {$city} charities and shelters, recycle materials at appropriate facilities, and only send items to the landfill as a last resort. We provide disposal documentation upon request.",
	),
	array(
		'question' => "Do you work with property management companies in {$city}?",
		'answer'   => "Yes — property managers are among our primary clients in {$city}. We offer volume discounts for multiple units, priority scheduling, before/after photo documentation, and dedicated account support for property management companies throughout {$county}.",
	),
);

// Output schema
tc_location_schema( $location_slug, $faqs );
?>

<div id="main-content" class="tc-service-area-page">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php
		// If using Divi Builder, let it render
		if ( function_exists( 'et_builder_enabled_for_post' ) && et_builder_enabled_for_post( get_the_ID() ) ) {
			the_content();
		} else {
			// Fallback static content for non-Divi pages
			?>
			<div class="tc-hero-section" style="background:linear-gradient(135deg,rgba(27,94,32,0.9),rgba(46,125,50,0.8));padding:100px 20px;text-align:center;">
				<div class="tc-hero-content">
					<span class="tc-hero-badge"><?php echo esc_html( $county ); ?></span>
					<h1><?php echo esc_html( $location['tagline'] ); ?></h1>
					<p>Fast, professional, and affordable eviction cleanout and deep cleaning services for property managers, landlords, and homeowners in <?php echo esc_html( $city ); ?>, <?php echo esc_html( $state ); ?>.</p>
					<a href="/contact/" class="tc-cta-button">Get a Free Estimate</a>
					<a href="tel:+1<?php echo preg_replace( '/[^0-9]/', '', $phone ); ?>" class="tc-cta-secondary">Call <?php echo esc_html( $phone ); ?></a>
				</div>
			</div>

			<div class="tc-section tc-container">
				<h2>Eviction Junk Removal & Deep Cleaning in <?php echo esc_html( $city ); ?>, Texas</h2>
				<p>When tenants leave and the property needs to be turned over fast, T&C Integrity & Reliable Trash Services is <?php echo esc_html( $city ); ?>'s trusted partner for complete eviction junk removal and professional deep cleaning. We serve property managers, landlords, real estate investors, and homeowners throughout <?php echo esc_html( $city ); ?> and <?php echo esc_html( $county ); ?>.</p>
			</div>

			<div class="tc-section tc-section-light tc-container">
				<div class="tc-section-title">
					<h2>Our <?php echo esc_html( $city ); ?> Services</h2>
				</div>
				<div class="tc-services-grid">
					<?php
					$services = array(
						array( 'Eviction Junk Removal', "Complete property cleanouts after eviction in {$city}. We remove all abandoned belongings, debris, and hazardous materials." ),
						array( 'Deep Cleaning', "Professional post-eviction deep cleaning for {$city} rental properties. Every surface sanitized, scrubbed, and restored to move-in condition." ),
						array( 'Furniture & Appliance Removal', "Heavy item hauling throughout {$city}. Sofas, mattresses, refrigerators, washers — removed and disposed of responsibly." ),
						array( 'Full Property Cleanout', "Complete estate, foreclosure, and rental cleanouts in {$city}. From attic to garage, we clear it all." ),
						array( 'Debris & Construction Cleanup', "Post-renovation debris removal in {$city}. Drywall, lumber, tile, and construction waste hauled away." ),
						array( 'Yard Waste & Outdoor Cleanup', "Overgrown yards, fallen branches, and outdoor junk cleared from {$city} properties to restore curb appeal." ),
					);
					foreach ( $services as $svc ) {
						echo '<div class="tc-service-card tc-animate"><div class="tc-service-card-body">';
						echo '<h3>' . esc_html( $svc[0] ) . '</h3>';
						echo '<p>' . esc_html( $svc[1] ) . '</p>';
						echo '<a href="/services/" class="tc-service-card-link">Learn More</a>';
						echo '</div></div>';
					}
					?>
				</div>
			</div>

			<div class="tc-section tc-container">
				<h2>Frequently Asked Questions — <?php echo esc_html( $city ); ?>, TX</h2>
				<?php foreach ( $faqs as $faq ) : ?>
				<details class="tc-faq-item">
					<summary><strong><?php echo esc_html( $faq['question'] ); ?></strong></summary>
					<p><?php echo esc_html( $faq['answer'] ); ?></p>
				</details>
				<?php endforeach; ?>
			</div>

			<div class="tc-cta-banner">
				<h2>Ready to Get Started in <?php echo esc_html( $city ); ?>?</h2>
				<p>Get a free, no-obligation estimate for your <?php echo esc_html( $city ); ?> property today.</p>
				<a href="/contact/" class="tc-cta-button">Get a Free Estimate</a>
			</div>
		<?php } ?>

	<?php endwhile; ?>

</div>

<?php get_footer(); ?>
