<?php

return [
    'debug' => true,
    'panel' => [
        'install' => true,
        'css' => 'assets/css/panel.css',
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
    'routes' => [
        // Bloquer les URL de la page messages
        [
            'pattern' => 'messages',
            'action'  => function () {
                go('/');
            }
        ],
        // Bloquer les URL des sous-pages de messages
        [
            'pattern' => 'messages/(:any)',
            'action'  => function () {
                go('/');
            }
        ],
        // Bloquer les URL de la page devis
        [
            'pattern' => 'devis',
            'action'  => function () {
                go('/');
            }
        ],
        // Bloquer les URL des sous-pages de devis
        [
            'pattern' => 'devis/(:any)',
            'action'  => function () {
                go('/');
            }
        ]
    ],
    'bvdputte.kirbylog.logname' => 'my-logfile.log', // Nom personnalisé du fichier log
    'bvdputte.kirbylog.defaultloglevel' => 'debug', // Niveau de log par défaut
];
