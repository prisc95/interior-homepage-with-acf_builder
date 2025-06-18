<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$contact = new FieldsBuilder('media_text');

// Voeg de velden toe
$contact

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

         ->addField('link', 'url', [
        'label' => 'Link naar social media',
        'instructions' => 'Bijv. https://facebook.com/jouwpagina',
    ])
    ->endRepeater()


    ->addText('title', ['label' => 'Titel'])
    ->addTextarea('sub_title', ['label' => 'Sub-titel'])

    ->addColorPicker('background_color', ['label' => 'Achtergrondkleur'])
    ->addColorPicker('text_color', ['label' => 'Tekstkleur'])
   

    ->setLocation('block', '==', 'acf/contact'); 

return $contact;