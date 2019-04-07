<?php

include '../conection/connect.php';

$input = filter_input_array(INPUT_POST);

$get_student_attitude = mysqli_real_escape_string($my_connection_string,$input["stu_attitude"]);
$get_student_conduct = mysqli_real_escape_string($my_connection_string,$input["stu_conduct"]);
$get_student_interest = mysqli_real_escape_string($my_connection_string,$input["stu_interest"]);
$get_teacher_remarks = mysqli_real_escape_string($my_connection_string,$input["teachers_remarks"]);
$get_attendance = mysqli_real_escape_string($my_connection_string,$input["student_attendance"]);
$get_promotion = mysqli_real_escape_string($my_connection_string,$input["student_promotion"]);

$selected_id = $input["id"];

if($input["action"] === 'edit'){

$query = mysqli_query($my_connection_string,"UPDATE `stu_tbl_2018` SET 
    `stu_conduct` = '$get_student_conduct', 
    `stu_intrest` = '$get_student_interest', 
    `stu_attitude` = '$get_student_attitude', 
    `teachers_remarks` = '$get_teacher_remarks',
    `attendance` = '$get_attendance',
    `promotion` = '$get_promotion' 
    WHERE 
    `stu_id` = '$selected_id'");

}
    echo json_encode($input);

?>