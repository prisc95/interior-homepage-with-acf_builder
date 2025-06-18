<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$textMedia = new FieldsBuilder('text_media');

// Voeg de velden toe
$textMedia
    

    ->addText('pre_title', ['label' => 'Voortitel'])
    ->addText('title', ['label' => 'Titel'])
    ->addTextarea('paragraph', ['label' => 'Paragraaf'])
    ->addLink('link', ['label' => 'Link'])

    ->addImage('image', ['label' => 'Afbeelding'])
    
    ->addColorPicker('background_color', ['label' => 'Achtergrondkleur'])
    ->addColorPicker('text_color', ['label' => 'Tekstkleur'])
    
    
    ->setLocation('block', '==', 'acf/text-media'); 

return $textMedia;