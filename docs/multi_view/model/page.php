<?php
/**
 * Created by IntelliJ IDEA.
 * User: aravinda
 * Date: 1/6/15
 * Time: 4:27 PM
 * To change this template use File | Settings | File Templates.
 */
require_once 'connection.php';

class page {
  public function get_page(){
    $sql = "SELECT * FROM city";
    $db = new connection();
    $result = $db -> query2($sql);
    return $result;
  }
}
