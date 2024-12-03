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
  <header>
    <nav>
      <ul>
        <li><a href="<?= url() ?>">Accueil</a></li>
        <li><a href="<?= url('about') ?>">À propos</a></li>
        <li><a href="<?= url('contact') ?>">Contact</a></li>
      </ul>
    </nav>
  </header>
