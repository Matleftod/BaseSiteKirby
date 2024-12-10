<section class="faq">
  <div class="faq__container">
    <h2 class="faq__title">Foire Aux Questions</h2>
    <div class="faq__list">
      <?php 
      $faqPage = page('faq');
      if ($faqPage && $faqPage->questions()->isNotEmpty()): ?>
        <?php foreach ($faqPage->questions()->toStructure() as $item): ?>
          <div class="faq__item">
            <h3 class="faq__question"><?= $item->question()->html() ?></h3>
            <p class="faq__answer"><?= $item->answer()->kirbytext() ?></p>
          </div>
        <?php endforeach ?>
      <?php else: ?>
        <p class="faq__empty">Aucune question fréquemment posée pour le moment.</p>
      <?php endif ?>
    </div>
  </div>
</section>