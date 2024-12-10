<article class="blog-article">
  <div class="blog-article__container">
    <h1 class="blog-article__title"><?= $page->title()->html() ?></h1>
    <div class="blog-article__meta">
      <p>Publié le <?= $page->date()->toDate('d M Y') ?> par <?= $page->author()->html() ?></p>
      <p>Catégorie : <?= $page->category() ?></p>
    </div>
    <?php if ($image = $page->featured_image()->toFile()): ?>
      <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" class="blog-article__image">
    <?php endif; ?>
    <?php if ($page->excerpt()->isNotEmpty()): ?>
      <div class="blog-article__excerpt">
        <p><?= $page->excerpt()->kirbytext() ?></p>
      </div>
    <?php endif; ?>
    <div class="blog-article__content">
      <?= $page->content()->toBlocks() ?>
    </div>
    <?php if ($page->tags()->isNotEmpty()): ?>
      <div class="blog-article__tags">
        Tags : <?= implode(', ', $page->tags()->split(',')) ?>
      </div>
    <?php endif; ?>
    <?php if ($page->meta_title()->isNotEmpty() || $page->meta_description()->isNotEmpty()): ?>
      <div class="blog-article__seo">
        <p><strong>Titre SEO :</strong> <?= $page->meta_title() ?></p>
        <p><strong>Description SEO :</strong> <?= $page->meta_description() ?></p>
      </div>
    <?php endif; ?>
  </div>
</article>