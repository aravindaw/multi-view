<?php
/**
 * Created by IntelliJ IDEA.
 * User: aravinda
 * Date: 1/6/15
 * Time: 2:56 PM
 * To change this template use File | Settings | File Templates.
 */

//require_once '../../../index.php';
$action = $_REQUEST['action'];

switch ($action){
    case"delete_page";
        delete_page();
        break;
}
echo("<script>console.log('test');</script>");
function delete_page() {
    require_once '../model/page.php';
    $obj_page = new page();
    $page_id = $_GET['page_id'];
    $result = $obj_page->delete_page($page_id);
    if ($result == 1) {
        header("location: /docs/multi_view/view/view_pages.php?del=1");
    } else {
        header("location: /docs/multi_view/view/view_pages.php?del=0");
    }
}