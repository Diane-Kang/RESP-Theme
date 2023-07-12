import $ from 'jquery';

export default class Slider {
    // 1. describe and create/initiate our object
    constructor() {
      this.elements = {
        $card: document.querySelector(".module.cards"),
      };
      if (this.elements.$card != null) {
        this.event();
      }
    }
  
    // 2. events
    event() {
      // observer. not seeing $subnavi -> add class sticky on module
      //if (no more showing $subnavi){
      // this.sticky_feature();
      // }
    //   let observer = new IntersectionObserver((entries) => {
    //     entries.forEach((entry) => {
    //       console.log(entry);
    //       if (entry.isIntersecting) {
    //         this.sticky_off();
    //       } else {
    //         this.sticky_on();
    //       }
    //     });
    //   });
    //   observer.observe(this.elements.$target);
    console.log('some');
   // $.noConflict();
//  $("html").on("swipeleft", function(){
    $("html").on("swipeleft", function(){  
console.log("jQuery is still working!");
alert('Hallo Diane');
  });
    //pondo sudo if swipe or click dot {
    //    do this;
//}
    }
  
    // 3. methods (function, action...)
    sticky_on() {
      this.elements.$card.classList.add("someclass");
    }
    sticky_off() {
      this.elements.$card.classList.remove("someclass");
    }
  }
  