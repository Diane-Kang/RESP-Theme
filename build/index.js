/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./acf-blocks/price-table/price-table.js":
/*!***********************************************!*\
  !*** ./acf-blocks/price-table/price-table.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ PriceTable)
/* harmony export */ });
class PriceTable {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $module_pricetable: document.querySelectorAll(".toggle.module.price-table"),
      $price_toggle: document.querySelector("#price-toggle"),
      $target: document.querySelector(".price-table"),
      $highlight: document.querySelectorAll(".price-toggle-wrapper > span"),
      $feature: document.querySelectorAll(".toggle .block-wrapper-mobile .feature")
    };
    // Toggle event for yealry/monthly price
    if (this.elements.$module_pricetable) {
      //show the yearly payment option as default
      this.elements.$module_pricetable.forEach($table => {
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
    this.elements.$module_pricetable.forEach($table => {
      let $toggle = $table.querySelector("#price-toggle");
      let $highlight = $table.querySelectorAll(".price-toggle-wrapper > span");
      $toggle.addEventListener("change", () => {
        if ($toggle.checked) {
          $table.classList.add("monthly");
        } else {
          $table.classList.remove("monthly");
        }
        // highlight the text of the selected option
        $highlight.forEach($text => {
          $text.classList.toggle("checked");
        });
      });
    });
  }
  toggleFeature() {
    this.elements.$feature.forEach($f => {
      let $toggle = $f.querySelector(".feature-toggle");
      $toggle.addEventListener("click", () => {
        $f.classList.toggle("open");
      });
    });
  }
}

/***/ }),

/***/ "./src/helper.js":
/*!***********************!*\
  !*** ./src/helper.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
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
      desktop: 1210
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
      check = this.getWidth() > this.steps.mobile && this.getWidth() <= this.steps.tabletPortrait;
    } else if (device === "> tablet-portrait" || device === "gt tablet-portrait") {
      check = this.getWidth() > this.steps.tabletPortrait;
    } else if (device === "< tablet-portrait" || device === "lt tablet-portrait") {
      check = this.getWidth() <= this.steps.mobile;
    } else if (device === "<= tablet-portrait" || device === "lte tablet-portrait") {
      check = this.getWidth() <= this.steps.tabletPortrait;
    }
    if (device === "tablet-landscape") {
      check = this.getWidth() > this.steps.tabletPortrait && this.getWidth() <= this.steps.tabletLandscape;
    } else if (device === "> tablet-landscape" || device === "gt tablet-landscape") {
      check = this.getWidth() > this.steps.tabletLandscape;
    } else if (device === "< tablet-landscape" || device === "lt tablet-landscape") {
      check = this.getWidth() <= this.steps.tabletPortrait;
    } else if (device === "<= tablet-landscape" || device === "lte tablet-landscape") {
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
    return window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  }

  /**
   *   returns browser height (crossbrowser)
   *
   *   @returns {number} - Returns the height of current browser.
   */
  getHeight() {
    return window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
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
    const elementY = element.getBoundingClientRect().top + window.pageYOffset - offset;
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (new Helper());

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _css_style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css/style.scss */ "./css/style.scss");
/* harmony import */ var _template_parts_navigation_navigation__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../template-parts/navigation/navigation */ "./template-parts/navigation/navigation.js");
/* harmony import */ var _template_parts_blog_scrollup__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../template-parts/blog/scrollup */ "./template-parts/blog/scrollup.js");
/* harmony import */ var _acf_blocks_price_table_price_table__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../acf-blocks/price-table/price-table */ "./acf-blocks/price-table/price-table.js");
/* harmony import */ var _node_modules_simple_lightbox_dist_simpleLightbox__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../node_modules/simple-lightbox/dist/simpleLightbox */ "./node_modules/simple-lightbox/dist/simpleLightbox.js");
/* harmony import */ var _node_modules_simple_lightbox_dist_simpleLightbox__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_node_modules_simple_lightbox_dist_simpleLightbox__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _node_modules_simple_lightbox_dist_simpleLightbox_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../node_modules/simple-lightbox/dist/simpleLightbox.css */ "./node_modules/simple-lightbox/dist/simpleLightbox.css");




const navigation = new _template_parts_navigation_navigation__WEBPACK_IMPORTED_MODULE_1__["default"]();
const scrollup = new _template_parts_blog_scrollup__WEBPACK_IMPORTED_MODULE_2__["default"]();
const price_table = new _acf_blocks_price_table_price_table__WEBPACK_IMPORTED_MODULE_3__["default"]();

//https://simplelightbox.com/ https://dbrekalo.github.io/simpleLightbox/

 // style

// new SimpleLightbox({
//   elements: ".light-box a",
// });

jQuery(document).ready(function ($) {
  jQuery(".card > .image-wrapper , .card > .gallery").on("click", function (e) {
    var $target = jQuery(e.target.parentNode.parentNode);
    var $items = $target.find(".light-box a");
    _node_modules_simple_lightbox_dist_simpleLightbox__WEBPACK_IMPORTED_MODULE_4___default().open({
      items: $items
    });
  });
});

/***/ }),

/***/ "./template-parts/blog/scrollup.js":
/*!*****************************************!*\
  !*** ./template-parts/blog/scrollup.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Scrollup)
/* harmony export */ });
class Scrollup {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $btn: document.querySelector(".scrollup-button")
    };
    if (this.elements.$btn) {
      this.events();
    }
  }

  // 2. events
  events() {
    window.addEventListener("scroll", e => {
      this.elements.$btn.style.visibility = window.scrollY > 40 ? "visible" : "hidden";
    });
    this.elements.$btn.addEventListener("click", this.scrollToTop);
  }

  // 3. methods (function, action...)
  scrollToTop() {
    document.documentElement.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  }
}

/***/ }),

/***/ "./template-parts/navigation/navigation.js":
/*!*************************************************!*\
  !*** ./template-parts/navigation/navigation.js ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Navigation)
/* harmony export */ });
/* harmony import */ var _src_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../src/helper */ "./src/helper.js");


/**
 *  Shows the Navigation bar, if not accepted, yet.
 */
class Navigation {
  /**
   * initialize
   */
  constructor() {
    this.elements = {
      $main: document.querySelectorAll(".header-main-navi, .header-meta"),
      $body: document.querySelector("body"),
      $checkbox: document.querySelector("#navi-toggle")
    };
    // checkbox need to be unchecked, when the page newly loaded
    this.elements.$checkbox.checked = false;

    // $bp-largest in variable & where hamber icon appears
    if (this.elements.$main.length && this.getWidth() >= 1250) {
      this.toggleSubmenu();
    } else if (this.getWidth() < 1250) {
      this.toggleSubmenu_mobile();
    }
    this.openNavContainer();
  }
  closeAllmenu() {
    this.elements.$main.forEach($navigation => {
      let $menu_has_children = $navigation.querySelectorAll(".menu-item-has-children");
      $menu_has_children.forEach($menu => {
        $menu.classList.remove("active");
      });
    });
  }

  /**
   *   toggles navigation : Desktop
   *
   *   @returns {void}
   */
  toggleSubmenu() {
    this.elements.$main.forEach($navigation => {
      //link deactivate
      let $deactivate_links = $navigation.querySelectorAll(".menu-item-depth-0.menu-item-has-children");
      $deactivate_links.forEach($link => {
        $link.querySelector(".menu-link").addEventListener("click", event => {
          // deactivate link
          event.preventDefault();
          // if subitem list is not jet open
          if (!$link.classList.contains("active")) {
            // close another opened submenu first
            this.closeAllmenu();
            // open target submenu
            $link.classList.add("active");
            setTimeout(() => {
              $link.classList.remove("active");
            }, 10000);
          } else {
            this.closeAllmenu();
          }
        });
      });

      // click outside > close
      document.addEventListener("click", event => {
        // did I clicked outside of the navigation area, close it
        let $target_classlist = event.target.classList;
        if ($target_classlist.contains("menu-link") || $target_classlist.contains("menu-item-has-children")) {
          return false;
        } else {
          this.closeAllmenu();
        }
      });
    });
  }

  // Mobile, viewwidth < 1020px
  // add class, when hamburger checkbox is checked
  openNavContainer() {
    let openToggle = () => {
      document.querySelector(".header--container").classList.toggle("mobile-navi-open");
      this.elements.$body.classList.toggle("body-no-scroll");
    };
    document.querySelector("#navi-toggle").addEventListener("change", openToggle);
  }
  // toggle submenu: Mobile
  toggleSubmenu_mobile() {
    this.elements.$main.forEach($navigation => {
      // open submenu as default, if the current page is one of the submenu
      let $init_open = $navigation.querySelector(".menu-item-depth-1.current-menu-ancestor.menu-item-has-children");
      if ($init_open) {
        $init_open.classList.add("active");
      }
      let $deactivate_links = $navigation.querySelectorAll(".menu-item-has-children");
      $deactivate_links.forEach($link => {
        $link.querySelector(".menu-link").addEventListener("click", event => {
          // deactivate link
          event.preventDefault();
          if ($link.classList.contains("menu-item-has-children")) {
            $link.classList.toggle("active");
          }
        });
      });
    });
  }
  getWidth() {
    return window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  }
}

/***/ }),

/***/ "./node_modules/simple-lightbox/dist/simpleLightbox.css":
/*!**************************************************************!*\
  !*** ./node_modules/simple-lightbox/dist/simpleLightbox.css ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./css/style.scss":
/*!************************!*\
  !*** ./css/style.scss ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./node_modules/simple-lightbox/dist/simpleLightbox.js":
/*!*************************************************************!*\
  !*** ./node_modules/simple-lightbox/dist/simpleLightbox.js ***!
  \*************************************************************/
/***/ (function(module, exports) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;(function(root, factory) {

    if (true) {
        !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
    } else {}

}(this, function() {

    function assign(target) {

        for (var i = 1; i < arguments.length; i++) {

            var obj = arguments[i];

            if (obj) {
                for (var key in obj) {
                    obj.hasOwnProperty(key) && (target[key] = obj[key]);
                }
            }

        }

        return target;

    }

    function addClass(element, className) {

        if (element && className) {
            element.className += ' ' + className;
        }

    }

    function removeClass(element, className) {

        if (element && className) {
            element.className = element.className.replace(
                new RegExp('(\\s|^)' + className + '(\\s|$)'), ' '
            ).trim();
        }

    }

    function parseHtml(html) {

        var div = document.createElement('div');
        div.innerHTML = html.trim();

        return div.childNodes[0];

    }

    function matches(el, selector) {

        return (el.matches || el.matchesSelector || el.msMatchesSelector).call(el, selector);

    }

    function getWindowHeight() {

        return 'innerHeight' in window
            ? window.innerHeight
            : document.documentElement.offsetHeight;

    }

    function SimpleLightbox(options) {

        this.init.apply(this, arguments);

    }

    SimpleLightbox.defaults = {

        // add custom classes to lightbox elements
        elementClass: '',
        elementLoadingClass: 'slbLoading',
        htmlClass: 'slbActive',
        closeBtnClass: '',
        nextBtnClass: '',
        prevBtnClass: '',
        loadingTextClass: '',

        // customize / localize controls captions
        closeBtnCaption: 'Close',
        nextBtnCaption: 'Next',
        prevBtnCaption: 'Previous',
        loadingCaption: 'Loading...',

        bindToItems: true, // set click event handler to trigger lightbox on provided $items
        closeOnOverlayClick: true,
        closeOnEscapeKey: true,
        nextOnImageClick: true,
        showCaptions: true,

        captionAttribute: 'title', // choose data source for library to glean image caption from
        urlAttribute: 'href', // where to expect large image

        startAt: 0, // start gallery at custom index
        loadingTimeout: 100, // time after loading element will appear

        appendTarget: 'body', // append elsewhere if needed

        beforeSetContent: null, // convenient hooks for extending library behavoiur
        beforeClose: null,
        afterClose: null,
        beforeDestroy: null,
        afterDestroy: null,

        videoRegex: new RegExp(/youtube.com|vimeo.com/) // regex which tests load url for iframe content

    };

    assign(SimpleLightbox.prototype, {

        init: function(options) {

            options = this.options = assign({}, SimpleLightbox.defaults, options);

            var self = this;
            var elements;

            if (options.$items) {
                elements = options.$items.get();
            }

            if (options.elements) {
                elements = [].slice.call(
                    typeof options.elements === 'string'
                        ? document.querySelectorAll(options.elements)
                        : options.elements
                );
            }

            this.eventRegistry = {lightbox: [], thumbnails: []};
            this.items = [];
            this.captions = [];

            if (elements) {

                elements.forEach(function(element, index) {

                    self.items.push(element.getAttribute(options.urlAttribute));
                    self.captions.push(element.getAttribute(options.captionAttribute));

                    if (options.bindToItems) {

                        self.addEvent(element, 'click', function(e) {

                            e.preventDefault();
                            self.showPosition(index);

                        }, 'thumbnails');

                    }

                });

            }

            if (options.items) {
                this.items = options.items;
            }

            if (options.captions) {
                this.captions = options.captions;
            }

        },

        addEvent: function(element, eventName, callback, scope) {

            this.eventRegistry[scope || 'lightbox'].push({
                element: element,
                eventName: eventName,
                callback: callback
            });

            element.addEventListener(eventName, callback);

            return this;

        },

        removeEvents: function(scope) {

            this.eventRegistry[scope].forEach(function(item) {
                item.element.removeEventListener(item.eventName, item.callback);
            });

            this.eventRegistry[scope] = [];

            return this;

        },

        next: function() {

            return this.showPosition(this.currentPosition + 1);

        },

        prev: function() {

            return this.showPosition(this.currentPosition - 1);

        },

        normalizePosition: function(position) {

            if (position >= this.items.length) {
                position = 0;
            } else if (position < 0) {
                position = this.items.length - 1;
            }

            return position;

        },

        showPosition: function(position) {

            var newPosition = this.normalizePosition(position);

            if (typeof this.currentPosition !== 'undefined') {
                this.direction = newPosition > this.currentPosition ? 'next' : 'prev';
            }

            this.currentPosition = newPosition;

            return this.setupLightboxHtml()
                .prepareItem(this.currentPosition, this.setContent)
                .show();

        },

        loading: function(on) {

            var self = this;
            var options = this.options;

            if (on) {

                this.loadingTimeout = setTimeout(function() {

                    addClass(self.$el, options.elementLoadingClass);

                    self.$content.innerHTML =
                        '<p class="slbLoadingText ' + options.loadingTextClass + '">' +
                            options.loadingCaption +
                        '</p>';
                    self.show();

                }, options.loadingTimeout);

            } else {

                removeClass(this.$el, options.elementLoadingClass);
                clearTimeout(this.loadingTimeout);

            }

        },

        prepareItem: function(position, callback) {

            var self = this;
            var url = this.items[position];

            this.loading(true);

            if (this.options.videoRegex.test(url)) {

                callback.call(self, parseHtml(
                    '<div class="slbIframeCont"><iframe class="slbIframe" frameborder="0" allowfullscreen src="' + url + '"></iframe></div>')
                );

            } else {

                var $imageCont = parseHtml(
                    '<div class="slbImageWrap"><img class="slbImage" src="' + url + '" /></div>'
                );

                this.$currentImage = $imageCont.querySelector('.slbImage');

                if (this.options.showCaptions && this.captions[position]) {
                    $imageCont.appendChild(parseHtml(
                        '<div class="slbCaption">' + this.captions[position] + '</div>')
                    );
                }

                this.loadImage(url, function() {

                    self.setImageDimensions();

                    callback.call(self, $imageCont);

                    self.loadImage(self.items[self.normalizePosition(self.currentPosition + 1)]);

                });

            }

            return this;

        },

        loadImage: function(url, callback) {

            if (!this.options.videoRegex.test(url)) {

                var image = new Image();
                callback && (image.onload = callback);
                image.src = url;

            }

        },

        setupLightboxHtml: function() {

            var o = this.options;

            if (!this.$el) {

                this.$el = parseHtml(
                    '<div class="slbElement ' + o.elementClass + '">' +
                        '<div class="slbOverlay"></div>' +
                        '<div class="slbWrapOuter">' +
                            '<div class="slbWrap">' +
                                '<div class="slbContentOuter">' +
                                    '<div class="slbContent"></div>' +
                                    '<button type="button" title="' + o.closeBtnCaption + '" class="slbCloseBtn ' + o.closeBtnClass + '">×</button>' +
                                    (this.items.length > 1
                                        ? '<div class="slbArrows">' +
                                             '<button type="button" title="' + o.prevBtnCaption + '" class="prev slbArrow' + o.prevBtnClass + '">' + o.prevBtnCaption + '</button>' +
                                             '<button type="button" title="' + o.nextBtnCaption + '" class="next slbArrow' + o.nextBtnClass + '">' + o.nextBtnCaption + '</button>' +
                                          '</div>'
                                        : ''
                                    ) +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>'
                );

                this.$content = this.$el.querySelector('.slbContent');

            }

            this.$content.innerHTML = '';

            return this;

        },

        show: function() {

            if (!this.modalInDom) {

                document.querySelector(this.options.appendTarget).appendChild(this.$el);
                addClass(document.documentElement, this.options.htmlClass);
                this.setupLightboxEvents();
                this.modalInDom = true;

            }

            return this;

        },

        setContent: function(content) {

            var $content = typeof content === 'string'
                ? parseHtml(content)
                : content
            ;

            this.loading(false);

            this.setupLightboxHtml();

            removeClass(this.$content, 'slbDirectionNext');
            removeClass(this.$content, 'slbDirectionPrev');

            if (this.direction) {
                addClass(this.$content, this.direction === 'next'
                    ? 'slbDirectionNext'
                    : 'slbDirectionPrev'
                );
            }

            if (this.options.beforeSetContent) {
                this.options.beforeSetContent($content, this);
            }

            this.$content.appendChild($content);

            return this;

        },

        setImageDimensions: function() {

            if (this.$currentImage) {
                this.$currentImage.style.maxHeight = getWindowHeight() + 'px';
            }

        },

        setupLightboxEvents: function() {

            var self = this;

            if (this.eventRegistry.lightbox.length) {
                return this;
            }

            this.addEvent(this.$el, 'click', function(e) {

                var $target = e.target;

                if (matches($target, '.slbCloseBtn') || (self.options.closeOnOverlayClick && matches($target, '.slbWrap'))) {

                    self.close();

                } else if (matches($target, '.slbArrow')) {

                    matches($target, '.next') ? self.next() : self.prev();

                } else if (self.options.nextOnImageClick && self.items.length > 1 && matches($target, '.slbImage')) {

                    self.next();

                }

            }).addEvent(document, 'keyup', function(e) {

                self.options.closeOnEscapeKey && e.keyCode === 27 && self.close();

                if (self.items.length > 1) {
                    (e.keyCode === 39 || e.keyCode === 68) && self.next();
                    (e.keyCode === 37 || e.keyCode === 65) && self.prev();
                }

            }).addEvent(window, 'resize', function() {

                self.setImageDimensions();

            });

            return this;

        },

        close: function() {

            if (this.modalInDom) {

                this.runHook('beforeClose');
                this.removeEvents('lightbox');
                this.$el && this.$el.parentNode.removeChild(this.$el);
                removeClass(document.documentElement, this.options.htmlClass);
                this.modalInDom = false;
                this.runHook('afterClose');

            }

            this.direction = undefined;
            this.currentPosition = this.options.startAt;

        },

        destroy: function() {

            this.close();
            this.runHook('beforeDestroy');
            this.removeEvents('thumbnails');
            this.runHook('afterDestroy');

        },

        runHook: function(name) {

            this.options[name] && this.options[name](this);

        }

    });

    SimpleLightbox.open = function(options) {

        var instance = new SimpleLightbox(options);

        return options.content
            ? instance.setContent(options.content).show()
            : instance.showPosition(instance.options.startAt);

    };

    SimpleLightbox.registerAsJqueryPlugin = function($) {

        $.fn.simpleLightbox = function(options) {

            var lightboxInstance;
            var $items = this;

            return this.each(function() {
                if (!$.data(this, 'simpleLightbox')) {
                    lightboxInstance = lightboxInstance || new SimpleLightbox($.extend({}, options, {$items: $items}));
                    $.data(this, 'simpleLightbox', lightboxInstance);
                }
            });

        };

        $.SimpleLightbox = SimpleLightbox;

    };

    if (typeof window !== 'undefined' && window.jQuery) {
        SimpleLightbox.registerAsJqueryPlugin(window.jQuery);
    }

    return SimpleLightbox;

}));


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"index": 0,
/******/ 			"./style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkreap_theme"] = globalThis["webpackChunkreap_theme"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], () => (__webpack_require__("./src/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map