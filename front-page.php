<?php get_header(); ?>

<?php get_template_part( 'template-parts/site-nav' );?>

<?php get_template_part( 'template-parts/hero-section' );?>

<?php get_template_part( 'template-parts/services-section' );?>

<?php get_template_part( 'template-parts/process-section' );?>


<section id="opinie">
  <div class="wrap">
    <div class="testimonial-wrap reveal">
      <div>
        <span class="quote-mark">"</span>
        <blockquote>MYNT. przejęło nasze social media w chaosie i w trzy miesiące zamieniło je w jeden z głównych kanałów sprzedaży.</blockquote>
        <div class="author">
          <div class="av"></div>
          <div>
            <div class="name">Milena Leszko</div>
            <div class="role">Head of Marketing, Studio Nordic</div>
          </div>
        </div>
      </div>
      <div class="mini-metrics">
        <div class="mini-metric"><span class="lbl">Wzrost obserwujących</span><span class="val">+64%</span></div>
        <div class="mini-metric"><span class="lbl">Ruch z social media</span><span class="val mint">+91%</span></div>
        <div class="mini-metric"><span class="lbl">Koszt pozyskania leada</span><span class="val">−37%</span></div>
      </div>
    </div>
  </div>
</section>

<section id="kontakt">
  <div class="wrap">
    <div class="cta-section reveal">
      <div>
        <h2>Porozmawiajmy o Twoim feedzie</h2>
        <p>Bezpłatna, 30-minutowa konsultacja — powiemy Ci wprost, co możemy poprawić i ile to realnie kosztuje.</p>
      </div>
      <form class="cta-form" onsubmit="return false;">
        <div class="field">
          <label for="name">IMIĘ I NAZWISKO</label>
          <input id="name" type="text" placeholder="Jan Kowalski">
        </div>
        <div class="field">
          <label for="email">E-MAIL</label>
          <input id="email" type="email" placeholder="jan@firma.pl">
        </div>
        <div class="field">
          <label for="msg">O CZYM CHCESZ POROZMAWIAĆ?</label>
          <textarea id="msg" rows="3" placeholder="Krótko o marce i celu..."></textarea>
        </div>
        <button type="submit" class="btn btn-mint">Wyślij zgłoszenie</button>
      </form>
    </div>
  </div>
</section>

<?php get_footer(); ?>