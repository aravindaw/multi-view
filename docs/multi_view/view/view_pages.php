<?php
/**
 * Created by IntelliJ IDEA.
 * User: aravindaweerasekara
 * Date: 11/9/14
 * Time: 9:13 PM
 */

//define('BASE_URL', 'multiviewer.com/');

require_once '../model/model.php';
$page_data = new pageViewer;
$results = $page_data->page_list();
?>
<html>
<head>
  <title>
    view page list
  </title>
  <style>
    @import "css/jquery.dataTables.css";
  </style>

  <style type="text/css">
    tfoot {
      display: table-header-group;
    }
  </style>
  <script type="text/javascript" src="../js/jquery2.js"></script>
  <script type="text/javascript" src="../js/jquery.dataTables2.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#example tfoot th').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
      } );

      // DataTable
      var table = $('#example').DataTable();

      // Apply the filter
      $("#example tfoot input").on( 'keyup change', function () {
        table
          .column( $(this).parent().index()+':visible' )
          .search( this.value )
          .draw();
      } );
    } );


    function func_delete(id) {
      var del_page = confirm('Do you really need to delete this page..!!');
      if (del_page == true) {
        location.href = "../controller/page.php?action=delete_page&page_id=" + id;

      } else {
        return false;
      }
    }

    function main_page() {
      location.href = "../../../../../"
    }

  </script>
</head>
<h2 style="font-size: 20px; "><a href="../../../index.php">Back to main page</a></h2>
<body>
<div>
  <?php
  if (isset($_GET['del'])) {
    $del = $_GET['del'];
    if ($del == '1') {
      echo '<p style="font-weight: bold; color: #008000">Page was deleted from the TAB</p>';
    } else {
      echo '<p style="font-weight: bold; color: red">Page was not deleted from the TAB</p>';
    }
  }
  ?>
</div>
<div>
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
      <th align="left">page name</th>
      <th align="left">Page URL</th>
      <th class="center">TAB number</th>
      <th class="center">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = mysql_fetch_assoc($results)) {
      ?>
      <tr>
        <td style="width: 200px;">
          <?php echo $row['page_name'] ?>
        </td>
        <td style="word-wrap: break-word">
          <?php echo $row['url'] ?>
        </td>
        <td class="center">
          <?php echo $row['tab_id'] ?>
        </td>
        <td class="center">
          <a href="#" onclick="func_delete(<?php echo $row['id']; ?>)"><img src="../images/delete.png"
                                                                            style="height: 25px;width: 25px"></a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
