<?php  require_once "conection/connect.php"; 
       $my_class = $_GET['sel_class'];

  ?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>School Managment System</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/datepicker.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <!-- <link rel="stylesheet" type="text/css" href="css/everyone_format.css"/> -->
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>

	<form method="post">
    <div class="table-responsive">
        <table class="table table-bordered">
        <thead style="background: #ccc">

            <th>#</th>
            <th>Student Name</th>
            <th>Class</th>
            <th>Address</th>
            <th>Phone</th>
            <th>E-mail</th>
            <th colspan="2">Operation</th>
        </thead>

        <?php
  $key="";
  if(isset($_POST['searchtxt']))
    $key=$_POST['searchtxt'];

  if($key !="")
    $sql_sel=mysqli_query($my_connection_string,"SElECT * FROM stu_tbl_2018 WHERE f_name  like '%$key%' or l_name like '%$key%'");
  else
     $sql_sel=mysqli_query($my_connection_string,"SELECT `stu_id`,`f_name`,`l_name`,`address`,`phone`,`email`,`student_class` FROM `stu_tbl_2018` WHERE `student_class` LIKE '%$my_class%'");
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $row['stu_id'];?></td>
            <td><?php echo $row['f_name']."    ".$row['l_name'];?></td>
            <td><?php echo $row['student_class'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['email'];?></td>
            everyone.php?tag=student_entry&opr=upd&rs_id=
            <td><a href=" everyone.php?tag=student_entry&opr=upd&rs_id=<?php echo $row['stu_id'];?>" title="Update"><img src="picture/update.png" /></a></td>
            <td><a href="everyone.php?tag=view_students&opr=del&rs_id=<?php echo $row['stu_id'];?>" title="Delete"><img src="picture/delete.png" /></a></td>

        </tr>
    <?php
    }
  // ----- for search studnens------


    ?>
    </table>
    </div>
</form>
 




<footer>
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/validator.js"></script>
  <script src="js/application.js"></script>
</footer>

</body>
</html>