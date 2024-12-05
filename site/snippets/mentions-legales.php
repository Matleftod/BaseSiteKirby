<section class="mentions">
  <div class="mentions__container">
    <h1 class="mentions__title"><?= $page->title()->html() ?></h1>
    <div class="mentions__content">
      <?php if ($page->content()): ?>
        <?= $page->content()->kt(); ?>
        <?php var_dump($page->title()->value()); ?>
    <?php var_dump($page->content()->value()); ?>
      <?php else: ?>
        <p>Le contenu n'a pas été trouvé.</p>
      <?php endif; ?>
    </div>
  </div>
</section>