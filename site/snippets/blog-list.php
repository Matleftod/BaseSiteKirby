<section class="blog">
  <div class="blog__container">
    <h2 class="blog__title">Nos articles</h2>
    <ul class="blog__list">
      <?php foreach (page('blog')->children()->listed()->sortBy('date', 'desc') as $article): ?>
        <li class="blog__item">
          <?php if ($image = $article->featured_image()->toFile()): ?>
            <a href="<?= $article->url() ?>">
              <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" class="blog__image">
            </a>
          <?php endif; ?>
          <a href="<?= $article->url() ?>">
            <h3 class="blog__article-title"><?= $article->title()->html() ?></h3>
          </a>
          <p class="blog__meta">
            <span class="blog__date"><?= $article->date()->toDate('d M Y') ?></span>
            | Auteur : <?= $article->author()->html() ?>
            | Catégorie : <?= $article->category() ?>
          </p>
          <p class="blog__excerpt"><?= $article->excerpt()->kirbytext() ?></p>
          <?php if ($article->tags()->isNotEmpty()): ?>
            <p class="blog__tags">
              Tags : <?= implode(', ', $article->tags()->split(',')) ?>
            </p>
          <?php endif; ?>
          <a href="<?= $article->url() ?>" class="blog__read-more">Lire la suite</a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>