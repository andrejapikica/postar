<?php
class Db {
    private static $instance = NULL;

    public static function getInstance() {
		
      if (!isset(self::$instance)) {
       
        self::$instance = mysqli_connect("localhost", "root", "password", "postar");
		
      }
      return self::$instance;
    }
}
?>