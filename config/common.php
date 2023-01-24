<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default pagination size
    |--------------------------------------------------------------------------
    |
    | This value is the default size of the pagination.
    |
    */

    'pagination' => [
        'per_page' => 10,
    ],

    'genres' => [
        'max' => 3,
    ],

    'video' => [
        'dimensions' => [
            ['width' => 640, 'height' => 480],
            ['width' => 1280, 'height' => 720],
            ['width' => 1920, 'height' => 1080],
            ['width' => 3840, 'height' => 2160],
        ],
    ],

    'dirty' => [
      'series' => 1,
    ],
];
