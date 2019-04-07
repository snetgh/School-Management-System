<?php
    $msg="";
    $opr="";
    $id="";
    if(isset($_GET['opr']))
    $opr=$_GET['opr'];
    
   // $id=$_GET['rs_id'];
    if(isset($_COOKIE['i'])){
        $id = $_COOKIE['i'];
    }



    $query_get_teacher_details = mysqli_query($my_connection_string,"SELECT `teacher_type_class` FROM `teacher_tbl` WHERE `teacher_id` ='$id' LIMIT 1");
    $get_each_detail = mysqli_fetch_array($query_get_teacher_details);
    $teacher_class = $get_each_detail['teacher_type_class'];

    $get_class_name_ini = mysqli_query($my_connection_string,"SELECT `view_class_name` FROM `class_holders` WHERE `class_name` = '$teacher_class'");
    $get_class_name = mysqli_fetch_array($get_class_name_ini);
    $class_name_display = $get_class_name['view_class_name'];

?>

<form role="form" data-toggle="validator" method="post" class="form-horizontal">
        <div class="form-group">
            <div class="col-md-9 col-md-offset-1 col-xs-9 col-sm-10">
                <input type="text" class="form-control" name="searchtxt" Placeholder="Enter name or class for search" autocomplete="off"/></div>
            <input type="submit" name="btnsearch" value="Search" class="btn btn-info"/>
        </div>
    </form>

<div class="table-responsive" style="margin: 20px;background: aliceblue;">
    <div style="text-align: center;background: #c19eb3;padding: 8px"><span style="color: blue;font-size: 15px;font-weight: bold;"><?php echo $class_name_display;  ?></span></div>
        <table class="table table-bordered" id="manage_class_table">
        <thead>
            <th>#</th>
            <th> Name</th>
            <th style="text-align: center">Attitude</th>
            <th style="text-align: center">Conduct</th>
            <th style="text-align: center">Interest</th>
            <th style="text-align: center">Remarks</th>
            <th style="text-align: center">Attendance</th>
            <th style="text-align: center">Promoted To</th>
        </thead>

        <tbody>

        <?php
         $key="";
    if(isset($_POST['searchtxt']))
        $key=$_POST['searchtxt'];

    if($key !="")
                $get_students_query=mysqli_query($my_connection_string,"SELECT * FROM `stu_tbl_2018` WHERE `f_name`  LIKE '%$key%' or 
            `l_name` LIKE '%$key%' or
            `student_class` LIKE '%$key%' ");
    else
        $run_students_query = mysqli_query($my_connection_string,"SELECT `stu_id`,`f_name`,`l_name`,`stu_conduct`, `stu_attitude`, `stu_intrest`,`teachers_remarks`,`attendance`,`promotion` FROM `stu_tbl_2018` WHERE `student_class`LIKE '%$teacher_class%'");

        $i = 0;
        while ($get_details = mysqli_fetch_array($run_students_query)) {
                $student_id = $get_details['stu_id'];
                $student_name = $get_details['f_name']."&nbsp;".$get_details['l_name'];
                $student_conduct = $get_details['stu_conduct'];
                $student_intrest = $get_details["stu_intrest"];
                $student_attitude = $get_details["stu_attitude"];
                $teachers_remarks = $get_details["teachers_remarks"];
                $student_attendance = $get_details["attendance"];
                $student_promotion = $get_details["promotion"];

        $i++;

        $color=($i%2==0)?"lightblue":"white";
      
    ?>
      <tr bgcolor="<?php echo $color?>">
     
    <td><?php  echo $student_id; ?></td>     
    <td><?php  echo $student_name; ?></td>
    <td style="background-color: #0000ff40"><?php  echo $student_attitude; ?></td>
    <td style="background-color: #0000ff40"><?php  echo $student_conduct; ?></td>
    <td style="background-color: #e82a4b54"><?php  echo $student_intrest; ?></td>  
    <td style="background-color: #e82a4b54"><?php  echo $teachers_remarks; ?></td>
    <td style="background-color: #e82a4b54"><?php  echo $student_attendance; ?></td>
    <td style="background-color: #e82a4b54"><?php  echo strtoupper($student_promotion); ?></td>                          

        </tr>
    <?php
    }
    // ----- for search studnens------


    ?>
    </tbody>
    </table>


</body>
</html>
