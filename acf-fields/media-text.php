<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$mediaText = new FieldsBuilder('media_text');

// Voeg de velden toe
$mediaText
    ->addText('header', ['label' => 'Header'])
    ->addTextarea('paragraph', ['label' => 'Paragraaf'])
    ->addImage('image', ['label' => 'Afbeelding'])
    ->addColorPicker('background_color', [
        'label' => 'Achtergrondkleur',
        'default_value' => '#121212',])
    ->addColorPicker('text_color', [
        'label' => 'Tekstkleur',
        'default_value' => '#FFF',
        ])
    ->addRepeater('icons', [
        'label' => 'Iconen',
        'min' => 1,
        'max' => 5,
        'layout' => 'table',
        'button_label' => 'Voeg icoon toe',
    ])
        ->addField('icon', 'font-awesome', [
            'label' => 'Icoon',
            'return_format' => 'class',
        ])

        ->addField('icon_color', 'color_picker', [
        'label' => 'Kleur van het icoon',
        'instructions' => 'Selecteer de gewenste kleur voor dit icoon',
        'default_value' => '#c03740',
    ])

         ->addField('link', 'url', [
        'label' => 'Link naar social media',
        'instructions' => 'Bijv. https://facebook.com/jouwpagina',
    ])
    ->endRepeater()
    ->addText('title', [
        'label' => 'Titel',
        'default_value' => 'Neem contact met me op',
        ])
    ->addTextarea('email', [
        'label' => 'E-mailadres',
        'default_value' => 'jouwemailadres@voorbeeld.nl',
        ])

    ->addTextarea('phone', [
        'label' => 'Telefoonnummer',
        'default_value' => '+316 ...',
        ])
    ->setLocation('block', '==', 'acf/media-text'); 

return $mediaText;