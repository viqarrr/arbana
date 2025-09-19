import "./bootstrap";

const slides = document.querySelectorAll("[data-carousel-item]");
const slideIndicators = document.querySelectorAll("[data-carousel-slide-to]");
let currentIndex = 0;
let autoPlayInterval;

// init slides
gsap.set(slides, { opacity: 0, zIndex: 0 });
gsap.set(slides[0], { opacity: 1, zIndex: 1 });

// tandai indikator awal
slideIndicators[0].classList.remove("bg-white/40");
slideIndicators[0].classList.add("bg-white", "ring", "ring-white");

// 🔥 reset teks slide pertama sebelum animasi
gsap.set(slides[0].querySelectorAll("h1, p, a"), {
  opacity: 0,
  y: 40,
});

// 🔥 animasi teks pertama kali load
gsap.to(slides[0].querySelectorAll("h1, p, a"), {
  opacity: 1,
  y: 0,
  duration: 0.8,
  stagger: 0.3,
  ease: "power3.out",
  delay: 0.3, // jeda dikit biar smooth
});

function showSlide(index) {
  if (index === currentIndex) return;

  const prevSlide = slides[currentIndex];
  const nextSlide = slides[index];

  const tl = gsap.timeline();

  // fade out teks di slide lama
  tl.to(
    prevSlide.querySelectorAll("h1, p, a"),
    {
      opacity: 0,
      y: -40,
      duration: 0.6,
      stagger: 0.2,
      ease: "power3.in",
    },
    0
  );

  // fade out slide lama
  tl.to(
    prevSlide,
    {
      opacity: 0,
      duration: 0.8,
      zIndex: 0,
      ease: "power2.out",
    },
    0
  );

  // fade in slide baru
  tl.to(
    nextSlide,
    {
      opacity: 1,
      duration: 0.8,
      zIndex: 1,
      ease: "power2.inOut",
      onStart: () => {
        // reset teks slide baru sebelum masuk
        gsap.set(nextSlide.querySelectorAll("h1, p, a"), {
          opacity: 0,
          y: 40,
        });
      },
    },
    "-=0.4" // overlap sedikit biar halus
  );

  // fade in teks slide baru
  tl.to(
    nextSlide.querySelectorAll("h1, p, a"),
    {
      opacity: 1,
      y: 0,
      duration: 0.8,
      stagger: 0.3,
      ease: "power3.out",
    },
    "-=0.2"
  );

  // update indikator
  slideIndicators.forEach((btn, i) => {
    btn.classList.remove("bg-white", "ring", "ring-white");
    btn.classList.add("bg-white/40");
    if (i === index) {
      btn.classList.remove("bg-white/40");
      btn.classList.add("bg-white", "ring", "ring-white");
    }
  });

  currentIndex = index;
}


// indicator click
slideIndicators.forEach((btn, i) => {
  btn.classList.add("cursor-pointer"); // biar bisa diklik
  btn.addEventListener("click", () => {
    showSlide(i);
    resetAutoPlay();
  });
});

// autoplay
function startAutoPlay() {
  autoPlayInterval = setInterval(() => {
    let next = (currentIndex + 1) % slides.length;
    showSlide(next);
  }, 5000);
}

function resetAutoPlay() {
  clearInterval(autoPlayInterval);
  startAutoPlay();
}

startAutoPlay();



// footer
gsap.registerPlugin(ScrollTrigger);

// Footer reveal keseluruhan
gsap.from("footer", {
    y: 100,
    opacity: 0,
    duration: 1.2,
    ease: "power3.out",
    scrollTrigger: {
        trigger: "footer",
        start: "top bottom",
    },
});

// Animasi tiap kolom footer (tanpa menimpa ikon)
gsap.from(".footer-logo, .footer-links, .footer-servis", {
    y: 50,
    opacity: 0,
    duration: 1,
    stagger: 0.3,
    ease: "back.out(1.7)",
    scrollTrigger: {
        trigger: "footer",
        start: "top 80%",
    },
});
