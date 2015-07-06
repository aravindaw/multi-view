<?php
require_once 'connection.php';

class search
{
    public function get_search()
    {
        $sql = "SELECT * FROM save_history";
        $db = new connection2();
        $result = $db->query($sql);
        return $result;
    }
}

?>

