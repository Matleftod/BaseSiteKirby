<?php

Kirby::plugin('custom/notifications', [
    'areas' => [
        'messages' => function ($kirby) {
            $unreadMessages = page('messages')->childrenAndDrafts()->filterBy('customstatus', 'Non lu')->count();
            return [
                'label' => 'Messages',
                'icon' => 'email',
                'link' => 'pages/messages',
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
])
?>