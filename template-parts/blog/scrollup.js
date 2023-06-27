export default class Scrollup {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $btn: document.querySelector(".scrollup-button"),
    };
    if (this.elements.$btn) {
      this.events();
    }
  }

  // 2. events
  events() {
    window.addEventListener("scroll", (e) => {
      this.elements.$btn.style.visibility =
        window.scrollY > 40 ? "visible" : "hidden";
    });
    this.elements.$btn.addEventListener("click", this.scrollToTop);
  }

  // 3. methods (function, action...)
  scrollToTop() {
    document.documentElement.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  }
}
