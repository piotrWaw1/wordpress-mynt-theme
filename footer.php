  <footer>
  <div class="wrap">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="#" class="logo">MYNT<span class="dot">.</span></a>
        <p>Agencja social media dla marek, które chcą prowadzić rozmowę, a nie tylko publikować.</p>
      </div>
      <div class="footer-cols">
        <div class="footer-col">
          <h4>NAWIGACJA</h4>
          <ul>
            <li><a href="#uslugi">Usługi</a></li>
            <li><a href="#proces">Proces</a></li>
            <li><a href="#efekty">Efekty</a></li>
            <li><a href="#opinie">Opinie</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>KONTAKT</h4>
          <ul>
            <li><a href="mailto:hello@mynt-social.pl">hello@mynt-social.pl</a></li>
            <li><a href="tel:+48000000000">+48 000 000 000</a></li>
            <li><a href="#">Warszawa, Polska</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 MYNT. Wszystkie prawa zastrzeżone.</span>
      <div class="socials">
        <a href="#" aria-label="Instagram"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg></a>
        <a href="#" aria-label="LinkedIn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M7 10v7M7 7v.01M12 17v-4a2 2 0 0 1 4 0v4M12 13v4"/></svg></a>
        <a href="#" aria-label="TikTok"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 3v10.5a3.5 3.5 0 1 1-3-3.46"/><path d="M15 6.5a4 4 0 0 0 4 4"/></svg></a>
      </div>
    </div>
  </div>
</footer>
  
  <script>
  // scroll progress bar
  const progressBar = document.getElementById('scrollProgress');
  const headerEl = document.getElementById('siteHeader');
  window.addEventListener('scroll', ()=>{
    const h = document.documentElement;
    const scrolled = (h.scrollTop) / (h.scrollHeight - h.clientHeight) * 100;
    progressBar.style.width = scrolled + '%';
    headerEl.classList.toggle('scrolled', h.scrollTop > 30);
  },{passive:true});

  // scroll reveal
  const revealEls = document.querySelectorAll('.reveal, .reveal-stagger');
  const io = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        e.target.classList.add('in');
        io.unobserve(e.target);
      }
    });
  },{threshold:0.15});
  revealEls.forEach(el=>io.observe(el));

  // process progress line trigger
  const processSteps = document.getElementById('processSteps');
  const procIO = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        setTimeout(()=>e.target.classList.add('in'), 200);
        procIO.unobserve(e.target);
      }
    });
  },{threshold:0.4});
  procIO.observe(processSteps);

  // count up numbers
  const nums = document.querySelectorAll('.result .num');
  const countIO = new IntersectionObserver((entries)=>{
    entries.forEach(entry=>{
      if(entry.isIntersecting){
        const el = entry.target;
        const target = parseFloat(el.dataset.target);
        const suffix = el.dataset.suffix || '';
        const decimal = parseInt(el.dataset.decimal || '0');
        let start = null;
        const duration = 1400;
        function step(ts){
          if(!start) start = ts;
          const progress = Math.min((ts-start)/duration,1);
          const eased = 1 - Math.pow(1-progress,3);
          const val = target*eased;
          el.textContent = (decimal ? val.toFixed(decimal) : Math.round(val)) + suffix;
          if(progress < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
        countIO.unobserve(el);
      }
    });
  },{threshold:0.5});
  nums.forEach(el=>countIO.observe(el));

  // subtle parallax on hero visual based on pointer position
  const heroVisual = document.querySelector('.hero-visual');
  if(heroVisual && window.matchMedia('(hover:hover)').matches){
    document.querySelector('.hero').addEventListener('mousemove', (e)=>{
      const rect = heroVisual.getBoundingClientRect();
      const relX = (e.clientX - rect.left - rect.width/2) / rect.width;
      const relY = (e.clientY - rect.top - rect.height/2) / rect.height;
      heroVisual.querySelectorAll('.post-card').forEach((card,i)=>{
        const depth = (i+1)*6;
        card.style.transform += '';
        card.style.setProperty('--px', (relX*depth) + 'px');
        card.style.setProperty('--py', (relY*depth) + 'px');
      });
    });
  }
</script>

<?php wp_footer(); ?>

</body>
</html>