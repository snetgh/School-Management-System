<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($my_connection_string,"DELETE FROM stu_tbl_2018 WHERE `stu_id`=$id");
	if($del_sql) {
        echo "<div>"
            . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Sucess!</strong> Record Deleted"
            . "</div>"
            . "</div>";
    }
	else
		$msg="Could not Delete :".mysqli_error();	
			
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
<title>School Management System</title>
</head>

<body>


<div class="col-md-12  view-form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Student Results</h4>
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

                <li><a class="dropdown-item" href="everyone.php?tag=view_scores&view_class=<?php echo $get_individual_class_name;?>" name="link"><?php  echo $get_individual_view_class_name; ?></a></li>

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
            <div class="col-md-9 col-md-offset-1   col-xs-9 col-sm-10">
                <input type="text" class="form-control" name="searchtxt" Placeholder="Enter name for search" autocomplete="off"/></div>
            <input type="submit" name="btnsearch" value="Search" class="btn btn-info"/>
        </div>
    </form>


<div class="table-responsive">
    <table class="table table-bordered">
         <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th colspan="2" style="text-align: center;">English</th>
                                        <th colspan="2" style="text-align: center;">Maths</th>
                                        <th colspan="2" style="text-align: center;">Social</th>
                                        <th colspan="2" style="text-align: center;">Science</th>
                                        <th colspan="2" style="text-align: center;">R.M.E</th>
                                        <th colspan="2" style="text-align: center;">I.C.T</th>
                                        <th colspan="2" style="text-align: center;">B.D.T</th>
                                        <th colspan="2" style="text-align: center;">GH Lang.</th>
                                        <th>Total Aggregate</th>
                                        <th></th>
                                       
                                       
                                       
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>Class</th>
                                        <th>Exams</th>
                                        <th>Class</th>
                                        <th>Exams</th>
                                        <th>Class</th>
                                        <th>Exams</th>
                                        <th>Class</th>
                                        <th>Exams</th>
                                        <th>Class</th>
                                        <th>Exams</th>
                                        <th>Class</th>
                                        <th>Exams</th>
                                        <th>Class</th>
                                        <th>Exams</th>
                                        <th>Class</th>
                                        <th>Exams</th>                                       
                                        <th>&nbsp;</th>
                                       
                       
                                       
                                    </tr>
                                    </thead>
        
        <?php

        if (!isset($_GET['view_class'])) {
        
            $sql_sel=mysqli_query($my_connection_string,"SELECT `stu_id`,`f_name`,`l_name`,`gender`,`student_class`,`sub_english_grade`,`sub_english_exams`,`sub_maths_grade`,`sub_maths_exams`,`sub_social_grade`,`sub_social_exams`,`sub_science_grade`,`sub_science_exams`,`sub_rme_grade`,`sub_rme_exams`,`sub_ict_grade`,`sub_ict_exams`,`sub_bdt_grade`,`sub_bdt_exams`,`sub_gh_lang_grade`,`sub_gh_lang_exams`,`total` FROM `stu_tbl_2018` ORDER BY `student_class`");
        }else{  

        $get_view_class = $_GET['view_class'];  
         $sql_sel=mysqli_query($my_connection_string,"SELECT `stu_id`,`f_name`,`l_name`,`gender`,`student_class`,`sub_english_grade`,`sub_english_exams`,`sub_maths_grade`,`sub_maths_exams`,`sub_social_grade`,`sub_social_exams`,`sub_science_grade`,`sub_science_exams`,`sub_rme_grade`,`sub_rme_exams`,`sub_ict_grade`,`sub_ict_exams`,`sub_bdt_grade`,`sub_bdt_exams`,`sub_gh_lang_grade`,`sub_gh_lang_exams`,`total` FROM `stu_tbl_2018` WHERE `student_class` LIKE '%$get_view_class%' ORDER BY `f_name`"); }

    if(isset($_POST["btnsearch"])){
            $key = $_POST["searchtxt"];
            if(!isset($_GET['view_class'])){
                $sql_sel=mysqli_query($my_connection_string,"SELECT `stu_id`,`f_name`,`l_name`,`gender`,`student_class`,`sub_english_grade`,`sub_english_exams`,`sub_maths_grade`,`sub_maths_exams`,`sub_social_grade`,`sub_social_exams`,`sub_science_grade`,`sub_science_exams`,`sub_rme_grade`,`sub_rme_exams`,`sub_ict_grade`,`sub_ict_exams`,`sub_bdt_grade`,`sub_bdt_exams`,`sub_gh_lang_grade`,`sub_gh_lang_exams`,`total` FROM `stu_tbl_2018` WHERE
              `f_name` LIKE '%$key%' OR
              `l_name` LIKE '%$key%' AND `student_class` = 'jhs1a'");

            }else{
                $hot_item = $_GET['view_class'];  
                $sql_sel=mysqli_query($my_connection_string,"SELECT `stu_id`,`f_name`,`l_name`,`gender`,`student_class`,`sub_english_grade`,`sub_english_exams`,`sub_maths_grade`,`sub_maths_exams`,`sub_social_grade`,`sub_social_exams`,`sub_science_grade`,`sub_science_exams`,`sub_rme_grade`,`sub_rme_exams`,`sub_ict_grade`,`sub_ict_exams`,`sub_bdt_grade`,`sub_bdt_exams`,`sub_gh_lang_grade`,`sub_gh_lang_exams`,`total` FROM `stu_tbl_2018` WHERE `student_class`='jhs1a' AND `f_name` LIKE '%$key%' OR `l_name` LIKE '%$key%'");
             
         }
            }

		
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $row['stu_id'];?></td>
            <td><?php echo $row['f_name']."&nbsp;".$row['l_name'];?></td>
            <td><?php echo strtoupper($row['student_class']);?></td>
            <td><?php echo $row['sub_english_grade'];?></td>
            <td><?php echo $row['sub_english_exams'];?></td>
            <td><?php echo $row['sub_maths_grade'];?></td>
            <td><?php echo $row['sub_maths_exams'];?></td>
            <td><?php echo $row['sub_social_grade'];?></td>
            <td><?php echo $row['sub_social_exams'];?></td>
            <td><?php echo $row['sub_science_grade'];?></td>
            <td><?php echo $row['sub_science_exams'];?></td>
            <td><?php echo $row['sub_rme_grade'];?></td>
            <td><?php echo $row['sub_rme_exams'];?></td>     
            <td><?php echo $row['sub_ict_grade'];?></td>
            <td><?php echo $row['sub_ict_exams'];?></td>                   
            <td><?php echo $row['sub_bdt_grade'];?></td>
            <td><?php echo $row['sub_bdt_exams'];?></td>
            <td><?php echo $row['sub_gh_lang_grade'];?></td>
            <td><?php echo $row['sub_gh_lang_exams'];?></td>
            <td><?php echo $row['total'];?></td>
            <td align="center"><a href="?tag=view_scores&opr=del&rs_id=<?php echo $row['stu_id'];?>"><img src="picture/delete.png" /></a></td>
        </tr>
        
    <?php
		
    }
    ?>
    </table>
</div>
</body>
</html>