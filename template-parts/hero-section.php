<?php
$hero_title = get_field('hero_title');
$hero_description = esc_html(get_field('hero_description'));

$card1_image = esc_html(get_field('card1'));
$card1_title = esc_html(get_field('card1_title'));

$card2_image = esc_html(get_field('card2'));
$card2_title = esc_html(get_field('card2_title'));

$card3_image = esc_html(get_field('card3'));
$card3_title = esc_html(get_field('card3_title'));
?>

<section class="hero">
  <div class="hero-inner">
    <div>
      <h1><?php echo($hero_title); ?></h1>
      <p class="lead"><?php echo($hero_description); ?></p>
      <div class="hero-ctas">
        <a href="#kontakt" class="btn btn-mint">Umów bezpłatną konsultację</a>
        <!-- <a href="#efekty" class="btn btn-ghost">Zobacz efekty →</a> -->
      </div>
    </div>

    <div class="hero-visual">
      <div class="orbit-ring"></div>
      <svg class="pulse-line" viewBox="0 0 200 60" fill="none">
        <path d="M0 40 L30 40 L45 15 L60 50 L75 25 L90 40 L120 40 L135 10 L150 45 L165 30 L200 30" stroke="#5FE9BC" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>

      <div class="post-card c1">
        <div class="thumb">
          <?php if ( $card1_image ) : ?>
            <img src="<?php echo esc_url( $card1_image ); ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
          <?php endif; ?>
        </div>
        <div class="body">
          <div class="row1"><div class="avatar-sm"></div><div class="handle"><?php echo($card1_title);?></div></div>
          <div class="cap w80"></div>
          <div class="cap w60"></div>
          <div class="stats"><span>♥ <span class="num">2 480</span></span><span>💬 <span class="num">96</span></span></div>
        </div>
      </div>

      <div class="post-card c2">
        <div class="thumb">
          <?php if ( $card2_image ) : ?>
            <img src="<?php echo esc_url( $card2_image ); ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
          <?php endif; ?>
        </div>
        <div class="body">
          <div class="row1"><div class="avatar-sm" style="background:#1F9E77;"></div><div class="handle"><?php echo($card2_title);?></div></div>
          <div class="cap w80"></div>
          <div class="cap w60"></div>
          <div class="stats"><span>♥ <span class="num">5 120</span></span><span>↗ <span class="num">312</span></span></div>
        </div>
      </div>
      <div class="post-card c3">
        <div class="thumb">
          <?php if ( $card3_image ) : ?>
            <img src="<?php echo esc_url( $card3_image ); ?>" alt="" style="width:100%;height:100%;object-fit:cover;">
          <?php endif; ?>
        </div>
        <div class="body">
          <div class="row1"><div class="avatar-sm" style="background:#3A1E6B;"></div><div class="handle"><?php echo($card3_title);?></div></div>
          <div class="cap w80"></div>
          <div class="cap w60"></div>
          <div class="stats"><span>♥ <span class="num">1 903</span></span><span>💬 <span class="num">64</span></span></div>
        </div>
      </div>
      <div class="badge-float"><span class="arrow">↑</span> zaangażowanie +128%</div>
    </div>
  </div>
</section>
