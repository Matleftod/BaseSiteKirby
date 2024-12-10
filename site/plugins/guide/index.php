<?php

Kirby::plugin('custom/guide', [
    'areas' => [
        'guide' => function () {
            return [
                'label' => 'Guide Local',
                'icon' => 'megaphone',
                'link' => 'pages/guide-local',
                'menu' => true,
            ];
        },
    ],
]);
?>