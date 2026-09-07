<?php
$logo = get_field('logo');
$nav_contact_button = get_field('nav_contact_button');

$nav1 = get_field('nav1');
$nav2 = get_field('nav2');
$nav3 = get_field('nav3');
?>

<div class="scroll-progress" id="scrollProgress"></div>
<div class="noise-layer"></div>
<div class="ambient"><div class="blob b1"></div><div class="blob b2"></div><div class="blob b3"></div></div>

<header id="siteHeader">
  <nav>
    <a href="/#" ><img src="<?php echo esc_url( $logo ); ?>" alt="logo" class="logo"></a>
    <div class="nav-links">
      <a href="/#uslugi"><?php echo $nav1?></a>
      <a href="/#proces"><?php echo $nav2?></a>
      <a href="/#kontakt"><?php echo $nav3?></a>
    </div>
    <div class="nav-cta">
      <?php get_template_part( 'template-parts/social-media-links' );?>
      <a href="/#kontakt" class="btn btn-primary"><?php echo ($nav_contact_button)?></a>
    </div>
    <button class="hamburger" id="hamburgerBtn" aria-label="Otwórz menu" aria-expanded="false" aria-controls="mobileMenu">
      <span></span><span></span><span></span>
    </button>
  </nav>
  <div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-links">
      <a href="/#uslugi"><?php echo $nav1?></a>
      <a href="/#proces"><?php echo $nav2?></a>
      <a href="/#kontakt"><?php echo $nav3?></a>
    </div>
      <?php get_template_part( 'template-parts/social-media-links' );?>
    <a href="/#kontakt" class="btn btn-primary mobile-menu-cta"><?php echo ($nav_contact_button)?></a>
  </div>
</header>