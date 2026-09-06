<?php
$logo = get_field('logo');
$instagram = get_field('instagram');

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
      <?php if ( ! empty( $instagram['instagram_url'] ) && is_array( $instagram['instagram_url'] ) ) : ?>
          <div class="nav-social" aria-label="Media społecznościowe">
            <a class="social-link" href="<?php echo esc_url( $instagram['instagram_url']['url'] ); ?>" aria-label="<?php echo esc_attr( $instagram['instagram_url']['title'] ); ?>">
                <?php echo $instagram['icon']; ?>
            </a>
          </div>
      <?php endif; ?>
      <a href="/#kontakt" class="btn btn-primary">Umów rozmowę</a>
    </div>
    <button class="hamburger" id="hamburgerBtn" aria-label="Otwórz menu" aria-expanded="false" aria-controls="mobileMenu">
      <span></span><span></span><span></span>
    </button>
  </nav>
  <div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-links">
      <a href="/#uslugi">Usługi</a>
      <a href="/#proces">Proces</a>
      <a href="/#kontakt">Kontakt</a>
    </div>
      <?php if ( ! empty( $instagram['instagram_url'] ) && is_array( $instagram['instagram_url'] ) ) : ?>
        <div class="mobile-menu-social" aria-label="Media społecznościowe">  
          <a class="social-link" href="<?php echo esc_url( $instagram['instagram_url']['url'] ); ?>" aria-label="<?php echo esc_attr( $instagram['instagram_url']['title'] ); ?>">
              <?php echo $instagram['icon']; ?>
          </a>
        </div>
      <?php endif; ?>
    <a href="/#kontakt" class="btn btn-primary mobile-menu-cta">Umów rozmowę</a>
  </div>
</header>