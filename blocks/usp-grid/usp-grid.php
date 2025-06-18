<?php
/**
 * Media-text Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$pre_title            = get_field( 'pre_title' );
$title              = get_field( 'title' );
$background_color  = get_field( 'background_color' ); // ACF's color picker.
$text_color        = get_field( 'text_color' ); // ACF's color picker.
$grids             = get_field('grids');
$icon               =get_field('icon');
$grid              =get_field('grid');



// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'usp-grid';
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

<section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
    <div class="container">
        <?php foreach ( $grids as $grid ) : ?>
            <div class="usp-grid__inputs">
                <!-- Controleren of er een icoon is -->
                <?php if ( ! empty( $grid['icon'] ) ) : ?>
                    <span style="color: <?php echo esc_attr( $grid['icon_color'] ); ?>;">
                        <?php echo $grid['icon']; ?>
                    </span>
                <?php endif; ?>

                <!-- Controleren of er grid_inputs zijn -->
                <?php if ( ! empty( $grid['grid_inputs'] ) ) : ?>
                    <?php foreach ( $grid['grid_inputs'] as $input ) : ?>
                        <!-- Dynamisch alle input-velden tonen -->
                        <?php foreach ( $input as $key => $value ) : ?>
                            <?php if ( ! empty( $value ) ) : ?>
                                <p class="usp-grid__<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
