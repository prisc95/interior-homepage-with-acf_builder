<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$contact = new FieldsBuilder('contact');

// Voeg de velden toe
$contact

 ->addRepeater('icons', [
        'label' => 'Iconen',
        'min' => 1,
        'max' => 6,
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
        'default_value' => '#fff',
    ])

         ->addField('link', 'url', [
        'label' => 'Link naar social media',
        'instructions' => 'Bijv. https://facebook.com/jouwpagina',
    ])
    ->endRepeater()


    ->addText('title', ['label' => 'Titel'])
    ->addTextarea('sub_title', ['label' => 'Sub-titel'])

    ->addColorPicker('background_color', [
        'label' => 'Achtergrondkleur',
        'default_value' => '#121212',])
    ->addColorPicker('text_color', [
        'label' => 'Tekstkleur',
        'default_value' => '#FFF',
        ])
   

    ->setLocation('block', '==', 'acf/contact'); 

return $contact;