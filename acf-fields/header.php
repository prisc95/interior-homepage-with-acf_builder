<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$header = new FieldsBuilder('header');

// Voeg de velden toe
$header
    

    ->addText('pre_title', ['label' => 'Voortitel'])
    ->addText('title', ['label' => 'Titel'])
    
    ->addColorPicker('background_color', [
        'label' => 'Achtergrondkleur',
        'default_value' => '#121212',])
    ->addColorPicker('text_color', [
        'label' => 'Tekstkleur',
        'default_value' => '#FFF',
        ])
    
    
    ->setLocation('block', '==', 'acf/header'); 

return $header;