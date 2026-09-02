<?php
$sub_title = esc_html(get_field('sub_title_process'));
$title = esc_html(get_field('title_process'));
$description = esc_html(get_field('description_process'));

$rows = get_field('process_steps');
$count = $rows ? count($rows) : 0;
?>

<section id="proces">
  <div class="wrap">
    <div class="section-head reveal">
      <div class="eyebrow-line"><?php echo($sub_title)?></div>
      <h2><?php echo($title);?></h2>
      <p><?php echo($description);?></p>
    </div>
    <div class="process-steps-wrapper">
      <div class="process-steps reveal" id="processSteps" style="--steps-count: <?php echo $count; ?>;">
        <div class="progress-line"></div>
        <?php if (have_rows('process_steps')) : ?>
          <?php while ( have_rows('process_steps') ) : the_row();
                  $title = get_sub_field('title');
                  $desc  = get_sub_field('description');
                  $index = get_row_index();
          ?>
              <div class="step">
                  <div class="num"><?php echo($index);?></div>
                  <h3><?php echo($title);?></h3>
                  <p><?php echo($desc);?></p>
              </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>