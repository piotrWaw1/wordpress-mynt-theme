<?php
  $logo = esc_url(get_field('logo', 'option'));

  $email = get_field('e-mail', 'option');
  $phone_number = get_field('phone_number', 'option');
  $adress = get_field('adress', 'option');
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
            <?php if ( $email ) : ?>
              <li><a class="footer-contact-data" href="mailto:<?php echo ($email);?>"><?php echo ($email);?></a></li>
            <?php endif; ?>
            <?php if ( $phone_number ) : ?>
              <li><a class="footer-contact-data" href="tel:<?php echo ($phone_number);?>"><?php echo ($phone_number);?></a></li>
            <?php endif; ?>
            <?php if ( $adress ) : ?>
            <li><a class="footer-contact-data" href="#"><?php echo ($adress);?></a></li>
            <?php endif; ?>
            <li><a href="/#kontakt" class="btn btn-ghost footer-btn">Napisz do nas →</a></li>
          </ul>
        </div>
        
        <div class="footer-col">
          <span class="footer-section-name">NAWIGACJA</span>
          <?php if ( have_rows('navigation', 'option') ) : ?>
            <ul>
              <?php while ( have_rows('navigation', 'option') ) : the_row();
                $item = get_sub_field('navigation_item');
              ?>
                <?php if ($item["title"] && $item["url"]) : ?>
                  <li>
                    <a href="<?php echo esc_url($item["url"])?>"><?php echo esc_html($item["title"])?></a>
                  </li>
                <?php endif; ?>
            <?php endwhile; ?>
            </ul>
          <?php endif; ?>
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