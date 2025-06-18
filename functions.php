<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

    /*
|--------------------------------------------------------------------------
| Register ACF
|--------------------------------------------------------------------------


    /**
     * We use WordPress's init hook to make sure
     * our blocks are registered early in the loading
     * process.
     *
     * @link https://developer.wordpress.org/reference/hooks/init/
     */

    // Here we call our tt3child_register_acf_block() function on init.

   add_action('acf/init', function () {
    if (function_exists('acf_register_block_type')) {

        acf_register_block_type([
            'name'              => 'media-text',
            'title'             => __('Media-text', 'sage'),
            'description'       => __('Media text block', 'sage'),
            'render_template'   => get_template_directory() . '/blocks/media-text/media-text.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => ['media', 'tekst', 'afbeelding'],
            'mode'              => 'edit',
            'supports'          => ['align' => false],
            
            'enqueue_style' => get_template_directory_uri() . '/blocks/media-text/media-text.css',
        ]);

        acf_register_block_type([
            'name'              => 'media-text-minimal',
            'title'             => __('Media-text-minimal', 'sage'),
            'description'       => __('Media text minimal block', 'sage'),
            'render_template'   => get_template_directory() . '/blocks/media-text-minimal/media-text-minimal.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => ['media', 'tekst', 'afbeelding'],
            'mode'              => 'edit',
            'supports'          => ['align' => false],
            
            'enqueue_style' => get_template_directory_uri() . '/blocks/media-text-minimal/media-text-minimal.css',
        ]);

        acf_register_block_type([
            'name'              => 'text-media',
            'title'             => __('Text-media', 'sage'),
            'description'       => __('Text media block', 'sage'),
            'render_template'   => get_template_directory() . '/blocks/text-media/text-media.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => ['media', 'tekst', 'afbeelding'],
            'mode'              => 'edit',
            'supports'          => ['align' => false],
            
            'enqueue_style' => get_template_directory_uri() . '/blocks/text-media/text-media.css',
        ]);

        acf_register_block_type([
            'name'              => 'header',
            'title'             => __('Header', 'sage'),
            'description'       => __('Header block', 'sage'),
            'render_template'   => get_template_directory() . '/blocks/header/header.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => ['media', 'tekst', 'afbeelding'],
            'mode'              => 'edit',
            'supports'          => ['align' => false],
            
            'enqueue_style' => get_template_directory_uri() . '/blocks/header/header.css',
        ]);

        acf_register_block_type([
            'name'              => 'usp-grid',
            'title'             => __('USP-grid', 'sage'),
            'description'       => __('USP-grid block', 'sage'),
            'render_template'   => get_template_directory() . '/blocks/usp-grid/usp-grid.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => ['usp', 'grid'],
            'mode'              => 'edit',
            'supports'          => ['align' => false],
            
            'enqueue_style' => get_template_directory_uri() . '/blocks/usp-grid/usp-grid.css',
        ]);

         acf_register_block_type([
            'name'              => 'contact',
            'title'             => __('Contact', 'sage'),
            'description'       => __('Contact block', 'sage'),
            'render_template'   => get_template_directory() . '/blocks/contact/contact.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => ['media', 'tekst', 'afbeelding'],
            'mode'              => 'edit',
            'supports'          => ['align' => false],
            
            'enqueue_style' => get_template_directory_uri() . '/blocks/contact/contact.css',
        ]);


    }

    if (function_exists('acf_add_local_field_group')) {
        require_once get_template_directory() . '/vendor/autoload.php';

        $header = require get_template_directory() . '/acf-fields/header.php';
        acf_add_local_field_group($header->build());

        $mediaText = require get_template_directory() . '/acf-fields/media-text.php';
        acf_add_local_field_group($mediaText->build());

        $mediaTextMinimal = require get_template_directory() . '/acf-fields/media-text-minimal.php';
        acf_add_local_field_group($mediaTextMinimal->build());

        $textMedia = require get_template_directory() . '/acf-fields/text-media.php';
        acf_add_local_field_group($textMedia->build());

        $uspGrid = require get_template_directory() . '/acf-fields/usp-grid.php';
        acf_add_local_field_group($uspGrid->build());

        $contact = require get_template_directory() . '/acf-fields/contact.php';
        acf_add_local_field_group($contact->build());

        
    }
});

// function enqueue_fontawesome() {
//     wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
// }
// add_action('wp_enqueue_scripts', 'enqueue_fontawesome');


/**
 * Enqueue global frontend styles
 */
function theme_enqueue_styles() {
    // App CSS (Tailwind + _variables.css)
    wp_enqueue_style(
        'theme-global-style',
        get_template_directory_uri() . '/resources/styles/app.css',
        array(),
        filemtime(get_template_directory() . '/resources/styles/app.css')
    );

    // Font Awesome (laad alleen op frontend)
    wp_enqueue_style(
        'fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0'
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/**
 * Enqueue styles for Gutenberg editor
 */
function theme_enqueue_editor_styles() {
    // App CSS ook in de editor
    add_editor_style('resources/styles/app.css');

    // Als je Font Awesome ook in de editor wil (optioneel):
    add_action('enqueue_block_editor_assets', function () {
        wp_enqueue_style(
            'fontawesome-editor',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
            array(),
            '6.4.0'
        );
    });
}
add_action('admin_init', 'theme_enqueue_editor_styles');

