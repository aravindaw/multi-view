<?php
/**
 * Created by IntelliJ IDEA.
 * User: aravindaweerasekara
 * Date: 11/6/14
 * Time: 10:50 AM
 * To change this template use File | Settings | File Templates.
 */

require_once 'connection.php';

class pageViewer{

    function add_page($url,$page_name, $tab_id){

        $sql = "INSERT INTO save_history
        VALUES('', '$tab_id', '$page_name', '$url')";
        $db = new connection();
        $result = $db->query($sql);
        return $result;
    }


    function  page_list(){
        $sql = "SELECT save_history.page_name, save_history.url, save_history.tab_id, save_history.id
                FROM save_history";
        $db = new connection();
        $result = $db -> query($sql);
        return $result;
    }

    function  view_pages($id){
        $sql = "SELECT * FROM save_history WHERE tab_id=$id";
        $db = new connection();
        $result = $db -> query($sql);
        return $result;
    }


    function get_main_pages(){
        $sql = "SELECT * FROM pages";
        $db = new connection();
        $result = $db -> query($sql);
        return $result;
    }

    function add_main_page($main_page_name){

        $sql = "INSERT INTO pages VALUES(null,'$main_page_name')";
        $db = new connection();
        $result = $db->query($sql);
        return $result;
    }

    function get_page_id_by_name($page_name){
        $sql ="SELECT * FROM pages WHERE page_name=$page_name";
        $db = new connection();
        $result = $db->query($sql);
        return $result;
    }

    function get_tab_name_by_id($id){
        $sql = "SELECT * FROM pages WHERE pageID=$id";
        $db = new connection();
        $result = $db -> query($sql);
        return $result;
    }
}