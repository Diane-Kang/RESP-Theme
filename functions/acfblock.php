<?php
class ACFBlock
{
  public $name;

  function __construct($name)
  {
    $this->name = $name;
    add_action('init', [$this, 'register_acf_blocks']);
    $this->addBlockarray();
  }


  function register_acf_blocks()
  {
    register_block_type(THEMEPATH . "/acf-blocks/{$this->name}");
  }

  function addBlockarray()
  {
    global $allowedBlocks;
    array_push($allowedBlocks, "acf/{$this->name}");
  }
}
new ACFblock("textbox");
new ACFblock("teaser");
new ACFblock("imagetext");
new ACFblock("cards");
new ACFblock("subnavigation");
new ACFblock("h-line");
new ACFblock("testimonial");
new ACFblock("price-table");
new ACFblock("booking");
new ACFblock("faq");
new ACFBlock("logos");
new ACFBlock("contact");

new ACFBlock("color-test");
