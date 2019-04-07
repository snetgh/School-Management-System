<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($my_connection_string,"DELETE FROM stu_tbl_2018 WHERE stu_id=$id");
	if($del_sql) {
        {
            echo "<div>"
                . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
                . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                . "</button>"
                . "<strong>Sucess!</strong> Record Deleted"
                . "</div>"
                . "</div>";
        }
    }
	else
		$msg="Could not Delete :".mysqli_error();	
			
}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. Build Bright University .::</title>
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div class="col-md-12  view-form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Student View</h4>
        <br><br>
        <a class="btn btn-primary right" href="?tag=student_entry">Add New Student</a>
        <br><br>
        <hr>
        <form method="post">
        <div class="container">

        <?php

            $get_classes_ini = mysqli_query($my_connection_string,"SELECT * FROM `school_full_class`");
            while ($get_classes_items = mysqli_fetch_array($get_classes_ini)) {
                 $get_item_class_name = $get_classes_items['class_name'];
                 $get_item_view_class_name = $get_classes_items['view_class_name'];
        ?>
        <div class="dropdown btn-group" style="margin: 0px 10px 10px 0px">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"> <?php  echo $get_item_view_class_name;  ?> <span class="caret"></span></button>
            <ul class="dropdown-menu">
            <?php
                $get_individual_class_ini = mysqli_query($my_connection_string,"SELECT * FROM `class_holders` WHERE `class_name` LIKE '%$get_item_class_name%'");
            while ($get_individual_class_items = mysqli_fetch_array($get_individual_class_ini)) { // start of inner loop
                 $get_individual_class_name = $get_individual_class_items['class_name'];
                 $get_individual_view_class_name = $get_individual_class_items['view_class_name'];    ?>

                <li><a class="dropdown-item" href="everyone.php?tag=view_students&view_class=<?php echo $get_individual_class_name;?>" name="link"><?php  echo $get_individual_view_class_name; ?></a></li>

                <?php   } // End of inner loop  ?>
            </ul>
        </div>

        <?php  }  ?>
 
    </div>
    </form>
        <hr>
    </div>



    <form role="form" data-toggle="validator" method="post" class="form-horizontal">
        <div class="form-group">
            <div class="col-md-9 col-md-offset-1 col-xs-9 col-sm-10">
            <input type="text" class="form-control" name="searchtxt" Placeholder="Enter name for search" autocomplete="off"/></div>
            <input type="submit" name="btnsearch" value="Search" class="btn btn-info"/>
        </div>
    </form>


<form method="post">
    <div class="table-responsive">
        <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Address</th>
            <th>Phone</th>
            <th>E-mail</th>
            <th colspan="2">Operation</th>
        </tr>

        <?php
        if (!isset($_GET['view_class'])) {
        
            $sql_sel=mysqli_query($my_connection_string,"SELECT `stu_id`,`f_name`,`l_name`,`gender`,`address`,`phone`,`email`,`student_class` FROM stu_tbl_2018 ORDER BY `student_class`");
        }else{  

        $get_view_class = $_GET['view_class'];  
		 $sql_sel=mysqli_query($my_connection_string,"SELECT `stu_id`,`f_name`,`l_name`,`gender`,`address`,`phone`,`email`,`student_class` FROM `stu_tbl_2018` WHERE `student_class` LIKE '%$get_view_class%' ORDER BY `f_name`"); }

         if(isset($_POST["btnsearch"])){
            $key = $_POST["searchtxt"];
             $sql_sel=mysqli_query($my_connection_string,"SELECT `stu_id`,`f_name`,`l_name`,`gender`,`address`,`phone`,`email`,`student_class` FROM stu_tbl_2018 WHERE
              `f_name` LIKE '%$key%' OR
              `l_name` LIKE '%$key%'");
         }

    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $row['stu_id'];?></td>
            <td><?php echo $row['f_name']."    ".$row['l_name'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo strtoupper($row['student_class']);?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><a href="?tag=student_entry&opr=upd&rs_id=<?php echo $row['stu_id'];?>" title="Update"><img src="picture/update.png" /></a></td>
            <td><a href="?tag=view_students&opr=del&rs_id=<?php echo $row['stu_id'];?>" title="Delete"><img src="picture/delete.png" /></a></td>

        </tr>
    <?php
    }
	// ----- for search studnens------


    ?>
    </table>
    </div>
    </div>
</form>

</body>
</html>