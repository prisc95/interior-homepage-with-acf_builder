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

<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
   

<div class="container">
        <div class="top">
            <?php if ( ! empty( $pre_title ) ) : ?>
                    <h2 class="usp-grid__pre-title"><?php echo esc_html( $pre_title ); ?></h2>
            <?php endif; ?>

              <?php if ( ! empty( $title ) ) : ?>
                    <h1 class="usp-grid__title"><?php echo esc_html( $title ); ?></h1>
            <?php endif; ?>
        </div>
                <div class="bottom">
                    <?php foreach ( $grids as $grid ) : ?>
                        <div class="usp-grid__inputs">
                            <?php if ( ! empty( $grid['icon'] ) ) : ?>
    <?php echo $grid['icon']; ?>
<?php endif; ?>



                <?php if ( ! empty( $grid['grid_inputs'] ) ) : ?>
                    <?php foreach ( $grid['grid_inputs'] as $input ) : ?>
                        <?php if ( ! empty( $input['input_1'] ) ) : ?>
                            <h2 class="usp-grid__input-1"><?php echo esc_html( $input['input_1'] ); ?></h2>
                        <?php endif; ?>

                        <?php if ( ! empty( $input['input_2'] ) ) : ?>
                            <p class="usp-grid__input-2"><?php echo esc_html( $input['input_2'] ); ?></p>
                        <?php endif; ?>

                        <?php if ( ! empty( $input['input_3'] ) ) : ?>
                            <p class="usp-grid__input-3"><?php echo esc_html( $input['input_3'] ); ?></p>
                        <?php endif; ?>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    </div>
</section>