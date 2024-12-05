<section class="mentions">
  <div class="mentions__container">
    <h1 class="mentions__title"><?= $page->title()->html() ?></h1>
    <div class="mentions__content">
      <?php if ($page->text()): ?>
        <?= $page->text()->kt(); ?>
      <?php else: ?>
        <p>Le contenu n'a pas été trouvé.</p>
      <?php endif; ?>
    </div>
  </div>
</section>