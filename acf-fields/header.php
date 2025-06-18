<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$header = new FieldsBuilder('header');

// Voeg de velden toe
$header
    

    ->addText('pre_title', ['label' => 'Voortitel'])
    ->addText('title', ['label' => 'Titel'])
    
    ->addColorPicker('background_color', ['label' => 'Achtergrondkleur'])
    ->addColorPicker('text_color', ['label' => 'Tekstkleur'])
    
    
    ->setLocation('block', '==', 'acf/header'); 

return $header;