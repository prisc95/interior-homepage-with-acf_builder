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
    
    ->addColorPicker('background_color', ['label' => 'Achtergrondkleur'])
    ->addColorPicker('text_color', ['label' => 'Tekstkleur'])
    
    
    ->setLocation('block', '==', 'acf/media-text-minimal'); 

return $mediaTextMinimal;