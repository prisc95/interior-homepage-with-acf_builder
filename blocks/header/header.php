<?php
/**
 * Header Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$pre_title            = get_field( 'pre_title' );
$title                = get_field( 'title' );

$background_color     = get_field( 'background_color' ); // ACF's color picker.
$text_color           = get_field( 'text_color' ); // ACF's color picker.


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'header';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
if ( $background_color || $text_color ) {
    $class_name .= ' has-custom-acf-color';
}

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );
?>

<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
    <div class="container">

             <?php if ( ! empty( $pre_title ) ) : ?>
                    <h2 class="header__pre_title"><?php echo esc_html( $pre_title ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $title ) ) : ?>
                    <h1 class="header__title"><?php echo esc_html( $title ); ?></h1>
                <?php endif; ?>

    </div>
</section>