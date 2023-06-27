import Helper from "../../src/helper";

/**
 *  Shows the Navigation bar, if not accepted, yet.
 */
export default class Navigation {
  /**
   * initialize
   */
  constructor() {
    this.elements = {
      $main: document.querySelectorAll(".header-main-navi, .header-meta"),
      $body: document.querySelector("body"),
      $checkbox: document.querySelector("#navi-toggle"),
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
    this.elements.$main.forEach(($navigation) => {
      let $menu_has_children = $navigation.querySelectorAll(
        ".menu-item-has-children"
      );
      $menu_has_children.forEach(($menu) => {
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
    this.elements.$main.forEach(($navigation) => {
      //link deactivate
      let $deactivate_links = $navigation.querySelectorAll(
        ".menu-item-depth-0.menu-item-has-children"
      );
      $deactivate_links.forEach(($link) => {
        $link.querySelector(".menu-link").addEventListener("click", (event) => {
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
      document.addEventListener("click", (event) => {
        // did I clicked outside of the navigation area, close it
        let $target_classlist = event.target.classList;
        if (
          $target_classlist.contains("menu-link") ||
          $target_classlist.contains("menu-item-has-children")
        ) {
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
      document
        .querySelector(".header--container")
        .classList.toggle("mobile-navi-open");
      this.elements.$body.classList.toggle("body-no-scroll");
    };

    document
      .querySelector("#navi-toggle")
      .addEventListener("change", openToggle);
  }
  // toggle submenu: Mobile
  toggleSubmenu_mobile() {
    this.elements.$main.forEach(($navigation) => {
      // open submenu as default, if the current page is one of the submenu
      let $init_open = $navigation.querySelector(
        ".menu-item-depth-1.current-menu-ancestor.menu-item-has-children"
      );
      if ($init_open) {
        $init_open.classList.add("active");
      }

      let $deactivate_links = $navigation.querySelectorAll(
        ".menu-item-has-children"
      );
      $deactivate_links.forEach(($link) => {
        $link.querySelector(".menu-link").addEventListener("click", (event) => {
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
    return (
      window.innerWidth ||
      document.documentElement.clientWidth ||
      document.body.clientWidth
    );
  }
}
