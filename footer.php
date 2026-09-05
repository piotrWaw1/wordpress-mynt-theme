<?php
  $logo = esc_url(get_field('logo'));
  $description = esc_html(get_field('footer_description'));

  $email = esc_html(get_field('e-mail'));
  $phone_number = esc_html(get_field('phone_number'));
  $adress = esc_html(get_field('adress'));

  $instagram = (get_field('instagram'));
?>

  <footer>
  <div class="wrap">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><img class="footer-logo" src="<?php echo esc_url( $logo ); ?>" alt="logo" class="logo-footer"></a>
        <hr>
      </div>
      
      <div class="footer-cols">
        <div class="footer-contact">
          <span class="footer-section-name">Skontaktuj się</span>
          <ul>
            <li><a class="footer-contact-data" href="mailto:<?php echo ($email);?>"><?php echo ($email);?></a></li>
            <li><a class="footer-contact-data" href="tel:<?php echo ($phone_number);?>"><?php echo ($phone_number);?></a></li>
            <li><a class="footer-contact-data" href="#"><?php echo ($adress);?></a></li>
            <li><a href="#kontakt" class="btn btn-ghost footer-btn">Napisz do nas →</a></li>
          </ul>
        </div>
        <!-- <div class="footer-col">
          <p><?php echo($description); ?></p>
        </div> -->
        
        <div class="footer-col">
          <span class="footer-section-name">NAWIGACJA</span>
          <ul>
            <li><a href="#uslugi">Usługi</a></li>
            <li><a href="#proces">Proces</a></li>
            <li><a href="#kontakt">Kontakt</a></li>
          </ul>
        </div>
      </div>
      <div class="socials">
        <?php if ( ! empty( $instagram['instagram_url'] ) && is_array( $instagram['instagram_url'] ) ) : ?>
            <a href="<?php echo esc_url( $instagram['instagram_url']['url'] ); ?>" aria-label="<?php echo esc_attr( $instagram['instagram_url']['title'] ); ?>">
                <?php echo $instagram['icon']; ?>
            </a>
        <?php endif; ?>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 MYNT. Wszystkie prawa zastrzeżone.</span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>