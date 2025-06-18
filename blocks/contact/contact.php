<?php
/**
 * Contact Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$icons              = get_field('icons');

$title           = get_field( 'title' );
$sub_title       = get_field( 'sub_title' );

$background_color  = get_field( 'background_color' ); // ACF's color picker.
$text_color        = get_field( 'text_color' ); // ACF's color picker.




// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'contact';
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
                <?php if ( ! empty( $title ) ) : ?>
                    <h2 class="contact__title"><?php echo esc_html( $title ); ?></h2>
                <?php endif; ?>

                  <?php if ( ! empty( $sub_title ) ) : ?>
                    <h2 class="contact__sub_title"><?php echo esc_html( $sub_title ); ?></h2>
                <?php endif; ?>

                <?php if ( $icons ) : ?>
                
                    <?php foreach ( $icons as $icon ) : ?>
                        <?php if ( ! empty( $icon['link'] ) && ! empty( $icon['icon'] ) ) : ?>
                            <a href="<?php echo esc_url( $icon['link'] ); ?>" target="_blank" rel="noopener">
                        <?php echo $icon['icon']; ?>    
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
               
                <?php endif; ?>
       
    </div>
</section>