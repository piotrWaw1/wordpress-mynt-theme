// mobile hamburger menu
const hamburgerBtn = document.getElementById("hamburgerBtn");
const mobileMenu = document.getElementById("mobileMenu");
hamburgerBtn.addEventListener("click", () => {
  const isOpen = mobileMenu.classList.toggle("open");
  hamburgerBtn.setAttribute("aria-expanded", isOpen);
  hamburgerBtn.setAttribute(
    "aria-label",
    isOpen ? "Zamknij menu" : "Otwórz menu",
  );
});
mobileMenu.querySelectorAll("a").forEach((link) => {
  link.addEventListener("click", () => {
    mobileMenu.classList.remove("open");
    hamburgerBtn.setAttribute("aria-expanded", "false");
    hamburgerBtn.setAttribute("aria-label", "Otwórz menu");
  });
});
window.addEventListener("resize", () => {
  if (window.innerWidth > 825 && mobileMenu.classList.contains("open")) {
    mobileMenu.classList.remove("open");
    hamburgerBtn.setAttribute("aria-expanded", "false");
    hamburgerBtn.setAttribute("aria-label", "Otwórz menu");
  }
});

// scroll progress bar
const progressBar = document.getElementById("scrollProgress");
const headerEl = document.getElementById("siteHeader");
let scrolled = false;
window.addEventListener(
  "scroll",
  () => {
    const h = document.documentElement;
    const percent = (h.scrollTop / (h.scrollHeight - h.clientHeight)) * 100;
    progressBar.style.width = percent + "%";

    if (!scrolled && h.scrollTop > 40) {
      scrolled = true;
      headerEl.classList.add("scrolled");
    } else if (scrolled && h.scrollTop < 30) {
      scrolled = false;
      headerEl.classList.remove("scrolled");
    }
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

document.addEventListener("DOMContentLoaded", function () {
  var widget = document.querySelector(".cf-turnstile");
  if (widget) {
    widget.setAttribute(
      "data-size",
      window.innerWidth < 480 ? "compact" : "flexible",
    );
  }
});

// FAQ accordion
const faqItems = document.querySelectorAll("#faqList .faq-item");
faqItems.forEach((item) => {
  const question = item.querySelector(".faq-question");
  const answer = item.querySelector(".faq-answer");
  question.addEventListener("click", () => {
    const isOpen = item.classList.contains("open");
    faqItems.forEach((other) => {
      other.classList.remove("open");
      other.querySelector(".faq-answer").style.maxHeight = null;
      other
        .querySelector(".faq-question")
        .setAttribute("aria-expanded", "false");
    });
    if (!isOpen) {
      item.classList.add("open");
      answer.style.maxHeight = answer.scrollHeight + "px";
      question.setAttribute("aria-expanded", "true");
    }
  });
});
