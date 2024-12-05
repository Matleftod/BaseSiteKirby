<section class="tarif">
  <div class="tarif__container">
    <h2 class="tarif__title">Nos Tarifs</h2>
    <div class="tarif__grid">
      <?php foreach ($page->tarifs()->toStructure() as $tarif): ?>
        <div class="tarif__card">
          <h3 class="tarif__card-title"><?= $tarif->title() ?></h3>
          <p class="tarif__card-price"><?= $tarif->price() ?>€</p>
          <p class="tarif__card-description"><?= $tarif->description() ?></p>
          <ul class="tarif__card-features">
            <?php foreach ($tarif->features()->toStructure() as $feature): ?>
              <li><?= $feature->feature() ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
