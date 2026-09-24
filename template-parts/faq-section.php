<?php
$sub_title_faq = esc_html(get_field("sub_title_faq"));
$title_faq = esc_html(get_field("title_faq"));
$description_faq = esc_html(get_field("description_faq"));
?>

<section id="faq">
  <div class="wrap">
    <div class="section-head reveal" style="max-width:640px;">
      <div class="eyebrow-line"><?php echo $sub_title_faq ?></div>
      <h2><?php echo $title_faq ?></h2>
      <p><?php echo $description_faq ?></p>
    </div>
    <?php if ( have_rows('questions') ) : ?>
        <?php while ( have_rows('questions') ) : the_row();
            $question = esc_html(get_sub_field('question'));
            $answer = esc_html(get_sub_field('answer'));
        ?>
            <div class="faq-list reveal-stagger" id="faqList">
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">
                        <span><?php echo $question?></span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p><?php echo $answer?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <p class="faq-note">Masz inne pytanie? <a href="#kontakt">Napisz do nas</a></p>
  </div>
</section>