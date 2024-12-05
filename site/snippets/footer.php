  <footer class="footer">
    <div class="footer__container">
      <div class="footer__logo">
        <a href="<?= url() ?>">
          <img src="<?= url('assets/images/logo-footer.svg') ?>" alt="Logo">
        </a>
      </div>
      <nav class="footer__nav">
        <ul class="footer__menu">
          <li class="footer__menu-item"><a href="<?= url('about') ?>">À propos</a></li>
          <li class="footer__menu-item"><a href="<?= url('mentions-legales') ?>">Mentions légales</a></li>
          <li class="footer__menu-item"><a href="<?= url('privacy') ?>">Politique de confidentialité</a></li>
          <li class="footer__menu-item"><a href="<?= url('contact') ?>">Contact</a></li>
        </ul>
      </nav>
      <div class="footer__social">
        <a href="https://facebook.com" target="_blank" class="footer__social-link">
          <img src="<?= url('assets/images/icon-facebook.svg') ?>" alt="Facebook">
        </a>
        <a href="https://instagram.com" target="_blank" class="footer__social-link">
          <img src="<?= url('assets/images/icon-instagram.svg') ?>" alt="Instagram">
        </a>
        <a href="https://linkedin.com" target="_blank" class="footer__social-link">
          <img src="<?= url('assets/images/icon-linkedin.svg') ?>" alt="LinkedIn">
        </a>
      </div>
    </div>
    <div class="footer__bottom">
      <p>&copy; <?= date('Y') ?> <?= $site->title()->html() ?>. Tous droits réservés.</p>
    </div>
  </footer>
</body>
</html>
