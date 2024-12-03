<div class="carousel">
  <div class="carousel__slides">
    <?php foreach ($block->images() as $index => $image): ?>
      <div class="carousel__slide<?= $index === 0 ? ' active' : '' ?>">
        <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
        <?php if ($block->captions()->isNotEmpty() && $block->captions()->toStructure()->nth($index)): ?>
          <p class="carousel__caption">
            <?= $block->captions()->toStructure()->nth($index)->text()->html() ?>
          </p>
        <?php endif; ?>
      </div>
    <?php endforeach ?>
  </div>
  <button class="carousel__prev">Previous</button>
  <button class="carousel__next">Next</button>
</div>