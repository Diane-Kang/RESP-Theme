export default class SubNavigation {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $subnavi: document.querySelector(".subnavigation"),
      $subnavi_sticky: document.querySelector(".subnavigation.sticky"),
      $target: document.querySelector(".subnavi-sticky-marker"),
    };
    if (this.elements.$subnavi) {
      if (window.getComputedStyle(this.elements.$subnavi).display != "none") {
        this.event();
      }
    }
  }

  // 2. events

  event() {
    let options = {
      root: null,
      // rootMargin: "32px 0px 0px 0px",
    };
    let callback = (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          this.sticky_off();
        } else {
          this.sticky_on();
        }
      });
    };
    let observer = new IntersectionObserver(callback, options);
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
