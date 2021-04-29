<?php
class QueueCustomer {
  // Properties
  public $id;
  public $id_customer;
  public $time_joined;


	function __construct($id, $id_customer, $time_joined) {
    $this->id = $id;
    $this->id_customer = $id_customer;
    $this->time_joined = $time_joined;
  }
  
  
  // Methods
  function set_id($id) {
    $this->id = $id;
  }
  function get_id() {
    return $this->id;
  }
  
  
  function set_id_customer($id_customer) {
    $this->id_customer = $id_customer;
  }
  function get_id_customer() {
    return $this->id_customer;
  }
  
  function set_time_joined($time_joined) {
    $this->time_joined = $time_joined;
  }
  function get_time_joined() {
    return $this->time_joined;
  }
}
?>