<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page->title()->html() ?> - <?= $site->title()->html() ?></title>

  <!-- CSS -->
  <link rel="stylesheet" href="<?= url('assets/css/main.css') ?>">

  <!-- JavaScript -->
  <?php if (option('debug')): ?>
    <script type="module" src="http://localhost:3000/js/main.ts"></script>
  <?php else: ?>
    <script type="module" src="<?= url('assets/js/main.js') ?>"></script>
  <?php endif; ?>
</head>
<body>
  <header class="header">
    <div class="header__container">
      <a href="<?= url() ?>" class="header__logo">
        <img src="<?= url('assets/images/logo.svg') ?>" alt="Logo">
      </a>
      <nav class="header__nav">
        <ul class="header__menu">
          <li class="header__menu-item"><a href="<?= url() ?>">Accueil</a></li>
          <li class="header__menu-item"><a href="<?= url('formules') ?>">Formules</a></li>
          <li class="header__menu-item"><a href="<?= url('tarifs') ?>">Tarifs</a></li>
          <li class="header__menu-item"><a href="<?= url('locations') ?>">Locations</a></li>
          <li class="header__menu-item"><a href="<?= url('contact') ?>">Contact</a></li>
        </ul>
      </nav>
      <a href="<?= url('contact') ?>" class="header__cta">Nous contacter</a>
    </div>
  </header>
