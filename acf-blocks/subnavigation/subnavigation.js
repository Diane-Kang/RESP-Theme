export default class SubNavigation {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $subnavi: document.querySelector(".subnavigation"),
      $target: document.querySelector(".subnavi-sticky-marker"),
    };
    if (window.getComputedStyle(this.elements.$subnavi).display != "none") {
      this.event();
    }
  }

  // 2. events
  event() {
    let observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
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
