// scroll progress bar
const progressBar = document.getElementById("scrollProgress");
const headerEl = document.getElementById("siteHeader");
window.addEventListener(
  "scroll",
  () => {
    const h = document.documentElement;
    const scrolled = (h.scrollTop / (h.scrollHeight - h.clientHeight)) * 100;
    progressBar.style.width = scrolled + "%";
    headerEl.classList.toggle("scrolled", h.scrollTop > 30);
  },
  { passive: true },
);

// scroll reveal
const revealEls = document.querySelectorAll(".reveal, .reveal-stagger");
const io = new IntersectionObserver(
  (entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting) {
        e.target.classList.add("in");
        io.unobserve(e.target);
      }
    });
  },
  { threshold: 0.15 },
);
revealEls.forEach((el) => io.observe(el));

// process progress line trigger
const processSteps = document.getElementById("processSteps");
const procIO = new IntersectionObserver(
  (entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add("in"), 200);
        procIO.unobserve(e.target);
      }
    });
  },
  { threshold: 0.4 },
);
procIO.observe(processSteps);

// count up numbers
const nums = document.querySelectorAll(".result .num");
const countIO = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseFloat(el.dataset.target);
        const suffix = el.dataset.suffix || "";
        const decimal = parseInt(el.dataset.decimal || "0");
        let start = null;
        const duration = 1400;
        function step(ts) {
          if (!start) start = ts;
          const progress = Math.min((ts - start) / duration, 1);
          const eased = 1 - Math.pow(1 - progress, 3);
          const val = target * eased;
          el.textContent =
            (decimal ? val.toFixed(decimal) : Math.round(val)) + suffix;
          if (progress < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
        countIO.unobserve(el);
      }
    });
  },
  { threshold: 0.5 },
);
nums.forEach((el) => countIO.observe(el));

// subtle parallax on hero visual based on pointer position
const heroVisual = document.querySelector(".hero-visual");
if (heroVisual && window.matchMedia("(hover:hover)").matches) {
  document.querySelector(".hero").addEventListener("mousemove", (e) => {
    const rect = heroVisual.getBoundingClientRect();
    const relX = (e.clientX - rect.left - rect.width / 2) / rect.width;
    const relY = (e.clientY - rect.top - rect.height / 2) / rect.height;
    heroVisual.querySelectorAll(".post-card").forEach((card, i) => {
      const depth = (i + 1) * 6;
      card.style.transform += "";
      card.style.setProperty("--px", relX * depth + "px");
      card.style.setProperty("--py", relY * depth + "px");
    });
  });
}
