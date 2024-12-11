<?php

return [
    'debug' => true,
    'error' => 'error',
    'panel' => [
        'install' => true,
    ],
    'languages' => false, // Ajoute plus tard si multi-langues nécessaires
    'thumbs' => [
        'quality' => 80,
        'srcsets' => [
            'default' => [
                '320w' => ['width' => 320],
                '640w' => ['width' => 640],
                '1024w' => ['width' => 1024],
            ],
        ],
    ],
];
