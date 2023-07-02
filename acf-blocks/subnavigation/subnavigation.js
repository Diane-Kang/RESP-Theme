export default class SubNavigation {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $subnavi: document.querySelector(".subnavigation"),
      $target: document.querySelector(".subnavi-sticky-marker"),
    };
    if (this.elements.$subnavi) {
      this.event();
    }
  }

  // 2. events
  event() {
    // observer. not seeing $subnavi -> add class sticky on module
    //if (no more showing $subnavi){
    // this.sticky_feature();
    // }
    let observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
          this.sticky_off();
        } else {
          this.sticky_on();
        }
      });
    });
    observer.observe(this.elements.$target);
  }

  // 3. methods (function, action...)
  sticky_on() {
    this.elements.$subnavi.classList.add("sticky");
  }
  sticky_off() {
    this.elements.$subnavi.classList.remove("sticky");
  }
}
