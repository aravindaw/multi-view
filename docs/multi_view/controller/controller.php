<?php
/**
 * Created by IntelliJ IDEA.
 * User: aravinda
 * Date: 11/5/14
 * Time: 7:00 PM
 * To change this template use File | Settings | File Templates.
 */

$action = $_REQUEST['action'];
//$base_url = $_POST['BASE_URL'];

switch ($action) {
    case "add_new_page";
        add_new_page();
        break;
    case "add_new_main_page";
        add_new_main_page();
        break;
}

function add_new_page()
{
    $base_url = $_POST['base_url'];
    $url = $_POST['url'];
    $page_name = $_POST['page_name'];
    $tab_id = $_POST['page_id'];

    require_once '../model/model.php';
    $page = new pageViewer();
    $result = $page->add_page($url, $page_name, $tab_id);

    if ($result == 1) {
        header('location:'.$base_url.'?id=1&add=1');
    } else {
        header('location:'.$base_url.'?id=1&add=0');


    }


}

function add_new_main_page()
{
    $base_url = $_POST['base_url'];
    $main_page_name = $_POST['main_page_name'];
    require_once '../model/model.php';
    $page = new pageViewer();
    $result = $page->add_main_page($main_page_name);

    if ($result == 1) {
        header('location:'.$base_url.'?id=1&page_add=1');
    } else {
        header('location:'.$base_url.'?id=1&page_add=0');


    }

}
