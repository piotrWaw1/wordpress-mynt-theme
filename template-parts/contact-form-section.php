<?php
$title = esc_html(get_field('contact_form_title'));
$description = esc_html(get_field('contact_form_description'));
?>

<section id="kontakt">
  <div class="wrap">
    <div class="cta-section reveal">
      <div>
        <h2><?php echo($title); ?></h2>
        <p class="cta-description"><?php echo($description); ?></p>
      </div>
      <div class="cta-form">
        <?php echo do_shortcode('[contact-form-7 id="246b69b" title="Kontakt"]'); ?>
      </div>
    </div>
  </div>
</section>