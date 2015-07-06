<?php
/**
 * Created by IntelliJ IDEA.
 * User: aravinda
 * Date: 11/5/14
 * Time: 12:05 PM
 * To change this template use File | Settings | File Templates.
 */

define('BASE_URL', 'http://aravindaw.com/');

$pageId = 1;
if ($_GET['id'] > 1) {
    $pageId = $_GET['id'];
}

//require_once '../model/model.php';
require_once 'docs/multi_view/model/model.php';
$page_data = new pageViewer;
$result_pages = $page_data->get_main_pages();

//require_once '../model/model.php';
require_once 'docs/multi_view/model/model.php';
$page_data = new pageViewer;
$page_names = $page_data->get_main_pages();

require_once 'docs/multi_view/model/model.php';
$page_data = new pageViewer;
$page_name = $page_data->get_tab_name_by_id($pageId);

//require_once '../model/model.php';
require_once 'docs/multi_view/model/model.php';
$page_data = new pageViewer;
$results = $page_data->view_pages($pageId);
?>

<?php
if (isset($_GET['add'])) {
    $record = $_GET['add'];
    if ($record == '1') {
        echo "<span style='color: #ffffff'>Sub-page added to the TAB</span>";
//        echo "Sub-page added to the main page";
    } else if ($record == '0') {
//        echo "Sub-page not added to the main page";
        echo "<span style='color: #ffffff'>Sub-page not added to the TAB</span>";
    }

}

if (isset($_GET['page_add'])) {
    $record = $_GET['page_add'];
    if ($record == '1') {
//        echo "New main page added";
        echo "<span style='color: #ffffff'>New TAB added</span>";

    } else if ($record == '0') {
        echo "<span style='color: #ffffff'>New TAB not added</span>";
//        echo "New main page not added";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="docs/multi_view/view/css/mainpage.css">
    <link rel="stylesheet" type="text/css" href="docs/multi_view/view/css/mainpage2.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="docs/favicon.ico">

    <title>Multi view</title>

    <!-- Bootstrap core CSS -->
    <link href="docs/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->

    <!-- Bootstrap theme -->
    <link href="docs/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="docs/multi_view/view/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="docs/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="set3d" role="document">

<div id="menu">
    <ul>
        <li>Multi view</li>
        <?php while ($row_page_names = mysql_fetch_assoc($page_names)) { ?>

            <li>
                <td>
                    <?php echo $row_page_names['pageID']; ?>
                </td>
                <td>
                    <a href="<?php echo BASE_URL . "?id=" . $row_page_names['pageID']; ?>">
                        <?php echo $row_page_names['page_name']; ?>
                    </a>
                </td>
            </li>
        <?php } ?>

    </ul>
    <div id="trigger"></div>
</div>

<!-- Fixed navbar -->
<div class="container theme-showcase" role="main" id="content">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="width: 90%; height: 60px; margin: auto;">
        <form method="post" action="docs/multi_view/controller/controller.php" id="add_new_main_page">
            <div style="float: right">
                <!--                <p>Click here to add new main page</p>-->
                <tr>
                    <input type="text" id="main_page_name" name="main_page_name" required="" placeholder="TAB name">

                </tr>
                <tr>
                    <input type="hidden" id="base_url" name="base_url" value="<?php echo BASE_URL ?>"/>
                    <input type="hidden" name="action" value="add_new_main_page"/>
                    <input type="submit" value="Add new TAB" name="add_new_main_page" id="add_new_main_page">
                </tr>

            </div>
        </form>

        <form method="post" action="docs/multi_view/controller/controller.php" id="new_page" >
            <table>
                <div id="left" style="float: left">

                    <tr>
                    </tr>
                    <tr>
                        <td><input type="text" id="page_name" name="page_name" required="" placeholder="Page name"></td>
                        <td><input type="text" id="url" name="url" required="" placeholder="URL"></td>
                        <td>
                            <input type="hidden" id="base_url" name="base_url" value="<?php echo BASE_URL ?>"/>
                            <input type="hidden" id="page_id" name="page_id" value="<?php if(trim($_GET['id'])=='' || trim($_GET['id'])==null){
                                echo 1;
                            } else {
                                echo $_GET['id'];
                            } ?>"/>
                            <input type="hidden" name="action" value="add_new_page"/>
                            <input type="submit" id="submit" name="submit" value="Add new page to current TAB">
                        </td>
                </div>
            </table>
        </form>
    </div>

    <div style="float: right;">
        <ul class="pagination">
            <li><a href="<?php
                if ($pageId > 1) {
                    echo BASE_URL . "?id=" . ($pageId - 1);
                }
                ?>">&laquo;</a></li>
            <?php while ($row_pages = mysql_fetch_assoc($result_pages)) {
                ?>
                <li class="<?php
                if ($pageId == $row_pages['pageID']) {
                    echo "active";
                }
                ?>"
                    ><a href="<?php echo BASE_URL . "?id=" . $row_pages['pageID']; ?>">
                        <?php echo $row_pages['pageID'] ?></a>
                </li>
            <?php
            }
            ?>
            <li><a href="<?php
                $pageCount = mysql_num_rows($result_pages);
                if ($pageId < $pageCount) {
                    echo BASE_URL . "?id=" . ($pageId + 1);
                }
                ?>">&raquo;</a></li>
        </ul>
    </div>
    <br><br>

    <div class="page-header">
    </div>
    <div style="width: 90%; margin: auto">
        <table id=add_page>
            <?php while ($row = mysql_fetch_assoc($results)) {
                ?>
                <div>
                    <div>
                        <div>
                            <h2>
                                <span class="label label-success"><?php echo $row['page_name'] ?></span>
                            </h2>
                        </div>

                        <div>
                            <iframe src="<?php echo $row['url'] ?>" width="100%" height="400" allowtransparency="true"
                                    frameborder="1" scrolling="yes"></iframe>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </table>
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="docs/dist/js/bootstrap.min.js"></script>
    <script src="docs/assets/js/docs.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>
        $("#menu").hover(function () {
            $('body').toggleClass("active");
        });


    </script>
    <a></a>
    <a href="docs/multi_view/view/view_pages.php" style="float: right; color: #ffffff;font-weight: bold; position: fixed;text-outline;
     top: 175px;right: 20px;"><img src="docs/multi_view/images/textedit.png" style="height: 60px; width: 60px"></a>
</div>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container" style="text-align: center">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Multi view</a>
            <a class="navbar-brand" href="docs/multi_view/view/view_pages.php">Page List</a>
            <a class="navbar-brand" href="docs/multi_view/view/search.php">Search table</a>
        </div>
        <div style="float: right; vertical-align: bottom">
            <span style="color: #ffffff">Currrent TAB :</span>
            <span style="color: #ffffff"><?php if(trim($_GET['id'])==''|| trim($_GET['id'])==null){
                    echo 1;
                }else{
                    echo $_GET['id'];
                }
                ?>,</span>
            <?php while ($row_page_name = mysql_fetch_assoc($page_name)) { ?>
                <span style="color: #ffffff;"><?php echo $row_page_name['page_name']; ?></span>
            <?php } ?>
        </div>
    </div>
</nav>
</body>
</html>
