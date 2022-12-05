<?php
  class Connections{

    private $hostname   = "localhost";
    private $username   = "u853610737_rbkdata";
    private $password   = "Walemoses2";
    private $db     = "u853610737_rainbow"; // database name to be created
    	
    public function connect(){	
      //Confirm susscessfull connection to db.
      $conn = new mysqli($this->hostname, $this->username, $this->password, $this->db);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }else{
        return $conn;
      }
    }
  }

?>