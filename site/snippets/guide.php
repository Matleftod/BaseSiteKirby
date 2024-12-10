<section class="guide">
  <div class="guide__container">
    <h2 class="guide__title">Guide local</h2>

    <div class="guide__places">
        <h3 class="guide__subtitle">Lieux d'intérêt</h3>
        <?php 
        $guidePage = page('guide-local');
        $places = $guidePage->children()->listed()->filter(function ($child) {
            return $child->intendedTemplate()->name() === 'place';
        });

        if ($places && $places->count() > 0): ?>
          <ul>
            <?php foreach ($places as $place): ?>
              <li>
                <h4><?= $place->title()->html() ?></h4>
                <?php if ($image = $place->image()): ?>
                  <img src="<?= $image->url() ?>" alt="<?= $place->title()->html() ?>">
                <?php endif ?>
                <p><?= $place->description()->kirbytext() ?></p>
                <p><strong>Catégorie :</strong> <?= $place->category()->html() ?></p>
              </li>
            <?php endforeach ?>
          </ul>
        <?php else: ?>
          <p>Aucun lieu d'intérêt à afficher pour le moment.</p>
        <?php endif ?>
    </div>

    <div class="guide__events">
        <h3 class="guide__subtitle">Événements</h3>
        <?php 
        $events = $guidePage->children()->listed()->filter(function ($child) {
            return $child->intendedTemplate()->name() === 'event';
        });

        if ($events && $events->count() > 0): ?>
          <ul>
            <?php foreach ($events as $event): ?>
              <li>
                <h4><?= $event->title()->html() ?></h4>
                <?php if ($image = $event->image()): ?>
                  <img src="<?= $image->url() ?>" alt="<?= $event->title()->html() ?>">
                <?php endif ?>
                <p><?= $event->description()->kirbytext() ?></p>
                <p><strong>Date :</strong> <?= $event->date()->toDate('d/m/Y') ?></p>
              </li>
            <?php endforeach ?>
          </ul>
        <?php else: ?>
          <p>Aucun événement à afficher pour le moment.</p>
        <?php endif ?>
    </div>
  </div>
</section>