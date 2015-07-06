<?php
require_once '../model/searches.php';
$obj_users = new search();
$results = $obj_users->get_search();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>View search</title>
    <style type="text/css" title="currentStyle">
        @import "css/main.css";
        @import "css/account.css";
        @import "css/style.css";
        @import "css/layout.css";
        @import "css/redmond/jquery-ui-1.10.1.custom.css";
        @import "css/demo_page.css";
        @import "css/demo_table.css";
    </style>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8">
        $('#test_table').dataTable({
            "bStateSave": true,
            "bJQueryUI": true,
            "bFilter": true,
            "bPaginate": true,
            "bInfo": true,
            "bSort": true
        });
    </script>
</head>
<body>
<div id="contentWrapper">
    <div id="content">
        <table cellpadding="0" cellspacing="0" class="display" id="test_table">
            <thead>
            <tr>
                <th>id</th>
                <th>Tab ID</th>
                <th>page name</th>
                <th>url</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysql_fetch_assoc($results)) {
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['tab_id'] ?></td>
                    <td><?php echo $row['page_name'] ?></td>
                    <td><?php echo $row['url'] ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>