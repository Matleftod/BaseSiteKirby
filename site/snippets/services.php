<?php if ($page->services()->isNotEmpty()): ?>
  <section class="services">
    <div class="services__container">
      <h2 class="services__title">Nos prestations</h2>
      <div class="services__list">
        <?php foreach ($page->services()->toStructure() as $service): ?>
          <div class="services__item">
            <?php if ($icon = $service->icon()->toFile()): ?>
              <img src="<?= $icon->url() ?>" alt="<?= $service->title()->html() ?>" class="services__icon">
            <?php endif; ?>
            <h3 class="services__item-title"><?= $service->title()->html() ?></h3>
            <p class="services__item-text"><?= $service->description()->html() ?></p>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
<?php endif; ?>
