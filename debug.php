<?php
require 'kirby/bootstrap.php';

$kirby = new Kirby();
$messagesPage = page('messages');

if ($messagesPage) {
    $messages = $messagesPage->children();
    foreach ($messages as $message) {
        echo "<pre>";
        var_dump($message->toArray());
        echo "</pre>";
    }
} else {
    echo "La page des messages n'existe pas.";
}
