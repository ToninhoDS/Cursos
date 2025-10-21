// parallax
// https://github.com/yitengjun/ukiyo-js
const els = document.querySelectorAll(".ukiyo");
els.forEach((el) => {
  const parallax = new Ukiyo(el);
});

// smooth scroll
const lenis = new Lenis();

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

// modal img
function openModal(image) {
  const modal = document.getElementById("imageModal");
  const modalImg = document.getElementById("modalImage");
  modal.style.display = "block";
  modalImg.src = image.src;
}

function closeModal() {
  const modal = document.getElementById("imageModal");
  modal.style.display = "none";
}

