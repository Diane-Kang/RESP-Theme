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

    }
  

  }
  