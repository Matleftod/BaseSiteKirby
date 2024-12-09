<?php

Kirby::plugin('custom/notifications', [
    'areas' => [
        'messages' => function ($kirby) {
            return [
                'label' => 'Messages',
                'icon' => 'email',
                'link' => 'pages/messages',
                'menu' => true,
            ];
        },
    ]
])
?>