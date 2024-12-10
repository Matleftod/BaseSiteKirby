<?php

Kirby::plugin('custom/blog', [
    'areas' => [
        'blog' => function () {
            return [
                'label' => 'Blog',
                'icon' => 'document',
                'link' => 'pages/blog',
                'menu' => true,
            ];
        },
    ],
]);
?>