<?php
$logo = get_field('logo');
?>

<div class="scroll-progress" id="scrollProgress"></div>
<div class="noise-layer"></div>
<div class="ambient"><div class="blob b1"></div><div class="blob b2"></div><div class="blob b3"></div></div>

<header id="siteHeader">
  <nav>
    <!-- <?php echo esc_url( home_url( '/' ) ); ?> -->
    <a href="#" ><img src="<?php echo esc_url( $logo ); ?>" alt="logo" class="logo"></a>
    <div class="nav-links">
      <a href="#uslugi">Usługi</a>
      <a href="#proces">Proces</a>
      <a href="#kontakt">Kontakt</a>
    </div>
    <div class="nav-cta">
      <a href="#kontakt" class="btn btn-primary">Umów rozmowę</a>
    </div>
  </nav>
</header>