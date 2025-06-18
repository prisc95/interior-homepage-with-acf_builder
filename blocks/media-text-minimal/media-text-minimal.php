<?php
/**
 * Media-text-Minimal Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$pre_title            = get_field( 'pre_title' );
$title            = get_field( 'title' );
$paragraph       = get_field( 'paragraph' );
$link               = get_field('link');
$image             = get_field( 'image' );
$background_color  = get_field( 'background_color' ); // ACF's color picker.
$text_color        = get_field( 'text_color' ); // ACF's color picker.
$link_color         = get_field('link_color', $link['ID']);


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'media-text-minimal';
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
            <?php if ( $image ) : ?>
                <div class="left">
                    <div class="img-wrapper">
                        <?php echo wp_get_attachment_image( $image['ID'], 'full', '', array( 'class' => 'media-text-minimal__img' ) ); ?>
                    </div>
                </div>
            <?php endif; ?>
        

        <div class="right">
             <?php if ( ! empty( $pre_title ) ) : ?>
                    <p class="media-text-minimal__pre_title"><?php echo esc_html( $pre_title ); ?></p>
                <?php endif; ?>

                <?php if ( ! empty( $title ) ) : ?>
                    <h2 class="media-text-minimal__title"><?php echo esc_html( $title ); ?></h2>
                <?php endif; ?>

                  <?php if ( ! empty( $paragraph ) ) : ?>
                    <p class="media-text-minimal__paragraph"><?php echo esc_html( $paragraph ); ?></p>
                <?php endif; ?>

                  <?php if ( ! empty( $link ) && is_array( $link ) ) : ?>
                <a class="media-text-minimal__link" href="<?php echo esc_url( $link['url'] ); ?>"
                style="color: <?php echo esc_attr( $link_color ); ?>;" 
                <?php if ( ! empty( $link['target'] ) ) : ?> target="<?php echo esc_attr( $link['target'] ); ?>"<?php endif; ?>>
        <?php echo esc_html( $link['title'] ); ?>
    </a>
<?php endif; ?>


        </div>
       
    </div>
</section>