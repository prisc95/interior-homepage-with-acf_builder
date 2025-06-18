<?php
/**
 * Media-text Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$header             =   get_field( 'header' );
$paragraph          =   get_field( 'paragraph' );
$image              =   get_field( 'image' );
$background_color   =   get_field( 'background_color' ); // ACF's color picker.
$text_color         =   get_field( 'text_color' ); // ACF's color picker.
$icons              =   get_field('icons');
$title              =   get_field('title');
$email              =   get_field('email');
$phone              =   get_field('phone');


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'media-text';
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
                        <?php echo wp_get_attachment_image( $image['ID'], 'full', '', array( 'class' => 'media-text__img' ) ); ?>
                    </div>
                </div>
            <?php endif; ?>
        

        <div class="right">
                <?php if ( ! empty( $header ) ) : ?>
                    <h1 class="media-text__header"><?php echo esc_html( $header ); ?></h1>
                <?php endif; ?>

                  <?php if ( ! empty( $paragraph ) ) : ?>
                    <h2 class="media-text__paragraph"><?php echo esc_html( $paragraph ); ?></h2>
                <?php endif; ?>

                <?php if ( $icons ) : ?>
                
                <div class="icon-wrapper">
                              <?php foreach ( $icons as $icon ) : ?>
                        <?php if ( ! empty( $icon['link'] ) && ! empty( $icon['icon'] ) ) : ?>
                <a href="<?php echo esc_url( $icon['link'] ); ?>" target="_blank" rel="noopener">
                    <span style="color: <?php echo esc_attr( $icon['icon_color'] ); ?>;">
                <?php echo $icon['icon']; ?>    
                    </span>
               
                </a>
            <?php endif; ?>
                    <?php endforeach; ?>
                </div>
          
            <?php endif; ?>

                 <?php if ( ! empty( $title ) ) : ?>
                    <h1 class="media-text__title"><?php echo esc_html( $title ); ?></h1>
                <?php endif; ?>

   
                <div class="contact-wrapper">
                    <?php if ( ! empty( $email ) ) : ?>
                    <h2 class="media-text__email"><span class="email-tag">Email:&nbsp;&nbsp;</span><?php echo esc_html( $email ); ?></h2>
                <?php endif; ?>

                   <?php if ( ! empty( $phone ) ) : ?>
                    <h2 class="media-text__phone"><span class="phone-tag">Telefoonnummer:&nbsp;&nbsp;</span><?php echo esc_html( $phone ); ?></h2>
                <?php endif; ?>
                </div>
                   
        </div>
       
    </div>
</section>