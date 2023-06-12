/**
 * Helper class with useful functions
 */
class Helper {
  /**
   * initialize
   */
  constructor() {
    this.steps = {
      mobilePortrait: 544,
      mobile: 767,
      tabletPortrait: 860,
      tabletLandscape: 1024,
      desktop: 1210,
    };
  }

  /**
   *  Checks the current query.
   *
   *  @param {string} device - Which Device should be checked.
   *
   *  @returns {boolean} check - Returns true or false current device.
   */
  isDevice(device) {
    let check = false;

    if (device === "mobile") {
      // mobile is landscape and portrait << a little exception here, but better to handle!
      check = this.getWidth() <= this.steps.mobile;
    } else if (device === "mobile-portrait") {
      check = this.getWidth() <= this.steps.mobilePortrait;
    } else if (device === "> mobile" || device === "gt mobile") {
      check = this.getWidth() > this.steps.mobile;
    }

    if (device === "tablet-portrait") {
      check =
        this.getWidth() > this.steps.mobile &&
        this.getWidth() <= this.steps.tabletPortrait;
    } else if (
      device === "> tablet-portrait" ||
      device === "gt tablet-portrait"
    ) {
      check = this.getWidth() > this.steps.tabletPortrait;
    } else if (
      device === "< tablet-portrait" ||
      device === "lt tablet-portrait"
    ) {
      check = this.getWidth() <= this.steps.mobile;
    } else if (
      device === "<= tablet-portrait" ||
      device === "lte tablet-portrait"
    ) {
      check = this.getWidth() <= this.steps.tabletPortrait;
    }

    if (device === "tablet-landscape") {
      check =
        this.getWidth() > this.steps.tabletPortrait &&
        this.getWidth() <= this.steps.tabletLandscape;
    } else if (
      device === "> tablet-landscape" ||
      device === "gt tablet-landscape"
    ) {
      check = this.getWidth() > this.steps.tabletLandscape;
    } else if (
      device === "< tablet-landscape" ||
      device === "lt tablet-landscape"
    ) {
      check = this.getWidth() <= this.steps.tabletPortrait;
    } else if (
      device === "<= tablet-landscape" ||
      device === "lte tablet-landscape"
    ) {
      check = this.getWidth() <= this.steps.tabletLandscape;
    }

    if (device === "desktop") {
      check = this.getWidth() > this.steps.tabletLandscape;
    } else if (device === "< desktop" || device === "lt desktop") {
      check = this.getWidth() <= this.steps.tabletLandscape;
    } else if (device === "<= desktop" || device === "lte desktop") {
      check = this.getWidth() <= this.steps.desktop;
    }

    return check;
  }

  /**
   *   Is touch device or not.
   *
   *   @returns {boolean} - Returns if ontouchstart is available.
   */
  isTouch() {
    return "ontouchstart" in window;
  }

  /**
   *   returns browser width (crossbrowser)
   *
   *   @returns {number} - Returns the width of current browser.
   */
  getWidth() {
    return (
      window.innerWidth ||
      document.documentElement.clientWidth ||
      document.body.clientWidth
    );
  }

  /**
   *   returns browser height (crossbrowser)
   *
   *   @returns {number} - Returns the height of current browser.
   */
  getHeight() {
    return (
      window.innerHeight ||
      document.documentElement.clientHeight ||
      document.body.clientHeight
    );
  }

  /**
   * Scrolls to an element.
   *
   * @param {object|string} element - The element to be scrolled to.
   * @param {number} duration - Time that needs for scrolling in ms.
   * @param {number} offset - The offset of scroll position.
   *
   * @returns {void}
   */
  scrollTo(element, duration = 2000, offset = 0) {
    // if string
    if (typeof element === "string") {
      element = document.querySelector(element);
    }

    // if element is not an object, let it be…
    if (typeof element !== "object") {
      return;
    }

    const elementY =
      element.getBoundingClientRect().top + window.pageYOffset - offset;
    const startingY = window.pageYOffset;
    const diff = elementY - startingY;
    let start;

    // Bootstrap our animation - it will get called right before next frame shall be rendered.
    window.requestAnimationFrame(function step(timestamp) {
      if (!start) {
        start = timestamp;
      }

      // Elapsed milliseconds since start of scrolling.
      const time = timestamp - start;
      // Get percent of completion in range [0, 1].
      const percent = Math.min(time / duration, 1);

      window.scrollTo(0, startingY + diff * percent);

      // Proceed with animation as long as we wanted it to.
      if (time < duration) {
        window.requestAnimationFrame(step);
      }
    });
  }

  /**
   *   Get a specific cookie value.
   *
   *   @param {string} name - Name of cookie field.
   *
   *   @returns {string} value
   */
  getCookie(name) {
    if (document.cookie.length > 0) {
      let posStart = document.cookie.indexOf(name + "=");
      let posEnd;

      if (posStart !== -1) {
        posStart = posStart + name.length + 1;
        posEnd = document.cookie.indexOf(";", posStart);

        if (posEnd === -1) {
          posEnd = document.cookie.length;
        }

        return unescape(document.cookie.substring(posStart, posEnd));
      }
    }

    return "";
  }

  /**
   *   Set a cookie with specific arguments.
   *
   *   @param {string} name - Name of cookie field.
   *   @param {string} value - Value of cookie name.
   *   @param {number} days - cookie expiration
   *
   *   @returns {void}
   */
  setCookie(name, value, days) {
    let expires = "";

    if (days) {
      const date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toGMTString();
    }

    document.cookie = name + "=" + value + expires + "; path=/";
  }

  /**
   * Disable scrolling of the page
   *
   * @returns {void}
   */
  disableScrolling() {
    const $body = document.querySelector("body");

    $body.style.overflowX = "hidden";
    $body.style.overflowY = "scroll";
    $body.style.position = "fixed";
    $body.style.width = "100%";
    $body.style.height = "100%";
  }

  /**
   * Enable scrolling of the page
   *
   * @returns {void}
   */
  enableScrolling() {
    const $body = document.querySelector("body");

    $body.style.removeProperty("overflowX");
    $body.style.removeProperty("overflowY");
    $body.style.removeProperty("position");
    $body.style.removeProperty("width");
    $body.style.removeProperty("height");
  }
}

export default new Helper();
