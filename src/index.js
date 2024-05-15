import "../css/style.scss";

import Navigation from "../template-parts/navigation/navigation";
import Scrollup from "../template-parts/blog/scrollup";
import PriceTable from "../acf-blocks/price-table/price-table";

const navigation = new Navigation();
const scrollup = new Scrollup();
const price_table = new PriceTable();

//https://simplelightbox.com/ https://dbrekalo.github.io/simpleLightbox/
import SimpleLightbox from "../node_modules/simple-lightbox/dist/simpleLightbox";
import "../node_modules/simple-lightbox/dist/simpleLightbox.css"; // style

// new SimpleLightbox({
//   elements: ".light-box a",
// });

jQuery(document).ready(function ($) {
  jQuery(".card > .image-wrapper , .card > p.gallery-link").on(
    "click",
    function (e) {
      var $target = jQuery(e.currentTarget.parentNode);
      var $items = $target.find(".light-box a");
      SimpleLightbox.open({
        items: $items,
      });
    }
  );
});
