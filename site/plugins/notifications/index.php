<?php

Kirby::plugin('custom/notifications', [
    'areas' => [
        'messages' => function ($kirby) {
            // Nombre de messages non lus
            $unreadMessages = page('messages')->children()->filterBy('customstatus', 'unread')->count();

            return [
                'label' => 'Messages',
                'icon' => 'email',
                'link' => 'messages',
                'menu' => true,
                'data' => [
                    'unread' => $unreadMessages,
                ],
            ];
        },
    ],
    'hooks' => [
        'kirby.page.changeStatus:after' => function ($newPage) {
            // Lorsque le statut d'un message est modifié, rafraîchissez les notifications
            if ($newPage->intendedTemplate()->name() === 'message') {
                kirby()->cache('custom.notifications')->flush();
            }
        }
    ],
]);
