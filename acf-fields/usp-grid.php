<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$uspGrid = new FieldsBuilder('usp_grid');

$uspGrid
    ->addText('pre_title', ['label' => 'Voortitel'])
    ->addText('title', ['label' => 'Titel'])
    ->addColorPicker('background_color', ['label' => 'Achtergrondkleur'])
    ->addColorPicker('text_color', ['label' => 'Tekstkleur'])

    ->addRepeater('grids', [
        'label' => 'Tabellen',
        'min' => 1,
        'max' => 3,
        'layout' => 'table',
        'button_label' => 'Voeg icoon toe',
    ])

     ->addField('icon', 'font-awesome', [
            'label' => 'Icoon',
            'return_format' => 'class',
        ])
    
        ->addRepeater('grid_inputs',[
            'label' => 'Input',
            'min' => 1,
            'layout'=> 'table',
            'button_label' => 'Voeg input toe',
        ])

            ->addField('input_1', 'text', [
            'label' => 'Tekstveld 1',
            'placeholder' => 'Vul tekst in...',
            ])

            ->addField('input_2', 'text', [
            'label' => 'Tekstveld 2',
            'placeholder' => 'Vul tekst in...',
            ])

            ->addField('input_3', 'text', [
            'label' => 'Tekstveld 3',
            'placeholder' => 'Vul tekst in...',
            ])
            

        
          ->endRepeater()

      ->endRepeater()


    

    ->setLocation('block', '==', 'acf/usp-grid'); 

return $uspGrid;