<?php
class Food {
  // Properties
  public $id;
  public $name;
  public $description;
  public $price;


	function __construct($id, $name, $description, $price) {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
  }
  
  
  // Methods
  function set_id($id) {
    $this->id = $id;
  }
  function get_id() {
    return $this->id;
  }
  
  
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
  
  function set_price($price) {
    $this->price = $price;
  }
  function get_price() {
    return $this->price;
  }
}
?>