/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./acf-blocks/cards/slide.js":
/*!***********************************!*\
  !*** ./acf-blocks/cards/slide.js ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Slider; }
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class Slider {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $card: document.querySelector(".module.cards")
    };
    if (this.elements.$card != null) {
      this.event();
    }
  }

  // 2. events
  event() {}
}

/***/ }),

/***/ "./acf-blocks/price-table/price-table.js":
/*!***********************************************!*\
  !*** ./acf-blocks/price-table/price-table.js ***!
  \***********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ PriceTable; }
/* harmony export */ });
class PriceTable {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $module_pricetable: document.querySelectorAll(".module.price-table"),
      $price_toggle: document.querySelector("#price-toggle"),
      $target: document.querySelector(".price-table"),
      $highlight: document.querySelectorAll(".price-toggle-wrapper > span"),
      $feature: document.querySelectorAll(".block-wrapper-mobile .feature")
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

/***/ "./acf-blocks/subnavigation/subnavigation.js":
/*!***************************************************!*\
  !*** ./acf-blocks/subnavigation/subnavigation.js ***!
  \***************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ SubNavigation; }
/* harmony export */ });
class SubNavigation {
  // 1. describe and create/initiate our object
  constructor() {
    this.elements = {
      $subnavi: document.querySelector(".subnavigation"),
      $subnavi_sticky: document.querySelector(".subnavigation.sticky"),
      $target: document.querySelector(".subnavi-sticky-marker")
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
      root: null
      // rootMargin: "32px 0px 0px 0px",
    };

    let callback = entries => {
      entries.forEach(entry => {
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

/***/ }),

/***/ "./src/helper.js":
/*!***********************!*\
  !*** ./src/helper.js ***!
  \***********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
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
  scrollTo(element) {
    let duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 2000;
    let offset = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;
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
/* harmony default export */ __webpack_exports__["default"] = (new Helper());

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _css_style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css/style.scss */ "./css/style.scss");
/* harmony import */ var _template_parts_navigation_navigation__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../template-parts/navigation/navigation */ "./template-parts/navigation/navigation.js");
/* harmony import */ var _template_parts_blog_scrollup__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../template-parts/blog/scrollup */ "./template-parts/blog/scrollup.js");
/* harmony import */ var _acf_blocks_price_table_price_table__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../acf-blocks/price-table/price-table */ "./acf-blocks/price-table/price-table.js");
/* harmony import */ var _acf_blocks_subnavigation_subnavigation__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../acf-blocks/subnavigation/subnavigation */ "./acf-blocks/subnavigation/subnavigation.js");
/* harmony import */ var _acf_blocks_cards_slide__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../acf-blocks/cards/slide */ "./acf-blocks/cards/slide.js");






const navigation = new _template_parts_navigation_navigation__WEBPACK_IMPORTED_MODULE_1__["default"]();
const scrollup = new _template_parts_blog_scrollup__WEBPACK_IMPORTED_MODULE_2__["default"]();
const price_table = new _acf_blocks_price_table_price_table__WEBPACK_IMPORTED_MODULE_3__["default"]();
const subnavigation = new _acf_blocks_subnavigation_subnavigation__WEBPACK_IMPORTED_MODULE_4__["default"]();
const slider = new _acf_blocks_cards_slide__WEBPACK_IMPORTED_MODULE_5__["default"]();

/***/ }),

/***/ "./template-parts/blog/scrollup.js":
/*!*****************************************!*\
  !*** ./template-parts/blog/scrollup.js ***!
  \*****************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Scrollup; }
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
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Navigation; }
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

/***/ "./css/style.scss":
/*!************************!*\
  !*** ./css/style.scss ***!
  \************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ (function(module) {

module.exports = window["jQuery"];

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
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
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
/******/ 	!function() {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = function(result, chunkIds, fn, priority) {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var chunkIds = deferred[i][0];
/******/ 				var fn = deferred[i][1];
/******/ 				var priority = deferred[i][2];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every(function(key) { return __webpack_require__.O[key](chunkIds[j]); })) {
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
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	!function() {
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
/******/ 		__webpack_require__.O.j = function(chunkId) { return installedChunks[chunkId] === 0; };
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = function(parentChunkLoadingFunction, data) {
/******/ 			var chunkIds = data[0];
/******/ 			var moreModules = data[1];
/******/ 			var runtime = data[2];
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some(function(id) { return installedChunks[id] !== 0; })) {
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
/******/ 		var chunkLoadingGlobal = self["webpackChunkreap_theme"] = self["webpackChunkreap_theme"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], function() { return __webpack_require__("./src/index.js"); })
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map