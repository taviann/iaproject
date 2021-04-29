<?php
class ServiceProviders {
  // Properties
  public $id;
  public $name;


	function __construct($id, $name) {
    $this->id = $id;
    $this->name = $name;
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
    return $this->id_name;
  }
  
}
?>