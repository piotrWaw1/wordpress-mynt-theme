<?php
$sub_title = esc_html(get_field('sub_title'));
$title = esc_html(get_field('title'));
$description = esc_html(get_field('description'));
?>


<section id="uslugi">
  <div class="wrap">
    <div class="section-head reveal">
      <div class="eyebrow-line"><?php echo($sub_title)?></div>
        <h2><?php echo($title)?></h2>
        <p><?php echo($description)?></p>
    </div>
    <div class="services-grid reveal-stagger">
      <?php if ( have_rows('info_cards') ) : ?>
        <?php while ( have_rows('info_cards') ) : the_row();
            $image  = get_sub_field('image');
            $title = get_sub_field('title');
            $desc  = get_sub_field('description');
        ?>
            <div class="service-card">
                <div class="service-icon">
                    <?php if ( $image ) : ?>
                        <?php echo ( $image ); ?>
                    <?php endif; ?>
                </div>
                <h3><?php echo esc_html( $title ); ?></h3>
                <p><?php echo esc_html( $desc ); ?></p>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
    </div> 
  </div>
</section>