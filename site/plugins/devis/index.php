<?php

Kirby::plugin('custom/devis', [
    'areas' => [
        'devis' => function ($kirby) {
            return [
                'label' => 'Devis',
                'icon' => 'money',
                'link' => 'pages/devis',
                'menu' => true,
            ];
        },
    ]
])
?>