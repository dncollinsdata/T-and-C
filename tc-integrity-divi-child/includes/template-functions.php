<?php
/**
 * T&C Integrity — Template Helper Functions
 *
 * @package TC_Integrity_Divi_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output the top utility bar with phone and hours.
 */
function tc_top_bar( $phone = '(555) 123-4567', $hours = 'Mon-Sat: 7AM - 7PM' ) {
	$clean = preg_replace( '/[^0-9]/', '', $phone );
	?>
	<div class="tc-top-bar">
		<div class="tc-container" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;">
			<span>&#128197; <?php echo esc_html( $hours ); ?></span>
			<a href="tel:+1<?php echo esc_attr( $clean ); ?>">&#9742; <?php echo esc_html( $phone ); ?> — Free Estimates</a>
		</div>
	</div>
	<?php
}

/**
 * Render a service card.
 */
function tc_service_card( $title, $description, $icon = '', $link = '#' ) {
	?>
	<div class="tc-service-card tc-animate">
		<?php if ( $icon ) : ?>
		<div class="tc-service-card-icon"><?php echo $icon; ?></div>
		<?php endif; ?>
		<div class="tc-service-card-body">
			<h3><?php echo esc_html( $title ); ?></h3>
			<p><?php echo esc_html( $description ); ?></p>
			<a href="<?php echo esc_url( $link ); ?>" class="tc-service-card-link">Learn More</a>
		</div>
	</div>
	<?php
}

/**
 * Render a process step.
 */
function tc_process_step( $title, $description ) {
	?>
	<div class="tc-process-step tc-animate">
		<h3><?php echo esc_html( $title ); ?></h3>
		<p><?php echo esc_html( $description ); ?></p>
	</div>
	<?php
}

/**
 * Render a testimonial card.
 */
function tc_testimonial_card( $quote, $author, $role = '', $stars = 5 ) {
	?>
	<div class="tc-testimonial-card tc-animate">
		<div class="tc-stars"><?php echo str_repeat( '&#9733;', $stars ); ?></div>
		<blockquote><?php echo esc_html( $quote ); ?></blockquote>
		<div class="tc-testimonial-author"><?php echo esc_html( $author ); ?></div>
		<?php if ( $role ) : ?>
		<div class="tc-testimonial-role"><?php echo esc_html( $role ); ?></div>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Render a stat counter item.
 */
function tc_stat_item( $number, $label, $suffix = '+' ) {
	?>
	<div class="tc-stat-item">
		<h3><span class="tc-counter" data-target="<?php echo intval( $number ); ?>" data-suffix="<?php echo esc_attr( $suffix ); ?>">0</span></h3>
		<p><?php echo esc_html( $label ); ?></p>
	</div>
	<?php
}
