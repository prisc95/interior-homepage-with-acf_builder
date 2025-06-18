<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$uspGrid = new FieldsBuilder('usp_grid');

$uspGrid
    ->addColorPicker('background_color', [
        'label' => 'Achtergrondkleur',
        'default_value' => '#121212',])
    ->addColorPicker('text_color', [
        'label' => 'Tekstkleur',
        'default_value' => '#FFF',
        ])

    ->addRepeater('grids', [
        'label' => 'Tabellen',
        'min' => 1,
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
    
        ->addRepeater('grid_inputs',[
            'label' => 'Input',
            'min' => 1,
            'layout'=> 'table',
            'button_label' => 'Voeg input toe',
        ])

            ->addField('input', 'text', [
            'label' => 'Tekstveld 1',
            'placeholder' => 'Vul tekst in...',
            'maxlength' => '25',
            ])


        
          ->endRepeater()

      ->endRepeater()


    

    ->setLocation('block', '==', 'acf/usp-grid'); 

return $uspGrid;