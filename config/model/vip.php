<?php

return [

/*
 * Modules .
 */
    'modules'  => ['vip'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'vip'     => [
        'model'        => 'App\Models\Vip',
        'table'        => 'Vips',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['﻿VipName', 'Price', 'Detail'],
        'translate'    => ['﻿VipName', 'Price', 'Detail'],
        'upload_folder' => '/common',
        'encrypt'      => ['VipId'],
        'revision'     => ['VipName'],
        'perPage'      => '20',
        'search'        => [
            'VipName'  => 'like',
        ],
    ],

];
