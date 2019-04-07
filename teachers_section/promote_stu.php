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

    $get_year_ini = mysqli_query($my_connection_string,"SELECT * FROM `years_holder` ORDER BY `id` DESC LIMIT 1");
    $get_year_fetch = mysqli_fetch_array($get_year_ini);
    $get_latest_year = $get_year_fetch["year_name"];

    if(isset($_POST['btnpromote'])){
            $get_latest_year = $_POST["latest_year"];
            $get_next_class =  $_POST["next_class"];
            $table_format = "stu_tbl_".$get_latest_year;

        $check_table_existence = mysqli_query($my_connection_string,"SELECT * FROM information_schema.tables WHERE table_schema = '$table_format' AND table_name = '$database' LIMIT 1");
        $table_existence = mysqli_num_rows($check_table_existence);

        if($table_existence > 0){
            $get_students = $_POST["my_students"];
             foreach ($get_students as $student_id) {
                   # code...           
                $query_get_student_items = mysqli_query($my_connection_string,"SELECT `f_name`,`l_name`,`gender`,`dob`,`address`,`phone`,`email` FROM `stu_tbl_2018` WHERE `stu_id` = '$student_id'");
                $get_student_info = mysqli_fetch_array($query_get_student_items);
                $f_name = $get_student_info['f_name'];
                $l_name = $get_student_info['l_name'];
                $gender = $get_student_info['gender'];
                $dob = $get_student_info['dob'];
                $addr = $get_student_info['address'];
                $phone = $get_student_info['phone'];
                $mail = $get_student_info['email'];
                $class = $get_next_class;

                $query = mysqli_query($my_connection_string,"INSERT INTO $table_format (`stu_id`, `f_name`, `l_name`, `gender`, `dob`, `address`, `phone`, `email`, `student_class`, `sub_english_grade`, `sub_english_exams`, `sub_english_total`, `sub_maths_grade`, `sub_maths_exams`, `sub_maths_total`, `sub_science_grade`, `sub_science_exams`, `sub_science_total`, `sub_social_grade`, `sub_social_exams`, `sub_social_total`, `sub_rme_grade`, `sub_rme_exams`, `sub_rme_total`, `sub_ict_grade`, `sub_ict_exams`, `sub_ict_total`, `sub_bdt_grade`, `sub_bdt_exams`, `sub_bdt_total`, `sub_gh_lang_grade`, `sub_gh_lang_exams`, `sub_gh_lang_total`, `english_grade`, `maths_grade`, `social_grade`, `science_grade`, `rme_grade`, `bdt_grade`, `ict_grade`, `gh_lang_grade`, `total`, `stu_conduct`, `stu_intrest`, `stu_attitude`, `teachers_remarks`,`attendance`,`promotion`) VALUES (NULL, '$f_name', '$l_name', '$gender', '$dob', '$addr', '$phone', '$mail', '$class', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '','','')");

              
            }
        }else{

            $create_table_query = mysqli_query($my_connection_string,

                "CREATE TABLE IF NOT EXISTS $table_format (
                  `stu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                  `f_name` varchar(50) NOT NULL,
                  `l_name` varchar(50) NOT NULL,
                  `gender` char(10) NOT NULL,
                  `dob` date NOT NULL,
                  `address` varchar(100) NOT NULL,
                  `phone` varchar(50) NOT NULL,
                  `email` varchar(70) NOT NULL,
                  `student_class` varchar(12) NOT NULL,
                  `sub_english_grade` int(10) NOT NULL DEFAULT '0',
                  `sub_english_exams` int(10) NOT NULL DEFAULT '0',
                  `sub_english_total` int(10) NOT NULL DEFAULT '0',
                  `sub_maths_grade` int(10) NOT NULL DEFAULT '0',
                  `sub_maths_exams` int(10) NOT NULL DEFAULT '0',
                  `sub_maths_total` int(10) NOT NULL DEFAULT '0',
                  `sub_science_grade` int(10) NOT NULL DEFAULT '0',
                  `sub_science_exams` int(10) NOT NULL DEFAULT '0',
                  `sub_science_total` int(10) NOT NULL DEFAULT '0',
                  `sub_social_grade` int(10) NOT NULL DEFAULT '0',
                  `sub_social_exams` int(10) NOT NULL DEFAULT '0',
                  `sub_social_total` int(10) NOT NULL DEFAULT '0',
                  `sub_rme_grade` int(10) NOT NULL DEFAULT '0',
                  `sub_rme_exams` int(10) NOT NULL DEFAULT '0',
                  `sub_rme_total` int(10) NOT NULL DEFAULT '0',
                  `sub_ict_grade` int(10) NOT NULL DEFAULT '0',
                  `sub_ict_exams` int(10) NOT NULL DEFAULT '0',
                  `sub_ict_total` int(10) NOT NULL DEFAULT '0',
                  `sub_bdt_grade` int(10) NOT NULL DEFAULT '0',
                  `sub_bdt_exams` int(10) NOT NULL DEFAULT '0',
                  `sub_bdt_total` int(10) NOT NULL DEFAULT '0',
                  `sub_gh_lang_grade` int(10) NOT NULL DEFAULT '0',
                  `sub_gh_lang_exams` int(10) NOT NULL DEFAULT '0',
                  `sub_gh_lang_total` int(10) NOT NULL DEFAULT '0',
                  `english_grade` int(11) NOT NULL DEFAULT '0',
                  `maths_grade` int(11) NOT NULL DEFAULT '0',
                  `social_grade` int(11) NOT NULL DEFAULT '0',
                  `science_grade` int(11) NOT NULL DEFAULT '0',
                  `rme_grade` int(11) NOT NULL DEFAULT '0',
                  `bdt_grade` int(11) NOT NULL DEFAULT '0',
                  `ict_grade` int(11) NOT NULL DEFAULT '0',
                  `gh_lang_grade` int(11) NOT NULL DEFAULT '0',
                  `total` int(11) NOT NULL DEFAULT '0',
                  `stu_conduct` varchar(100) NOT NULL,
                  `stu_intrest` varchar(100) NOT NULL,
                  `stu_attitude` varchar(100) NOT NULL,
                  `teachers_remarks` varchar(100) NOT NULL,
                  `attendance` varchar(10) NOT NULL,
                  `promotion` varchar(10) NOT NULL,
                  PRIMARY KEY (`stu_id`)
                )");

            if($create_table_query){

                $get_students = $_POST["my_students"];
             foreach ($get_students as $student_id) {
                $query_get_student_items = mysqli_query($my_connection_string,"SELECT `f_name`,`l_name`,`gender`,`dob`,`address`,`phone`,`email` FROM `stu_tbl_2018` WHERE `stu_id` = '$student_id' ");
                $get_student_info = mysqli_fetch_array($query_get_student_items);
                $f_name = $get_student_info['f_name'];
                $l_name = $get_student_info['l_name'];
                $gender = $get_student_info['gender'];
                $dob = $get_student_info['dob'];
                $addr = $get_student_info['address'];
                $phone = $get_student_info['phone'];
                $mail = $get_student_info['email'];
                $class = $get_next_class;

                $query = mysqli_query($my_connection_string,"INSERT INTO $table_format (`stu_id`, `f_name`, `l_name`, `gender`, `dob`, `address`, `phone`, `email`, `student_class`, `sub_english_grade`, `sub_english_exams`, `sub_english_total`, `sub_maths_grade`, `sub_maths_exams`, `sub_maths_total`, `sub_science_grade`, `sub_science_exams`, `sub_science_total`, `sub_social_grade`, `sub_social_exams`, `sub_social_total`, `sub_rme_grade`, `sub_rme_exams`, `sub_rme_total`, `sub_ict_grade`, `sub_ict_exams`, `sub_ict_total`, `sub_bdt_grade`, `sub_bdt_exams`, `sub_bdt_total`, `sub_gh_lang_grade`, `sub_gh_lang_exams`, `sub_gh_lang_total`, `english_grade`, `maths_grade`, `social_grade`, `science_grade`, `rme_grade`, `bdt_grade`, `ict_grade`, `gh_lang_grade`, `total`, `stu_conduct`, `stu_intrest`, `stu_attitude`, `teachers_remarks`,`attendance`,`promotion`) VALUES (NULL, '$f_name', '$l_name', '$gender', '$dob', '$addr', '$phone', '$mail', '$class', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '','','')");

            }
        }
    }
}

?>



<div class="table-responsive" style="margin: 20px;background: aliceblue;">
    <br><br>
    <form method="post">       
        <div class="form-group">
            <div class="col-md-9 col-md-offset-1 col-xs-9 col-sm-10 pull-left" style="width: 100%">
                <span style="font-weight: bold"> Promote Student(s) To Year </span>
               <select class="form-control" style="display: inline;width: 100px" name="latest_year"><option><?php echo $get_latest_year  ?></option></select>
               <span style="font-weight: bold"> Class </span>
                <select class="form-control" style="display: inline;width: 100px" name="next_class">
                    <?php

            $top_get_class_name_ini = mysqli_query($my_connection_string,"SELECT * FROM `class_holders`");
   while ($top_get_class_name = mysqli_fetch_array($top_get_class_name_ini)) {
        $top_class_name = $top_get_class_name['class_name'];
        $top_class_name_display = $top_get_class_name['view_class_name'];
  
    
                    ?>

                    <option value="<?php echo $top_class_name; ?>"><?php  echo $top_class_name_display  ?></option>

                    <?php   } ?>


                </select>

            <input type="submit" name="btnpromote" value="Promote" class="btn btn-info"/>
        </div>
    </div>

<br><br><br><br>
       
       <!-- <button class="btn btn-primary btn-md form-control" width="100px">Promote Students</button>
        <select class="form-control form-group" ><option>2018</option></select>  -->
  
    <div style="text-align: center;background: #c19eb3;padding: 8px"><span style="color: blue;font-size: 15px;font-weight: bold;"><?php echo $class_name_display;  ?></span></div>
        <table class="table table-bordered" id="manage_class_table">
            <div class="check_all_boxes">
        <thead>
            <th>#</th>
            <th> Name</th>
            <th style="text-align: center">Class</th>
            <th style="text-align: center">Aggregate</th>
            <th style="text-align: center">Promote<input type="checkbox" id="check-all" class="all" style="height: 20px;width: 20px;margin-left: 10px;"></th>
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
        $run_students_query = mysqli_query($my_connection_string,"SELECT `stu_id`,`f_name`,`l_name`,`student_class`,`total` FROM `stu_tbl_2018` WHERE `student_class` LIKE '%$teacher_class%' ORDER BY `total` ASC");

        $i = 0;
        $counter = 1;
        while ($get_details = mysqli_fetch_array($run_students_query)) {
                $student_id = $get_details['stu_id'];
                $student_name = $get_details['f_name']."&nbsp;".$get_details['l_name'];
                $student_class = $get_details['student_class'];
                $student_aggregate = $get_details['total'];


        $i++;

        $color=($i%2==0)?"lightblue":"white";
      
    ?>
      <tr bgcolor="<?php echo $color?>">
     
    <td><?php  echo $student_id; ?></td>     
    <td><?php  echo $student_name; ?></td>
    <td style="background-color: #0000ff40;text-align: center;"><?php  echo strtoupper($student_class); ?></td>
    <td style="background-color: #0000ff40;text-align: center;"><?php  echo $student_aggregate; ?></td>
    <td style="background-color: #0000ff40;text-align: center;"><?php  echo "<input type='checkbox' name='my_students[]' id='students' value='$student_id' style='height:20px;width:20px' ";?></td>                          
        </tr>

    <?php
    $counter++;
    }
    // ----- for search studnens------


    ?>
</div>
    </tbody>
    </table>

</form>


</body>
</html>
