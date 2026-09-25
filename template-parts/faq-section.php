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
        <div class="faq-list reveal-stagger" id="faqList">
            <?php while ( have_rows('questions') ) : the_row();
                $question = esc_html(get_sub_field('question'));
                $answer = esc_html(get_sub_field('answer'));
            ?>
                
                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php echo $question?></span>
                            <span class="faq-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up preview-icon"><path d="m5 12 7-7 7 7"/><path d="M12 19V5"/></svg></span>
                        </button>
                        <div class="faq-answer">
                            <p><?php echo $answer?></p>
                        </div>
                    </div>
                
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <p class="faq-note">Masz inne pytanie? <a href="#kontakt">Napisz do nas</a></p>
  </div>
</section>