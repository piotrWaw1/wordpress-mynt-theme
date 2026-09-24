<?php
$logo = esc_url(get_field('logo', 'option'));
$contact_button = get_field('contact_button', 'option');
?>

<div class="scroll-progress" id="scrollProgress"></div>
<div class="noise-layer"></div>
<div class="ambient"><div class="blob b1"></div><div class="blob b2"></div><div class="blob b3"></div></div>

<header id="siteHeader">
  <nav>
    <a href="/" ><img src="<?php echo esc_url( $logo ); ?>" alt="logo" class="logo"></a>
    <?php if ( have_rows('navigation', 'option') ) : ?>
      <div class="nav-links">
        <?php while ( have_rows('navigation', 'option') ) : the_row();
          $item = get_sub_field('navigation_item');
        ?>
          <?php if ($item["title"] && $item["url"]) : ?>
            <a href="<?php echo esc_url($item["url"])?>"><?php echo esc_html($item["title"])?></a>
          <?php endif; ?>
       <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <div class="nav-cta">
      <?php get_template_part( 'template-parts/social-media-links' );?>
      <?php if ($contact_button) :?>
        <a href="<?php echo esc_url($contact_button["url"])?>" class="btn btn-primary"><?php echo ($contact_button["title"])?></a>
      <?php endif;?>
    </div>
    <button class="hamburger" id="hamburgerBtn" aria-label="Otwórz menu" aria-expanded="false" aria-controls="mobileMenu">
      <span></span><span></span><span></span>
    </button>
  </nav>
  <div class="mobile-menu" id="mobileMenu">
    <?php if ( have_rows('navigation', 'option') ) : ?>
      <div class="mobile-menu-links">
        <?php while ( have_rows('navigation', 'option') ) : the_row();
          $item = get_sub_field('navigation_item');
        ?>
          <?php if ($item["title"] && $item["url"]) : ?>
            <a href="<?php echo esc_url($item["url"])?>"><?php echo esc_html($item["title"])?></a>
          <?php endif; ?>
       <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <?php get_template_part( 'template-parts/social-media-links' );?>
    <?php if ($contact_button) :?>
      <a href="<?php echo esc_url($contact_button["url"])?>" class="btn btn-primary mobile-menu-cta"><?php echo ($contact_button["title"])?></a>
    <?php endif;?>
  </div>
</header>