export default class PriceToggle {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $toggle: document.querySelector("#price-toggle"),
      $target: document.querySelector(".price-table"),
    };
    this.elements.$toggle.checked = false;

    if (this.elements.$toggle) {
      this.events();
    }
  }
  events() {
    this.elements.$toggle.addEventListener("change", () => {
      if (this.elements.$toggle.checked) {
        this.elements.$target.classList.add("monthly");
      } else {
        this.elements.$target.classList.remove("monthly");
      }
    });
  }
}
