<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$mediaTextMinimal = new FieldsBuilder('media_text_minimal');

// Voeg de velden toe
$mediaTextMinimal
    ->addImage('image', ['label' => 'Afbeelding'])

    ->addText('pre_title', ['label' => 'Voortitel'])
    ->addText('title', ['label' => 'Titel'])
    ->addTextarea('paragraph', ['label' => 'Paragraaf'])
    ->addLink('link', ['label' => 'Link'])
    ->addField('link_color', 'color_picker', [
    'label' => 'Kleur van de link',
    'default_value' => '#FFF',
])

    
    ->addColorPicker('background_color', [
        'label' => 'Achtergrondkleur',
        'default_value' => '#121212',])
    ->addColorPicker('text_color', [
        'label' => 'Tekstkleur',
        'default_value' => '#FFF',
        ])
    
    
    ->setLocation('block', '==', 'acf/media-text-minimal'); 

return $mediaTextMinimal;