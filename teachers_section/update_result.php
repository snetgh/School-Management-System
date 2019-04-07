<?php

include '../conection/connect.php';

$get_my_id = $_COOKIE['i'];

$my_query = mysqli_query($my_connection_string,"SELECT * FROM `teacher_tbl` WHERE teacher_id = '$get_my_id'");
$get_subject = mysqli_fetch_array($my_query);
$subject_taught = $get_subject['subject_taught'];

$input = filter_input_array(INPUT_POST);

$get_student_grade = mysqli_real_escape_string($my_connection_string,$input["student_grade"]);
$get_student_exam= mysqli_real_escape_string($my_connection_string,$input["student_exam"]);
$get_exams = $get_student_exam+$get_student_grade;

$selected_id = $input["id"];

 switch ($subject_taught) {
     case 'maths':
     $hot_item = "maths";
        break;
     case 'english':
        $hot_item = "english";
        break;
     case 'social':
        $hot_item = "social";
        break;
     case 'science':
        $hot_item = "science";
        break;
     case 'rme':
        $hot_item = "rme";
        break;
     case 'ict':
        $hot_item = "ict";
        break;
    case 'bdt':
       $hot_item = "bdt";
        break;
     case 'gh_lang':
        $hot_item = "gh_lang";
        break;
                                
    default:
                                    # code...
        break;
                            }



if($input["action"] === 'edit'){

    if($get_student_grade > 50 || $get_student_exam > 50){


}else{

    $query = mysqli_query($my_connection_string,"UPDATE `stu_tbl_2018` SET `sub_".$hot_item."_grade` = '$get_student_grade', `sub_".$hot_item."_exams` = '$get_student_exam', `sub_".$hot_item."_total` = '$get_exams' WHERE `stu_id` = '$selected_id'");

    if($query){

        $get_user_info = mysqli_query($my_connection_string,"SELECT * FROM `stu_tbl_2018` WHERE `stu_id` = '$selected_id'");
$get_each_detail = mysqli_fetch_array($get_user_info);

$get_english_total = $get_each_detail['sub_english_total'];
$get_maths_total = $get_each_detail['sub_maths_total'];
$get_social_total = $get_each_detail['sub_social_total'];
$get_science_total = $get_each_detail['sub_science_total'];
$get_rme_total = $get_each_detail['sub_rme_total'];
$get_bdt_total = $get_each_detail['sub_bdt_total'];
$get_ict_total = $get_each_detail['sub_ict_total'];
$get_gh_lang_total = $get_each_detail['sub_gh_lang_total'];


if($get_english_total > 0 && $get_maths_total >0 && $get_social_total >0 && $get_science_total >0 && $get_rme_total >0 && $get_bdt_total >0 && $get_ict_total >0 && $get_gh_lang_total > 0 ){


if($get_english_total <=100 && $get_english_total >=90){
    $english_grade = 1;
}elseif ($get_english_total <=89 && $get_english_total >=80){
    $english_grade = 2;
}elseif ($get_english_total <=79 && $get_english_total >=70){
    $english_grade = 3;
}elseif($get_english_total <=69 && $get_english_total >=60){
    $english_grade = 4;
}elseif ($get_english_total <=59 && $get_english_total >=50){
    $english_grade = 5;
}elseif ($get_english_total <=49 && $get_english_total >=40){
    $english_grade = 6;
}elseif ($get_english_total <=39 && $get_english_total >=30){
    $english_grade = 7;
}elseif ($get_english_total <=29 && $get_english_total >=0){
    $english_grade = 8;
}



if($get_maths_total <=100 && $get_maths_total >=90){
    $maths_grade = 1;
}elseif ($get_maths_total <=89 && $get_maths_total >=80){
    $maths_grade = 2;
}elseif ($get_maths_total <=79 && $get_maths_total >=70){
    $maths_grade = 3;
}elseif($get_maths_total <=69 && $get_maths_total >=60){
    $maths_grade = 4;
}elseif ($get_maths_total <=59 && $get_maths_total >=50){
    $maths_grade = 5;
}elseif ($get_maths_total <=49 && $get_maths_total >=40){
    $maths_grade = 6;
}elseif ($get_maths_total <=39 && $get_maths_total >=30){
    $maths_grade = 7;
}elseif ($get_maths_total <=29 && $get_maths_total >=0){
    $maths_grade = 8;
}


if($get_social_total <=100 && $get_social_total >=90){
    $social_grade = 1;
}elseif ($get_social_total <=89 && $get_social_total >=80){
    $social_grade = 2;
}elseif ($get_social_total <=79 && $get_social_total >=70){
    $social_grade = 3;
}elseif($get_social_total <=69 && $get_social_total >=60){
    $social_grade = 4;
}elseif ($get_social_total <=59 && $get_social_total >=50){
    $social_grade = 5;
}elseif ($get_social_total <=49 && $get_social_total >=40){
    $social_grade = 6;
}elseif ($get_social_total <=39 && $get_social_total >=30){
    $social_grade = 7;
}elseif ($get_social_total <=29 && $get_social_total >=0){
    $social_grade = 8;
}

if($get_science_total <=100 && $get_science_total >=90){
    $science_grade = 1;
}elseif ($get_science_total <=89 && $get_science_total >=80){
    $science_grade = 2;
}elseif ($get_science_total <=79 && $get_science_total >=70){
    $science_grade = 3;
}elseif($get_science_total <=69 && $get_science_total >=60){
    $science_grade = 4;
}elseif ($get_science_total <=59 && $get_science_total >=50){
    $science_grade = 5;
}elseif ($get_science_total <=49 && $get_science_total >=40){
    $science_grade = 6;
}elseif ($get_science_total <=39 && $get_science_total >=30){
    $science_grade = 7;
}elseif ($get_science_total <=29 && $get_science_total >=0){
    $science_grade = 8;
}

if($get_ict_total <=100 && $get_ict_total >=90){
    $ict_grade = 1;
}elseif ($get_ict_total <=89 && $get_ict_total >=80){
    $ict_grade = 2;
}elseif ($get_ict_total <=79 && $get_ict_total >=70){
    $ict_grade = 3;
}elseif($get_ict_total <=69 && $get_ict_total >=60){
    $ict_grade = 4;
}elseif ($get_ict_total <=59 && $get_ict_total >=50){
    $ict_grade = 5;
}elseif ($get_ict_total <=49 && $get_ict_total >=40){
    $ict_grade = 6;
}elseif ($get_ict_total <=39 && $get_ict_total >=30){
    $ict_grade = 7;
}elseif ($get_ict_total <=29 && $get_ict_total >=0){
    $ict_grade = 8;
}

if($get_bdt_total <=100 && $get_bdt_total >=90){
    $bdt_grade = 1;
}elseif ($get_bdt_total <=89 && $get_bdt_total >=80){
    $bdt_grade = 2;
}elseif ($get_bdt_total <=79 && $get_bdt_total >=70){
    $bdt_grade = 3;
}elseif($get_bdt_total <=69 && $get_bdt_total >=60){
    $bdt_grade = 4;
}elseif ($get_bdt_total <=59 && $get_bdt_total >=50){
    $bdt_grade = 5;
}elseif ($get_bdt_total <=49 && $get_bdt_total >=40){
    $bdt_grade = 6;
}elseif ($get_bdt_total <=39 && $get_bdt_total >=30){
    $bdt_grade = 7;
}elseif ($get_bdt_total <=29 && $get_bdt_total >=0){
    $bdt_grade = 8;
}

if($get_rme_total <=100 && $get_rme_total >=90){
    $rme_grade = 1;
}elseif ($get_rme_total <=89 && $get_rme_total >=80){
    $rme_grade = 2;
}elseif ($get_rme_total <=79 && $get_rme_total >=70){
    $rme_grade = 3;
}elseif($get_rme_total <=69 && $get_rme_total >=60){
    $rme_grade = 4;
}elseif ($get_rme_total <=59 && $get_rme_total >=50){
    $rme_grade = 5;
}elseif ($get_rme_total <=49 && $get_rme_total >=40){
    $rme_grade = 6;
}elseif ($get_rme_total <=39 && $get_rme_total>=30){
    $rme_grade = 7;
}elseif ($get_rme_total <=29 && $get_rme_total>=0){
    $rme_grade = 8;
}


if($get_gh_lang_total <=100 && $get_gh_lang_total >=90){
    $ghanaian_language_grade = 1;
}elseif ($get_gh_lang_total <=89 && $get_gh_lang_total >=80){
    $ghanaian_language_grade = 2;
}elseif ($get_gh_lang_total <=79 && $get_gh_lang_total >=70){
    $ghanaian_language_grade = 3;
}elseif($get_gh_lang_total <=69 && $get_gh_lang_total >=60){
    $ghanaian_language_grade = 4;
}elseif ($get_gh_lang_total <=59 && $get_gh_lang_total >=50){
    $ghanaian_language_grade = 5;
}elseif ($get_gh_lang_total <=49 && $get_gh_lang_total >=40){
    $ghanaian_language_grade = 6;
}elseif ($get_gh_lang_total <=39 && $get_gh_lang_total >=30){
    $ghanaian_language_grade = 7;
}elseif ($get_gh_lang_total <=29 && $get_gh_lang_total >=0){
    $ghanaian_language_grade = 8;
}

 if($ict_grade <= $bdt_grade && $ict_grade <= $rme_grade && $ict_grade <= $ghanaian_language_grade){

    $first_best_subject = "ict";

    if($bdt_grade <= $rme_grade && $bdt_grade <= $ghanaian_language_grade){

        $second_best_subject = "bdt";

    }elseif ($rme_grade <= $bdt_grade && $rme_grade <= $ghanaian_language_grade) {
        
        $second_best_subject = "rme";


    }elseif ($ghanaian_language_grade <= $bdt_grade && $ghanaian_language_grade <= $rme_grade) {
        
        $second_best_subject = "ghanaian_language";
    }

 }elseif ($bdt_grade <= $ict_grade && $bdt_grade <= $rme_grade && $bdt_grade <= $ghanaian_language_grade) {
     
        $first_best_subject = "bdt";

        if($ict_grade <= $rme_grade && $ict_grade <= $ghanaian_language_grade){

            $second_best_subject = "ict";

        }elseif ($rme_grade <= $ict_grade && $rme_grade <= $ghanaian_language_grade) {
            
            $second_best_subject = "rme";
        
        }elseif ($ghanaian_language_grade <= $ict_grade && $ghanaian_language_grade <= $rme_grade) {

            $second_best_subject = "ghanaian_language";
        }

 }elseif ($rme_grade <= $ict_grade && $rme_grade <= $bdt_grade && $rme_grade <= $ghanaian_language_grade) {
     
        $first_best_subject = "rme";

        if ($ict_grade <= $bdt_grade && $ict_grade <= $ghanaian_language_grade) {
            
            $second_best_subject = "ict";
        
        }elseif ($bdt_grade <= $ict_grade && $bdt_grade <= $ghanaian_language_grade) {
            
            $second_best_subject = "bdt";
        
        
        }elseif ($ghanaian_language_grade <= $ict_grade && $ghanaian_language_grade <= $bdt_grade) {
            
            $second_best_subject = "ghanaian_language";
        }

        }elseif ($ghanaian_language_grade <= $ict_grade && $ghanaian_language_grade <= $bdt_grade && $ghanaian_language_grade <= $rme_grade) {

     $first_best_subject = "ghanaian_language";

     if($ict_grade <= $bdt_grade && $ict_grade <= $rme_grade ){

        $second_best_subject = "ict";
     
     }elseif ($bdt_grade <= $ict_grade && $bdt_grade <= $rme_grade) {
         
         $second_best_subject = "bdt";
     
     }elseif ($rme_grade <= $ict_grade && $rme_grade <= $bdt_grade) {
         
         $second_best_subject = "rme";
 }
}


 // Getting First Best Subject

 switch ($first_best_subject) {
     case 'ict':
         $first_best_subject_grade = $ict_grade;
         $first_best_subject_text = "I.C.T";
         break;
    case 'bdt':
        $first_best_subject_grade = $bdt_grade;
        $first_best_subject_text = "B.D.T";
        break;
    case 'rme':
        $first_best_subject_grade = $rme_grade;
        $first_best_subject_text = "R.M.E";
        break;
    case 'ghanaian_language':
        $first_best_subject_grade = $ghanaian_language_grade;
        $first_best_subject_text = "GHANAIAN LANGUAGE";
        break;
     
     default:
         $first_best_subject_grade = "0";
         break;
 }

 // Getting Second Best Subject

 switch ($second_best_subject) {
     case 'ict':
         $second_best_subject_grade = $ict_grade;
         $second_best_subject_text = "I.C.T";
         break;
    case 'bdt':
        $second_best_subject_grade = $bdt_grade;
        $second_best_subject_text = "B.D.T";
        break;
    case 'rme':
        $second_best_subject_grade = $rme_grade;
        $second_best_subject_text = "R.M.E";
        break;
    case 'ghanaian_language':
        $second_best_subject_grade = $ghanaian_language_grade;
        $second_best_subject_text = "GHANAIAN LANGUAGE";
        break;
     
     default:
         $second_best_subject_grade = "0";
         break;
 }

// Getting All Core Subject Aggregate

 $all_core_subject_aggregate = $maths_grade+$science_grade+$social_grade+$english_grade;

// Adding Best Two Subjects

 $other_two_best_grade = $first_best_subject_grade+$second_best_subject_grade;

// Students Total Aggregate

 $students_total_aggregate = $all_core_subject_aggregate+$other_two_best_grade;

 $query_update_me = mysqli_query($my_connection_string,"UPDATE `stu_tbl_2018` SET 
    `english_grade` = '$english_grade', 
    `maths_grade` = '$maths_grade', 
    `social_grade` = '$social_grade', 
    `science_grade` = '$science_grade', 
    `rme_grade` = '$rme_grade', 
    `bdt_grade` = '$bdt_grade', 
    `ict_grade` = '$ict_grade', 
    `gh_lang_grade` = '$ghanaian_language_grade', 
    `total`       = '$students_total_aggregate'
    WHERE 
    `stu_id` = '$selected_id'");


    }
}
}
}

    echo json_encode($input);



?>