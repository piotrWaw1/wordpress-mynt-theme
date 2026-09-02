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
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><img src="<?php echo esc_url( $logo ); ?>" alt="logo" class="logo-footer"></a>
        <!-- <a href="/" class="logo">MYNT<span class="dot">.</span></a> -->
        <p><?php echo($description); ?></p>
      </div>
      <div class="footer-cols">
        <div class="footer-col">
          <h4>NAWIGACJA</h4>
          <!-- <ul>
          <?php if (have_rows('page_nav')) : ?>
            <?php while ( have_rows('page_nav') ) : the_row();
                    $page = get_sub_field('page');
                    $page_label = esc_html(get_sub_field('page_label'));
          ?>
                <li><a href="<?php echo esc_url($page);?>"><?php echo ($page_label);?></a></li>
            <?php endwhile; ?>
          <?php endif; ?>
        </ul> -->
          <ul>
            <li></li>
            <li><a href="#uslugi">Usługi</a></li>
            <li><a href="#proces">Proces</a></li>
            <li><a href="#kontakt">Kontakt</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>KONTAKT</h4>
          <ul>
            <li><a href="mailto:<?php echo ($email);?>"><?php echo ($email);?></a></li>
            <li><a href="tel:+48000000000"><?php echo ($phone_number);?></a></li>
            <li><a href="#"><?php echo ($adress);?></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 MYNT. Wszystkie prawa zastrzeżone.</span>
      <div class="socials">
        
        <a href="<?php echo ($instagram['instagram_url']['url']);?>" aria-label="<?php echo ($instagram['instagram_url']['title']);?>"><?php echo ($instagram['icon']);?></a>
        <!-- <a href="#" aria-label="LinkedIn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M7 10v7M7 7v.01M12 17v-4a2 2 0 0 1 4 0v4M12 13v4"/></svg></a>
        <a href="#" aria-label="TikTok"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 3v10.5a3.5 3.5 0 1 1-3-3.46"/><path d="M15 6.5a4 4 0 0 0 4 4"/></svg></a> -->
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>