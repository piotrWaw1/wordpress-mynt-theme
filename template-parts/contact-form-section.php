<?php
$title = esc_html(get_field('contact_form_title'));
$description = esc_html(get_field('contact_form_description'));
?>

<section id="kontakt">
  <div class="wrap">
    <div class="cta-section reveal">
      <div>
        <h2><?php echo($title); ?></h2>
        <p><?php echo($description); ?></p>
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