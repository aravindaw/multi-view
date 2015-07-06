<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aravinda
 * Date: 01-Mar-15
 * Time: 6:40 PM
 */
require_once '../model/page.php';
$page_data = new page();
$results = $page_data->get_page();
?>
<html>
<head>
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
    $(document).ready(function () {
      // Setup - add a text input to each footer cell
      $('#example tfoot th').each(function () {
        var title = $('#example thead th').eq($(this).index()).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
      });

      // DataTable
      var table = $('#example').DataTable();

      // Apply the filter
      $("#example tfoot input").on('keyup change', function () {
        table
          .column($(this).parent().index() + ':visible')
          .search(this.value)
          .draw();
      });
    });
  </script>
</head>
<body>
<h2 style="font-size: 20px; "><a href="../../../index.php">Back to main page</a></h2>

<div>
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>CountryCode</th>
      <th>District</th>
      <th>Population</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>CountryCode</th>
      <th>District</th>
      <th>Population</th>
    </tr>
    </tfoot>

    <tbody>
    <?php while ($row = mysql_fetch_assoc($results)) {
      ?>
      <tr>
        <td><?php echo $row['ID'] ?></td>
        <td><?php echo $row['Name'] ?></td>
        <td><?php echo $row['CountryCode'] ?></td>
        <td><?php echo $row['District'] ?></td>
        <td><?php echo $row['Population'] ?></td>
      </tr>
    <?php
    }
    ?>
    </tbody>
  </table>
</div>
</body>
</html>

