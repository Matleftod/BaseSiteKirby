<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

                // Change explicitement le statut à "listed" (publié)
                $newMessage->changeStatus('listed');

                // Message de succès
                $success = "Merci pour votre message, nous vous répondrons rapidement.";
            } catch (Exception $e) {
                $error = "Une erreur s'est produite lors de l'envoi de votre message.";
            }
        }
    }
}

?>

<section id="contact-form" class="contact-form">
  <div class="contact-form__container">
    <h2 class="contact-form__title">Contactez-nous</h2>
    <form action="<?= $page->url() ?>#contact-form" method="POST" class="contact-form__form">
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

<script>
  // Interception de la soumission du formulaire
  document.querySelector('.contact-form__form').addEventListener('submit', async (event) => {
    event.preventDefault(); // Empêche le rechargement de la page

    const form = event.target;
    const formData = new FormData(form);

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: formData,
      });

      if (response.ok) {
        form.reset(); // Réinitialise le formulaire
        document.querySelector('.success').textContent = "Merci pour votre message, nous vous répondrons rapidement.";
        document.querySelector('.success').style.display = 'block';
        document.querySelector('.error').style.display = 'none';
      } else {
        throw new Error('Une erreur est survenue lors de l'envoi de votre message.');
      }
    } catch (error) {
      document.querySelector('.error').textContent = error.message;
      document.querySelector('.error').style.display = 'block';
      document.querySelector('.success').style.display = 'none';
    }
  });
</script>

<style>
  .error {
    color: red;
    margin-top: 10px;
  }
  .success {
    color: green;
    margin-top: 10px;
  }
</style>