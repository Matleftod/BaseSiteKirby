<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && get('action') === 'quote') {
    $name = get('name');
    $email = get('email');
    $service = get('service');
    $pieces = get('pieces');
    $frequency = get('frequency');

    // Calcul côté serveur
    $quote = $pieces * 50; // Exemple : 50€/pièce
    if ($frequency === 'weekly') $quote *= 0.9;

    // Validation des champs obligatoires
    if (empty($name) || empty($email)) {
        $error = "Veuillez remplir tous les champs obligatoires.";
    } else {
        $quotesPage = page('devis');
        if (!$quotesPage) {
            $error = "La page des devis n'existe pas.";
        } else {
            try {
                // Sauvegarde dans la page "devis"
                $quotesPage->createChild([
                    'slug' => uniqid(),
                    'template' => 'quote',
                    'content' => [
                        'name' => $name,
                        'email' => $email,
                        'service' => $service,
                        'pieces' => $pieces,
                        'frequency' => $frequency,
                        'quote' => $quote,
                        'date' => date('Y-m-d H:i:s')
                    ]
                ]);

                // Redirection avec paramètre de succès
                header("Location: " . $page->url() . "?quote-success=1#quote-form");
                exit;
            } catch (Exception $e) {
                $error = "Une erreur est survenue lors de l'envoi de votre devis.";
            }
        }
    }
}

if (isset($_GET['quote-success'])) {
    $success = "Votre demande de devis a été envoyée avec succès.";
}
?>
<?php if (isset($success)): ?>
    <script>
        // Supprime le paramètre "quote-success" de l'URL après affichage
        const url = new URL(window.location.href);
        url.searchParams.delete('quote-success');
        window.history.replaceState({}, document.title, url.toString());
    </script>
<?php endif; ?>

<section class="quote-form">
  <div class="quote-form__container">
    <h2 class="quote-form__title">Obtenez un devis rapide</h2>
    <form id="quote-form" action="<?= $page->url() ?>#quote-form" method="POST" class="quote-form__form">
      <input type="hidden" name="action" value="quote">
      <div class="quote-form__field">
        <label for="name">Nom *</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="quote-form__field">
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="quote-form__field">
        <label for="service">Type de service *</label>
        <select id="service" name="service" required>
          <option value="cleaning">Nettoyage</option>
          <option value="key_management">Gestion des clés</option>
          <option value="rental">Location saisonnière</option>
        </select>
      </div>
      <div class="quote-form__field">
        <label for="pieces">Nombre de pièces *</label>
        <input type="number" id="pieces" name="pieces" value="1" min="1" required>
      </div>
      <div class="quote-form__field">
        <label for="frequency">Fréquence *</label>
        <select id="frequency" name="frequency" required>
          <option value="once">Une fois</option>
          <option value="weekly">Hebdomadaire</option>
        </select>
      </div>
      <div class="quote-form__result" id="quote-result">
        Devis estimé : 0 €
      </div>
      <button type="submit" class="quote-form__submit">Envoyer la demande de devis</button>
    </form>
    <!-- Affichage des messages d'erreur ou de succès -->
    <?php if (isset($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php elseif (isset($success)): ?>
        <p class="success"><?= $success ?></p>
    <?php endif; ?>
  </div>
</section>

<script>
  // Calcul du prix en temps réel
  document.querySelectorAll('#quote-form input, #quote-form select').forEach(input => {
    input.addEventListener('input', () => {
      const pieces = parseInt(document.getElementById('pieces').value) || 0;
      const frequency = document.getElementById('frequency').value;

      let quote = pieces * 50; // Exemple : 50€/pièce
      if (frequency === 'weekly') quote *= 0.9; // 10% de réduction pour hebdomadaire

      document.getElementById('quote-result').textContent = `Devis estimé : ${quote.toFixed(2)} €`;
    });
  });
</script>