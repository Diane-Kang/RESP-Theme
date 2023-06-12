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
      $hamburger_checked: document.querySelector(
        ".header .hamburger__checkbox"
      ),
    };

    if (this.elements.$main.length) {
      this.toggleSubmenu();
    }
    if (this.elements.$hamburger_checked) {
      this.openNavContainer();
    }
  }

  // add class, when hamburger checkbox is checked
  openNavContainer() {
    let openToggle = () =>
      document.querySelector(".header--container").classList.toggle("open");

    document
      .querySelector("#navi-toggle")
      .addEventListener("change", openToggle);
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
   *   toggles navigation
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
          console.log($link.classList.contains("active"));
          if (!$link.classList.contains("active")) {
            this.closeAllmenu();
            $link.classList.add("active");
            setTimeout(() => {
              $link.classList.remove("active");
            }, 10000);
          } else {
            $link.classList.remove("active");
            console.log(">>");
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
    //   console.log($deactivate_links);
    //   const $itemWithSub2 = $navigation.querySelectorAll(
    //     ".Navigation__item--level2"
    //   );
    //   const $itemWithSub3 = $navigation.querySelectorAll(
    //     ".Navigation__level2Item--level3"
    //   );

    //   $itemWithSub2.forEach(($subItem) => {
    //     const $link = $subItem.querySelector(".Navigation__link");

    //     $link.addEventListener("click", (event) => {
    //       event.preventDefault();

    //       const open = !$subItem.classList.contains("Navigation__item--active");

    //       // close all menus
    //       this.closeMenu(2);

    //       if (open) {
    //         setTimeout(() => {
    //           $subItem.classList.add("Navigation__item--active");
    //         }, 10);
    //       }

    //       return false;
    //     });
    //   });

    //   if (Helper.isDevice("<= tablet-portrait")) {
    //     $itemWithSub3.forEach(($subItem) => {
    //       const $link = $subItem.querySelector(".Navigation__level2Link");

    //       $link.addEventListener("click", (event) => {
    //         event.preventDefault();

    //         const open = !$subItem.classList.contains(
    //           "Navigation__level2Item--active"
    //         );

    //         // close all menus
    //         this.closeMenu(3);

    //         if (open) {
    //           setTimeout(() => {
    //             $subItem.classList.add("Navigation__level2Item--active");
    //           }, 10);
    //         }

    //         return false;
    //       });
    //     });
    //   }

    //   // click outside > close
    //   document.addEventListener("click", (event) => {
    //     // did I clicked outside of the navigation area, close it
    //     if (!$navigation.contains(event.target)) {
    //       this.closeMenu(2);
    //     }
    // });
  }

  /**
   * Closes all sub menus
   *
   * @param {int} level = current level of the animation that should be closed
   *
   * @returns {void}
   */
  closeMenu(level) {
    let itemClass, activeClass;

    if (level === 2) {
      itemClass = ".Navigation__item--level2";
      activeClass = "Navigation__item--active";
    } else {
      itemClass = ".Navigation__level2Item--level3";
      activeClass = "Navigation__level2Item--active";
    }

    this.elements.$main.forEach(($navigation) => {
      const $activeSubItems = $navigation.querySelectorAll(
        itemClass + "." + activeClass
      );

      $activeSubItems.forEach(($item) => {
        $item.classList.remove(activeClass);
      });
    });
  }
}
