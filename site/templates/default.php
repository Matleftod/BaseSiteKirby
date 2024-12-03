<?php snippet('header') ?>

<main>
  <h1><?= $page->title()->html() ?></h1>
  <p><?= $page->text()->kirbytext() ?></p>
</main>

<?php snippet('footer') ?>
