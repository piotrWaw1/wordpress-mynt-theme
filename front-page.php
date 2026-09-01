<?php get_header(); ?>

<?php get_template_part( 'template-parts/site-nav' );?>

<?php get_template_part( 'template-parts/hero-section' );?>

<?php get_template_part( 'template-parts/services-section' );?>


<section id="proces">
  <div class="wrap">
    <div class="section-head reveal">
      <div class="eyebrow-line">JAK PRACUJEMY</div>
      <h2>Pięć kroków od pomysłu do publikacji</h2>
      <p>Ten sam sprawdzony proces dla każdej marki — przewidywalny, transparentny i bez niespodzianek.</p>
    </div>
    <div class="process-steps reveal" id="processSteps">
      <div class="progress-line"></div>
      <div class="step">
        <div class="num">01</div>
        <h3>Poznanie marki</h3>
        <p>Warsztat strategiczny, audyt kanałów i analiza konkurencji.</p>
      </div>
      <div class="step">
        <div class="num">02</div>
        <h3>Strategia</h3>
        <p>Filary treści, ton komunikacji i kalendarz publikacji na kwartał.</p>
      </div>
      <div class="step">
        <div class="num">03</div>
        <h3>Tworzenie</h3>
        <p>Produkcja zdjęć, wideo i grafik zgodnie z ustaloną strategią.</p>
      </div>
      <div class="step">
        <div class="num">04</div>
        <h3>Publikacja</h3>
        <p>Codzienne wdrożenie treści i moderacja społeczności.</p>
      </div>
      <div class="step">
        <div class="num">05</div>
        <h3>Optymalizacja</h3>
        <p>Analiza wyników i korekta strategii co miesiąc.</p>
      </div>
    </div>
  </div>
</section>

<!-- <section class="results" id="efekty">
  <div class="wrap">
    <div class="section-head reveal" style="max-width:560px;">
      <div class="eyebrow-line">LICZBY</div>
      <h2>Efekty, które widać w raportach</h2>
      <p>Średnie wyniki marek, które prowadzimy od minimum 6 miesięcy.</p>
    </div>
    <div class="results-grid reveal-stagger">
      <div class="result"><span class="num" data-target="128" data-suffix="%">0%</span><span class="lbl">wzrost zaangażowania</span></div>
      <div class="result"><span class="num" data-target="3.2" data-decimal="1" data-suffix="M">0M</span><span class="lbl">zasięgu miesięcznie</span></div>
      <div class="result"><span class="num" data-target="40" data-suffix="+">0</span><span class="lbl">obsługiwanych marek</span></div>
      <div class="result"><span class="num" data-target="6" data-suffix=" lat">0</span><span class="lbl">doświadczenia agencji</span></div>
    </div>
  </div>
</section> -->

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