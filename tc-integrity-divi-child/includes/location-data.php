<?php
/**
 * T&C Integrity — Service Area Location Data
 *
 * Central data store for all service area pages.
 * Used by page templates and schema markup generators.
 *
 * @package TC_Integrity_Divi_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return all service area location data.
 */
function tc_get_locations() {
	return array(
		'houston' => array(
			'name'        => 'Houston',
			'state'       => 'Texas',
			'slug'        => 'houston',
			'tagline'     => 'Houston\'s Trusted Eviction Junk Removal & Deep Cleaning Experts',
			'meta_title'  => 'Eviction Junk Removal & Deep Cleaning in Houston, TX | T&C Integrity',
			'meta_desc'   => 'Professional eviction junk removal and deep cleaning services in Houston, TX. Same-day service, upfront pricing, eco-friendly disposal. Free estimates for property managers and landlords.',
			'lat'         => '29.7604',
			'lng'         => '-95.3698',
			'phone'       => '(555) 123-4567',
			'zip_codes'   => '77001, 77002, 77003, 77004, 77005, 77006, 77007, 77008, 77009, 77010, 77011, 77012, 77013, 77014, 77015, 77016, 77017, 77018, 77019, 77020',
			'county'      => 'Harris County',
			'population'  => '2.3 million',
			'nearby'      => array( 'Sugar Land', 'Missouri City', 'Katy', 'Cypress' ),
			'neighborhoods' => array( 'Downtown Houston', 'Midtown', 'Montrose', 'The Heights', 'River Oaks', 'Galleria', 'Memorial', 'Meyerland', 'Third Ward', 'Fifth Ward', 'East End', 'Spring Branch', 'Sharpstown', 'Westchase', 'Greenspoint', 'Gulfton', 'Alief', 'Bellaire' ),
			'landmarks'   => array( 'Texas Medical Center', 'NRG Stadium', 'George R. Brown Convention Center', 'Museum District', 'Hermann Park', 'Buffalo Bayou' ),
		),
		'sugar-land' => array(
			'name'        => 'Sugar Land',
			'state'       => 'Texas',
			'slug'        => 'sugar-land',
			'tagline'     => 'Sugar Land\'s Premier Eviction Cleanout & Deep Cleaning Service',
			'meta_title'  => 'Eviction Junk Removal & Deep Cleaning in Sugar Land, TX | T&C Integrity',
			'meta_desc'   => 'Fast, reliable eviction junk removal and deep cleaning in Sugar Land, TX. Licensed & insured team serving Fort Bend County property managers. Free on-site estimates.',
			'lat'         => '29.6197',
			'lng'         => '-95.6349',
			'phone'       => '(555) 123-4567',
			'zip_codes'   => '77478, 77479, 77498, 77496',
			'county'      => 'Fort Bend County',
			'population'  => '111,000',
			'nearby'      => array( 'Houston', 'Missouri City', 'Richmond', 'Rosenberg' ),
			'neighborhoods' => array( 'New Territory', 'First Colony', 'Sugar Creek', 'Riverstone', 'Telfair', 'Sweetwater', 'Greatwood', 'Oyster Creek', 'Imperial' ),
			'landmarks'   => array( 'Sugar Land Town Square', 'Constellation Field', 'Fort Bend County Fairgrounds', 'Brazos River', 'Smart Financial Centre' ),
		),
		'missouri-city' => array(
			'name'        => 'Missouri City',
			'state'       => 'Texas',
			'slug'        => 'missouri-city',
			'tagline'     => 'Missouri City\'s Reliable Eviction Junk Removal & Deep Cleaning Team',
			'meta_title'  => 'Eviction Junk Removal & Deep Cleaning in Missouri City, TX | T&C Integrity',
			'meta_desc'   => 'Professional eviction cleanout and deep cleaning services in Missouri City, TX. Serving Fort Bend & Harris County landlords with fast turnaround and honest pricing.',
			'lat'         => '29.6186',
			'lng'         => '-95.5377',
			'phone'       => '(555) 123-4567',
			'zip_codes'   => '77459, 77489, 77071',
			'county'      => 'Fort Bend County & Harris County',
			'population'  => '75,000',
			'nearby'      => array( 'Sugar Land', 'Houston', 'Richmond', 'Rosenberg' ),
			'neighborhoods' => array( 'Sienna', 'Lake Olympia', 'Quail Valley', 'Palmer Plantation', 'Riverstone Ranch', 'Fondren Park', 'Hunter\'s Glen' ),
			'landmarks'   => array( 'Sienna Community', 'Buffalo Run Park', 'Missouri City Community Park', 'The EDGE' ),
		),
		'katy' => array(
			'name'        => 'Katy',
			'state'       => 'Texas',
			'slug'        => 'katy',
			'tagline'     => 'Katy\'s Go-To Eviction Junk Removal & Deep Cleaning Professionals',
			'meta_title'  => 'Eviction Junk Removal & Deep Cleaning in Katy, TX | T&C Integrity',
			'meta_desc'   => 'Eviction junk removal and professional deep cleaning in Katy, TX. Serving property managers across Harris, Fort Bend & Waller Counties. Same-day availability. Free estimates.',
			'lat'         => '29.7858',
			'lng'         => '-95.8245',
			'phone'       => '(555) 123-4567',
			'zip_codes'   => '77449, 77450, 77491, 77492, 77493, 77494',
			'county'      => 'Harris, Fort Bend & Waller Counties',
			'population'  => '21,000 (city proper), 350,000+ (greater Katy)',
			'nearby'      => array( 'Houston', 'Cypress', 'Sugar Land', 'Richmond' ),
			'neighborhoods' => array( 'Cinco Ranch', 'Seven Meadows', 'Firethorne', 'Grand Lakes', 'Nottingham Country', 'Cross Creek Ranch', 'Elyson', 'Cane Island', 'Tamarron', 'Ventana Lakes' ),
			'landmarks'   => array( 'Katy Mills Mall', 'Typhoon Texas Waterpark', 'LaCenterra at Cinco Ranch', 'Katy Heritage Park', 'No Label Brewing' ),
		),
		'cypress' => array(
			'name'        => 'Cypress',
			'state'       => 'Texas',
			'slug'        => 'cypress',
			'tagline'     => 'Cypress\'s Trusted Eviction Cleanout & Deep Cleaning Crew',
			'meta_title'  => 'Eviction Junk Removal & Deep Cleaning in Cypress, TX | T&C Integrity',
			'meta_desc'   => 'Dependable eviction junk removal and deep cleaning services in Cypress, TX. Serving NW Harris County property managers and landlords. Licensed, insured, eco-friendly.',
			'lat'         => '29.9691',
			'lng'         => '-95.6971',
			'phone'       => '(555) 123-4567',
			'zip_codes'   => '77429, 77433, 77095',
			'county'      => 'Harris County',
			'population'  => '180,000+',
			'nearby'      => array( 'Houston', 'Katy', 'Spring', 'Tomball' ),
			'neighborhoods' => array( 'Bridgeland', 'Towne Lake', 'Fairfield', 'Cypress Creek Lakes', 'Lakewood Forest', 'Stone Gate', 'Cypress Falls', 'Longwood', 'Cypress Station' ),
			'landmarks'   => array( 'Berry Center', 'Cypress Creek Greenway', 'Houston Premium Outlets', 'Telge Park' ),
		),
		'richmond' => array(
			'name'        => 'Richmond',
			'state'       => 'Texas',
			'slug'        => 'richmond',
			'tagline'     => 'Richmond\'s Dependable Eviction Junk Removal & Deep Cleaning Service',
			'meta_title'  => 'Eviction Junk Removal & Deep Cleaning in Richmond, TX | T&C Integrity',
			'meta_desc'   => 'Affordable eviction junk removal and deep cleaning in Richmond, TX. Serving the Fort Bend County seat with professional, insured cleanup crews. Free estimates.',
			'lat'         => '29.5822',
			'lng'         => '-95.7608',
			'phone'       => '(555) 123-4567',
			'zip_codes'   => '77406, 77407, 77469',
			'county'      => 'Fort Bend County',
			'population'  => '12,500',
			'nearby'      => array( 'Rosenberg', 'Sugar Land', 'Missouri City', 'Katy' ),
			'neighborhoods' => array( 'Harvest Green', 'Aliana', 'Long Meadow Farms', 'Veranda', 'Brazos Town Center', 'Pecan Grove' ),
			'landmarks'   => array( 'Fort Bend County Courthouse', 'George Ranch Historical Park', 'Brazos River', 'Morton Cemetery' ),
		),
		'rosenberg' => array(
			'name'        => 'Rosenberg',
			'state'       => 'Texas',
			'slug'        => 'rosenberg',
			'tagline'     => 'Rosenberg\'s Professional Eviction Junk Removal & Deep Cleaning',
			'meta_title'  => 'Eviction Junk Removal & Deep Cleaning in Rosenberg, TX | T&C Integrity',
			'meta_desc'   => 'Expert eviction cleanout and deep cleaning services in Rosenberg, TX. Fast response, fair pricing, responsible disposal. Trusted by Fort Bend County property managers.',
			'lat'         => '29.5572',
			'lng'         => '-95.8086',
			'phone'       => '(555) 123-4567',
			'zip_codes'   => '77471, 77469',
			'county'      => 'Fort Bend County',
			'population'  => '41,000',
			'nearby'      => array( 'Richmond', 'Sugar Land', 'Missouri City', 'Houston' ),
			'neighborhoods' => array( 'Brazos Town Center', 'Seabourne Creek', 'Briscoe Junior High area', 'Downtown Rosenberg', 'Bonbrook' ),
			'landmarks'   => array( 'Rosenberg Railroad Museum', 'Seabourne Creek Nature Park', 'Fort Bend County Fairgrounds', 'Historic Downtown Rosenberg' ),
		),
		'college-station' => array(
			'name'        => 'College Station',
			'state'       => 'Texas',
			'slug'        => 'college-station',
			'tagline'     => 'College Station\'s Expert Eviction Junk Removal & Deep Cleaning',
			'meta_title'  => 'Eviction Junk Removal & Deep Cleaning in College Station, TX | T&C Integrity',
			'meta_desc'   => 'Professional eviction junk removal and deep cleaning in College Station, TX. Specializing in rental property turnovers near Texas A&M. Student move-out cleanups. Free estimates.',
			'lat'         => '30.6280',
			'lng'         => '-96.3344',
			'phone'       => '(555) 123-4567',
			'zip_codes'   => '77840, 77845, 77842',
			'county'      => 'Brazos County',
			'population'  => '120,000',
			'nearby'      => array( 'Bryan', 'Brenham', 'Navasota', 'Hearne' ),
			'neighborhoods' => array( 'Southwood Valley', 'Wolf Pen Creek', 'Carter Creek', 'Wellborn', 'South College Station', 'Northgate', 'University Drive corridor' ),
			'landmarks'   => array( 'Texas A&M University', 'Kyle Field', 'George Bush Presidential Library', 'Wolf Pen Creek Park', 'Century Square' ),
		),
		'brenham' => array(
			'name'        => 'Brenham',
			'state'       => 'Texas',
			'slug'        => 'brenham',
			'tagline'     => 'Brenham\'s Trusted Eviction Junk Removal & Deep Cleaning Provider',
			'meta_title'  => 'Eviction Junk Removal & Deep Cleaning in Brenham, TX | T&C Integrity',
			'meta_desc'   => 'Reliable eviction junk removal and deep cleaning services in Brenham, TX. Serving Washington County property managers with honest pricing and fast turnaround. Free estimates.',
			'lat'         => '30.1669',
			'lng'         => '-96.3977',
			'phone'       => '(555) 123-4567',
			'zip_codes'   => '77833, 77834',
			'county'      => 'Washington County',
			'population'  => '17,500',
			'nearby'      => array( 'College Station', 'Houston', 'Austin', 'Round Top' ),
			'neighborhoods' => array( 'Downtown Brenham', 'Blinn College area', 'Chappell Hill', 'Independence', 'Burton' ),
			'landmarks'   => array( 'Blue Bell Creameries', 'Blinn College', 'Washington-on-the-Brazos State Historic Site', 'Downtown Brenham square', 'Unity Theatre' ),
		),
	);
}

/**
 * Get a single location by slug.
 */
function tc_get_location( $slug ) {
	$locations = tc_get_locations();
	return isset( $locations[ $slug ] ) ? $locations[ $slug ] : false;
}

/**
 * Generate LocalBusiness + Service + FAQPage schema for a service area page.
 */
function tc_location_schema( $slug, $faqs = array() ) {
	$loc = tc_get_location( $slug );
	if ( ! $loc ) return;

	$schema = array(
		array(
			'@context'    => 'https://schema.org',
			'@type'       => 'LocalBusiness',
			'@id'         => home_url( '/service-area/' . $loc['slug'] . '/' ),
			'name'        => 'T&C Integrity & Reliable Trash Services — ' . $loc['name'],
			'description' => $loc['meta_desc'],
			'url'         => home_url( '/service-area/' . $loc['slug'] . '/' ),
			'telephone'   => $loc['phone'],
			'logo'        => TC_CHILD_URI . '/assets/images/tc-logo.png',
			'image'       => TC_CHILD_URI . '/assets/images/tc-logo.png',
			'priceRange'  => '$$',
			'geo'         => array(
				'@type'     => 'GeoCoordinates',
				'latitude'  => $loc['lat'],
				'longitude' => $loc['lng'],
			),
			'address'     => array(
				'@type'           => 'PostalAddress',
				'addressLocality' => $loc['name'],
				'addressRegion'   => 'TX',
				'addressCountry'  => 'US',
			),
			'areaServed'  => array(
				'@type' => 'City',
				'name'  => $loc['name'] . ', TX',
			),
			'serviceType' => array(
				'Eviction Junk Removal',
				'Deep Cleaning Services',
				'Property Cleanout',
				'Furniture Removal',
				'Appliance Removal',
				'Debris Hauling',
			),
			'openingHoursSpecification' => array(
				array(
					'@type'     => 'OpeningHoursSpecification',
					'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ),
					'opens'     => '07:00',
					'closes'    => '19:00',
				),
			),
		),
		array(
			'@context' => 'https://schema.org',
			'@type'    => 'Service',
			'serviceType' => 'Eviction Junk Removal',
			'provider'    => array(
				'@type' => 'LocalBusiness',
				'name'  => 'T&C Integrity & Reliable Trash Services',
			),
			'areaServed'  => array(
				'@type' => 'City',
				'name'  => $loc['name'] . ', Texas',
			),
			'description' => 'Professional eviction junk removal services in ' . $loc['name'] . ', TX. Complete property cleanouts, debris removal, and responsible disposal for landlords and property managers.',
		),
		array(
			'@context' => 'https://schema.org',
			'@type'    => 'Service',
			'serviceType' => 'Deep Cleaning',
			'provider'    => array(
				'@type' => 'LocalBusiness',
				'name'  => 'T&C Integrity & Reliable Trash Services',
			),
			'areaServed'  => array(
				'@type' => 'City',
				'name'  => $loc['name'] . ', Texas',
			),
			'description' => 'Professional deep cleaning services in ' . $loc['name'] . ', TX. Post-eviction, move-out, and property rehabilitation cleaning for rental units and homes.',
		),
	);

	// Add FAQPage schema if FAQs provided
	if ( ! empty( $faqs ) ) {
		$faq_entities = array();
		foreach ( $faqs as $faq ) {
			$faq_entities[] = array(
				'@type'          => 'Question',
				'name'           => $faq['question'],
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => $faq['answer'],
				),
			);
		}
		$schema[] = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => $faq_entities,
		);
	}

	// Add BreadcrumbList schema
	$schema[] = array(
		'@context'        => 'https://schema.org',
		'@type'           => 'BreadcrumbList',
		'itemListElement' => array(
			array(
				'@type'    => 'ListItem',
				'position' => 1,
				'name'     => 'Home',
				'item'     => home_url( '/' ),
			),
			array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => 'Service Areas',
				'item'     => home_url( '/service-area/' ),
			),
			array(
				'@type'    => 'ListItem',
				'position' => 3,
				'name'     => $loc['name'] . ', TX',
				'item'     => home_url( '/service-area/' . $loc['slug'] . '/' ),
			),
		),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>';
}
