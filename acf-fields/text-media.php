<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$textMedia = new FieldsBuilder('text_media');

$textMedia
    

    ->addText('pre_title', ['label' => 'Voortitel'])
    ->addText('title', ['label' => 'Titel'])
    ->addTextarea('paragraph', ['label' => 'Paragraaf'])
    ->addLink('link', ['label' => 'Link'])
    ->addField('link_color', 'color_picker', [
    'label' => 'Kleur van de link',
    'default_value' => '#FFF', 
])

    ->addImage('image', ['label' => 'Afbeelding'])
    
    ->addColorPicker('background_color', [
        'label' => 'Achtergrondkleur',
        'default_value' => '#121212',])
    ->addColorPicker('text_color', [
        'label' => 'Tekstkleur',
        'default_value' => '#FFF',
        ])
    
    
    ->setLocation('block', '==', 'acf/text-media'); 

return $textMedia;