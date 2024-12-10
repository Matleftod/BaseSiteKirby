<?php

Kirby::plugin('custom/faq', [
    'areas' => [
        'faq' => function () {
            return [
                'label' => 'FAQ',
                'icon' => 'draft',
                'link' => 'pages/faq',
                'menu' => true,
            ];
        },
    ],
]);
?>