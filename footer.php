<?php
  $logo = esc_url(get_field('logo'));

  $email = get_field('e-mail');
  $phone_number = get_field('phone_number');
  $adress = get_field('adress');

  $nav1 = get_field('nav1');
  $nav2 = get_field('nav2');
  $nav3 = get_field('nav3');
?>

  <footer>
  <div class="wrap">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>#" ><img class="footer-logo" src="<?php echo esc_url( $logo ); ?>" alt="logo" class="logo-footer"></a>
        <hr>
      </div>
      
      <div class="footer-cols">
        <div class="footer-contact">
          <span class="footer-section-name">Skontaktuj się</span>
          <ul>
            <li><a class="footer-contact-data" href="mailto:<?php echo ($email);?>"><?php echo ($email);?></a></li>
            <li><a class="footer-contact-data" href="tel:<?php echo ($phone_number);?>"><?php echo ($phone_number);?></a></li>
            <li><a class="footer-contact-data" href="#"><?php echo ($adress);?></a></li>
            <li><a href="/#kontakt" class="btn btn-ghost footer-btn">Napisz do nas →</a></li>
          </ul>
        </div>
        
        <div class="footer-col">
          <span class="footer-section-name">NAWIGACJA</span>
          <ul>
            <li><a href="/#uslugi"><?php echo $nav1?></a></li>
            <li><a href="/#proces"><?php echo $nav2?></a></li>
            <li><a href="/#kontakt"><?php echo $nav3?></a></li>
          </ul>
        </div>
      </div>
      <?php get_template_part( 'template-parts/social-media-links' );?>
    </div>
    <div class="footer-bottom">
      <span>© 2026 by kreuj.się.</span>
      <span>Wszystkie prawa zastrzeżone | <a class="footer-legal-link" href="<?php echo get_privacy_policy_url(); ?>">Polityka prywatności</a></span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>