<?php if ($page->reviews()->isNotEmpty()): ?>
<section class="reviews">
  <div class="reviews__container">
    <h2 class="reviews__title"><?= $page->title()->html() ?></h2>
    <div class="reviews__list">
      <?php foreach ($page->reviews()->toStructure() as $review): ?>
        <div class="reviews__item">
          <p class="reviews__feedback">"<?= $review->feedback()->html() ?>"</p>
          <p class="reviews__client">- <?= $review->client_name()->html() ?></p>
          <p class="reviews__rating">
            <?php for ($i = 0; $i < $review->rating()->toInt(); $i++): ?>
              ⭐
            <?php endfor; ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
