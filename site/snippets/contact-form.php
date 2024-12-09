<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && get('action') === 'contact') {
    $name = get('name');
    $email = get('email');
    $message = get('message');

    if (empty($name) || empty($email) || empty($message)) {
        $error = "Veuillez remplir tous les champs obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "L'adresse email n'est pas valide.";
    } else {
        $messagesPage = page('messages');
        if (!$messagesPage) {
            $error = "La page des messages n'existe pas.";
        } else {
            try {
                $newMessage = $messagesPage->createChild([
                    'slug' => uniqid(),
                    'template' => 'message',
                    'content' => [
                        'name' => $name,
                        'email' => $email,
                        'message' => $message,
                        'date' => date('Y-m-d H:i:s')
                    ]
                ]);

                // Redirection avec paramètre de succès
                header("Location: " . $page->url() . "?success=1#contact-form");
                exit;
            } catch (Exception $e) {
                $error = "Une erreur s'est produite lors de l'envoi de votre message.";
            }
        }
    }
}

if (isset($_GET['success'])) {
    $success = "Merci pour votre message, nous vous répondrons rapidement.";
}
?>
<?php if (isset($success)): ?>
    <script>
        // Supprime le paramètre "success" de l'URL après affichage
        const url = new URL(window.location.href);
        url.searchParams.delete('success');
        window.history.replaceState({}, document.title, url.toString());
    </script>
<?php endif; ?>

<section id="contact-form" class="contact-form">
  <div class="contact-form__container">
    <h2 class="contact-form__title">Contactez-nous</h2>
    <form action="<?= $page->url() ?>#contact-form" method="POST" class="contact-form__form">
      <input type="hidden" name="action" value="contact">
      <div class="contact-form__field">
        <label for="name">Votre nom *</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="contact-form__field">
        <label for="email">Votre email *</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="contact-form__field">
        <label for="message">Votre message *</label>
        <textarea id="message" name="message" required></textarea>
      </div>
      <button type="submit" class="contact-form__submit">Envoyer</button>
    </form>

    <!-- Messages d'erreur ou de succès -->
    <?php if (isset($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php elseif (isset($success)): ?>
        <p class="success"><?= $success ?></p>
    <?php endif; ?>
  </div>
</section>