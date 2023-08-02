export default class PriceTable {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $module_pricetable: document.querySelectorAll(".module.price-table"), 
      $price_toggle: document.querySelector("#price-toggle"),
      $target: document.querySelector(".price-table"),
      $highlight: document.querySelectorAll(".price-toggle-wrapper > span"),
      $feature: document.querySelectorAll(".block-wrapper-mobile .feature"),
    };
    // Toggle event for yealry/monthly price
    if (this.elements.$module_pricetable) {
      //show the yearly payment option as default
      this.elements.$module_pricetable.forEach(($table)=> {
        $table.querySelector("#price-toggle").checked = false;
      });
      // this.elements.$price_toggle.checked = false;
      this.changePrice();
    }
    // Toggle event for feature content in mobile screen
    if (this.elements.$feature) {
      this.toggleFeature();
    }
  }
  changePrice() {
    this.elements.$module_pricetable.forEach(($table)=>{
      let $toggle = $table.querySelector("#price-toggle");
      let $highlight = $table.querySelectorAll(".price-toggle-wrapper > span");
      $toggle.addEventListener("change", () => {
        if ($toggle.checked) {
          $table.classList.add("monthly");
        } else {
          $table.classList.remove("monthly");
        }
        // highlight the text of the selected option
       $highlight.forEach(($text) => {
          $text.classList.toggle("checked");
        });
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
