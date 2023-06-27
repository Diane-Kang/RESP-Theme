export default class PriceTable {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $price_toggle: document.querySelector("#price-toggle"),
      $target: document.querySelector(".price-table"),
      $highlight: document.querySelectorAll(".price-toggle-wrapper > span"),
      $feature: document.querySelectorAll(".block-wrapper-mobile .feature"),
    };
    //show the yearly payment option as default
    this.elements.$price_toggle.checked = false;
    // Toggle event for yealry/monthly price
    if (this.elements.$price_toggle) {
      this.changePrice();
    }
    // Toggle event for feature content in mobile screen
    if (this.elements.$feature) {
      this.toggleFeature();
    }
  }
  changePrice() {
    this.elements.$price_toggle.addEventListener("change", () => {
      if (this.elements.$price_toggle.checked) {
        this.elements.$target.classList.add("monthly");
      } else {
        this.elements.$target.classList.remove("monthly");
      }
      // highlight the text of the selected option
      this.elements.$highlight.forEach(($text) => {
        $text.classList.toggle("checked");
      });
    });
  }
  toggleFeature() {
    this.elements.$feature.forEach(($f) => {
      let $toggle = $f.querySelector(".feature-toggle");
      $toggle.addEventListener("click", () => {
        $f.classList.toggle("open");
      });
    });
  }
}

//Add "mobile" if the screen size is smaller then $
// window.addEventListener("DOMContentLoaded", function () {
//   var windowSize = checkWidth();

//   // Execute on load
//   checkWidth();

//   // Bind event listener to window resize
//   window.addEventListener("resize", function () {
//     // remove console.log from production version - useful for while in development
//     console.log("checkWidth: ", checkWidth() + "px");
//   });

//   function checkWidth() {
//     var windowSize =
//       window.innerWidth ||
//       document.documentElement.clientWidth ||
//       document.body.clientWidth;
//     return windowSize;
//   }
// });
