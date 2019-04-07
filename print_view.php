<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8">
      <meta name="viewport" window.top="width=device-width, initial-scale=1">
      <title>School Managment System</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- <link rel="stylesheet" type="text/css" href="css/everyone_format.css"/> -->
      <style type="text/css">
            body{
                  background: none !important;
            }
            .make_small{
                  font-size: 10px;
            }

            @media print{
            table{page-break-after: always;}
            tr{page-break-inside: avoid;page-break-after: auto;}
            thead{display: table-header-group;}
            tfoot{display: table-footer-group;}
      }
      </style>
</head>
<body>

<?php	
	require_once 'conection/connect.php';
	$my_class = $_GET['sel_class'];

      $exellent_performance = "<strong>Excellent</strong>";
      $very_good = "<strong>Very Good</strong>";
      $good = "<strong>Good</strong>";
      $high_average = "<strong>High Average</strong>" ;
      $average = "<strong>Average</strong>";
      $low_average = "<strong>Low Average</strong>";
      $fail = "<strong>Fail</strong>"; 
?>

<?php
	$execute_get_student_data = mysqli_query($my_connection_string,"SELECT * FROM `stu_tbl_2018` WHERE student_class LIKE '%$my_class%' ");

      $get_total_number = mysqli_num_rows($execute_get_student_data);

	while($fetch_detail = mysqli_fetch_array($execute_get_student_data)){


		$student_first_name = strtoupper($fetch_detail["f_name"]);
            $student_last_name = strtoupper($fetch_detail["l_name"]);
            $student_class = strtoupper($fetch_detail["student_class"]);
            $student_id  = $fetch_detail["stu_id"];

            $student_english_class = $fetch_detail["sub_english_grade"];
            $student_english_exams = $fetch_detail["sub_english_exams"];
            $student_english_total = $fetch_detail["sub_english_total"];
            $student_english_grade = $fetch_detail["english_grade"];

            $student_maths_class = $fetch_detail["sub_maths_grade"];
            $student_maths_exams = $fetch_detail["sub_maths_exams"];
            $student_maths_total = $fetch_detail["sub_maths_total"];
            $student_maths_grade = $fetch_detail["maths_grade"];

            $student_social_class = $fetch_detail["sub_social_grade"];
            $student_social_exams = $fetch_detail["sub_social_exams"];
            $student_social_total = $fetch_detail["sub_social_total"];
            $student_social_grade = $fetch_detail["social_grade"];

            $student_science_class = $fetch_detail["sub_science_grade"];
            $student_science_exams = $fetch_detail["sub_science_exams"];
            $student_science_total = $fetch_detail["sub_science_total"];
            $student_science_grade = $fetch_detail["science_grade"];

            $student_ict_class = $fetch_detail["sub_ict_grade"];
            $student_ict_exams = $fetch_detail["sub_ict_exams"];
            $student_ict_total = $fetch_detail["sub_ict_total"];
            $student_ict_grade = $fetch_detail["ict_grade"];

            $student_rme_class = $fetch_detail["sub_rme_grade"];
            $student_rme_exams = $fetch_detail["sub_rme_exams"];
            $student_rme_total = $fetch_detail["sub_rme_total"];
            $student_rme_grade = $fetch_detail["rme_grade"];

            $student_bdt_class = $fetch_detail["sub_bdt_grade"];
            $student_bdt_exams = $fetch_detail["sub_bdt_exams"];
            $student_bdt_total = $fetch_detail["sub_bdt_total"];
            $student_bdt_grade = $fetch_detail["bdt_grade"];

            $student_gh_lang_class = $fetch_detail["sub_gh_lang_grade"];
            $student_gh_lang_exams = $fetch_detail["sub_gh_lang_exams"];
            $student_gh_lang_total = $fetch_detail["sub_gh_lang_total"];
            $student_gh_lang_grade = $fetch_detail["gh_lang_grade"];

            $get_student_conduct =  $fetch_detail["stu_conduct"];
            $get_student_interest = $fetch_detail["stu_intrest"];
            $get_student_attitude = $fetch_detail["stu_attitude"];
            $get_teachers_remarks = $fetch_detail["teachers_remarks"];

            $student_total_score = $student_english_total+$student_maths_total+$student_social_total+$student_science_total+$student_ict_total+$student_rme_total+$student_bdt_total+$student_gh_lang_total;

            $student_total_class_score = $student_english_class+$student_maths_class+$student_social_class+$student_science_class+$student_ict_class+$student_rme_class+$student_bdt_class+$student_gh_lang_class;

            $student_total_exams_score = $student_english_exams+$student_maths_exams+$student_social_exams+$student_science_exams+$student_ict_exams+$student_rme_exams+$student_bdt_exams+$student_gh_lang_exams;

            $student_total_aggregate = $fetch_detail["total"];

            $get_rank = mysqli_query($my_connection_string,"SELECT stu_id,f_name,1+(SELECT COUNT(*) FROM stu_tbl_2018 a WHERE a.sub_english_total > b.sub_english_total  AND student_class LIKE '%jhs1a%') AS english_rank, 1+(SELECT COUNT(*) FROM stu_tbl_2018 a WHERE a.sub_maths_total > b.sub_maths_total AND student_class LIKE '%jhs1a%') AS maths_rank,1+(SELECT COUNT(*) FROM stu_tbl_2018 a WHERE a.sub_social_total > b.sub_social_total AND student_class LIKE '%jhs1a%') AS social_rank,1+(SELECT COUNT(*) FROM stu_tbl_2018 a WHERE a.sub_science_total > b.sub_science_total AND student_class LIKE '%jhs1a%') AS science_rank,1+(SELECT COUNT(*) FROM stu_tbl_2018 a WHERE a.sub_ict_total > b.sub_ict_total AND student_class LIKE '%jhs1a%') AS ict_rank,1+(SELECT COUNT(*) FROM stu_tbl_2018 a WHERE a.sub_rme_total > b.sub_rme_total AND student_class LIKE '%jhs1a%') AS rme_rank,1+(SELECT COUNT(*) FROM stu_tbl_2018 a WHERE a.sub_bdt_total > b.sub_bdt_total AND student_class LIKE '%jhs1a%') AS bdt_rank,1+(SELECT COUNT(*) FROM stu_tbl_2018 a WHERE a.sub_gh_lang_total > b.sub_gh_lang_total AND student_class LIKE '%jhs1a%') AS gh_lang_rank,1+(SELECT COUNT(*) FROM stu_tbl_2018 a WHERE a.total > b.total AND student_class LIKE '%jhs1a%') AS total_rank FROM stu_tbl_2018 b WHERE stu_id = '$student_id'");

            $get_student_rank_ini = mysqli_fetch_array($get_rank);
            $get_english_rank = $get_student_rank_ini['english_rank'];
            $get_maths_rank = $get_student_rank_ini['maths_rank'];
            $get_social_rank = $get_student_rank_ini['social_rank'];
            $get_science_rank = $get_student_rank_ini['science_rank'];
            $get_ict_rank = $get_student_rank_ini['ict_rank'];
            $get_rme_rank = $get_student_rank_ini['rme_rank'];
            $get_bdt_rank = $get_student_rank_ini['bdt_rank'];
            $get_gh_lang_rank = $get_student_rank_ini['gh_lang_rank'];

            $get_overall_rank = $get_student_rank_ini['total_rank'];

            $ordinal_english_rank = substr($get_english_rank, -1);
            $ordinal_maths_rank = substr($get_maths_rank, -1);
            $ordinal_social_rank = substr($get_social_rank, -1);
            $ordinal_science_rank = substr($get_science_rank, -1);
            $ordinal_ict_rank = substr($get_ict_rank, -1);
            $ordinal_rme_rank = substr($get_rme_rank, -1);
            $ordinal_bdt_rank = substr($get_bdt_rank, -1);
            $ordinal_gh_lang_rank = substr($get_gh_lang_rank, -1);

            $ordinal_overall_rank = substr($get_overall_rank, -1);

            $th = "TH";
            $st = "ST";
            $nd = "ND";
            $rd = "RD";


            switch ($ordinal_english_rank) {
                  case '0':
                        $student_english_position = $get_english_rank.$th;
                        break;
                  case '1':
                         $student_english_position = $get_english_rank.$st;
                              break;
                  case '2':
                       $student_english_position = $get_english_rank.$nd;
                        break;
                  case '3':
                         $student_english_position = $get_english_rank.$rd;
                              break;
                  case '4':
                        $student_english_position = $get_english_rank.$th;
                        break;
                  case '5':
                        $student_english_position = $get_english_rank.$th;
                        break;
                  case '6':
                         $student_english_position = $get_english_rank.$th;
                              break;
                  case '7':
                        $student_english_position = $get_english_rank.$th;
                        break;
                  case '8':
                        $student_english_position = $get_english_rank.$th;
                        break;
                  case '9':
                         $student_english_position = $get_english_rank.$th;
                              break;
                  
                  default:
                        # code...
                        break;
            }

             switch ($ordinal_maths_rank) {
                  case '0':
                        $student_maths_position = $get_maths_rank.$th;
                        break;
                  case '1':
                         $student_maths_position = $get_maths_rank.$st;
                              break;
                  case '2':
                       $student_maths_position = $get_maths_rank.$nd;
                        break;
                  case '3':
                         $student_maths_position = $get_maths_rank.$rd;
                              break;
                  case '4':
                        $student_maths_position = $get_maths_rank.$th;
                        break;
                  case '5':
                        $student_maths_position = $get_maths_rank.$th;
                        break;
                  case '6':
                         $student_maths_position = $get_maths_rank.$th;
                              break;
                  case '7':
                        $student_maths_position = $get_maths_rank.$th;
                        break;
                  case '8':
                        $student_maths_position = $get_maths_rank.$th;
                        break;
                  case '9':
                         $student_maths_position = $get_maths_rank.$th;
                              break;
                  
                  default:
                        # code...
                        break;
            }


             switch ($ordinal_social_rank) {
                  case '0':
                        $student_social_position = $get_social_rank.$th;
                        break;
                  case '1':
                         $student_social_position = $get_social_rank.$st;
                              break;
                  case '2':
                       $student_social_position = $get_social_rank.$nd;
                        break;
                  case '3':
                         $student_social_position = $get_social_rank.$rd;
                              break;
                  case '4':
                        $student_social_position = $get_social_rank.$th;
                        break;
                  case '5':
                        $student_social_position = $get_social_rank.$th;
                        break;
                  case '6':
                         $student_social_position = $get_social_rank.$th;
                              break;
                  case '7':
                        $student_social_position = $get_social_rank.$th;
                        break;
                  case '8':
                        $student_social_position = $get_social_rank.$th;
                        break;
                  case '9':
                         $student_social_position = $get_social_rank.$th;
                              break;
                  
                  default:
                        # code...
                        break;
            }

             switch ($ordinal_science_rank) {
                  case '0':
                        $student_science_position = $get_science_rank.$th;
                        break;
                  case '1':
                         $student_science_position = $get_science_rank.$st;
                              break;
                  case '2':
                       $student_science_position = $get_science_rank.$nd;
                        break;
                  case '3':
                         $student_science_position = $get_science_rank.$rd;
                              break;
                  case '4':
                        $student_science_position = $get_science_rank.$th;
                        break;
                  case '5':
                        $student_science_position = $get_science_rank.$th;
                        break;
                  case '6':
                         $student_science_position = $get_science_rank.$th;
                              break;
                  case '7':
                        $student_science_position = $get_science_rank.$th;
                        break;
                  case '8':
                        $student_science_position = $get_science_rank.$th;
                        break;
                  case '9':
                         $student_science_position = $get_science_rank.$th;
                              break;
                  
                  default:
                        # code...
                        break;
            }

             switch ($ordinal_ict_rank) {
                  case '0':
                        $student_ict_position = $get_ict_rank.$th;
                        break;
                  case '1':
                         $student_ict_position = $get_ict_rank.$st;
                              break;
                  case '2':
                       $student_ict_position = $get_ict_rank.$nd;
                        break;
                  case '3':
                         $student_ict_position = $get_ict_rank.$rd;
                              break;
                  case '4':
                        $student_ict_position = $get_ict_rank.$th;
                        break;
                  case '5':
                        $student_ict_position = $get_ict_rank.$th;
                        break;
                  case '6':
                         $student_ict_position = $get_ict_rank.$th;
                              break;
                  case '7':
                        $student_ict_position = $get_ict_rank.$th;
                        break;
                  case '8':
                        $student_ict_position = $get_ict_rank.$th;
                        break;
                  case '9':
                         $student_ict_position = $get_ict_rank.$th;
                              break;
                  
                  default:
                        # code...
                        break;
            }

             switch ($ordinal_rme_rank) {
                  case '0':
                        $student_rme_position = $get_rme_rank.$th;
                        break;
                  case '1':
                         $student_rme_position = $get_rme_rank.$st;
                              break;
                  case '2':
                       $student_rme_position = $get_rme_rank.$nd;
                        break;
                  case '3':
                         $student_rme_position = $get_rme_rank.$rd;
                              break;
                  case '4':
                        $student_rme_position = $get_rme_rank.$th;
                        break;
                  case '5':
                        $student_rme_position = $get_rme_rank.$th;
                        break;
                  case '6':
                         $student_rme_position = $get_rme_rank.$th;
                              break;
                  case '7':
                        $student_rme_position = $get_rme_rank.$th;
                        break;
                  case '8':
                        $student_rme_position = $get_rme_rank.$th;
                        break;
                  case '9':
                         $student_rme_position = $get_rme_rank.$th;
                              break;
                  
                  default:
                        # code...
                        break;
            }

             switch ($ordinal_bdt_rank) {
                  case '0':
                        $student_bdt_position = $get_bdt_rank.$th;
                        break;
                  case '1':
                         $student_bdt_position = $get_bdt_rank.$st;
                              break;
                  case '2':
                       $student_bdt_position = $get_bdt_rank.$nd;
                        break;
                  case '3':
                         $student_bdt_position = $get_bdt_rank.$rd;
                              break;
                  case '4':
                        $student_bdt_position = $get_bdt_rank.$th;
                        break;
                  case '5':
                        $student_bdt_position = $get_bdt_rank.$th;
                        break;
                  case '6':
                         $student_bdt_position = $get_bdt_rank.$th;
                              break;
                  case '7':
                        $student_bdt_position = $get_bdt_rank.$th;
                        break;
                  case '8':
                        $student_bdt_position = $get_bdt_rank.$th;
                        break;
                  case '9':
                         $student_bdt_position = $get_bdt_rank.$th;
                              break;
                  
                  default:
                        # code...
                        break;
            }

             switch ($ordinal_gh_lang_rank) {
                  case '0':
                        $student_gh_lang_position = $get_gh_lang_rank.$th;
                        break;
                  case '1':
                         $student_gh_lang_position = $get_gh_lang_rank.$st;
                              break;
                  case '2':
                       $student_gh_lang_position = $get_gh_lang_rank.$nd;
                        break;
                  case '3':
                         $student_gh_lang_position = $get_gh_lang_rank.$rd;
                              break;
                  case '4':
                        $student_gh_lang_position = $get_gh_lang_rank.$th;
                        break;
                  case '5':
                        $student_gh_lang_position = $get_gh_lang_rank.$th;
                        break;
                  case '6':
                         $student_gh_lang_position = $get_gh_lang_rank.$th;
                              break;
                  case '7':
                        $student_gh_lang_position = $get_gh_lang_rank.$th;
                        break;
                  case '8':
                        $student_gh_lang_position = $get_gh_lang_rank.$th;
                        break;
                  case '9':
                         $student_gh_lang_position = $get_gh_lang_rank.$th;
                              break;
                  
                  default:
                        # code...
                        break;
            }

             switch ($ordinal_overall_rank) {
                  case '0':
                        $student_overall_position = $get_overall_rank.$th;
                        break;
                  case '1':
                         $student_overall_position = $get_overall_rank.$st;
                              break;
                  case '2':
                       $student_overall_position = $get_overall_rank.$nd;
                        break;
                  case '3':
                         $student_overall_position = $get_overall_rank.$rd;
                              break;
                  case '4':
                        $student_overall_position = $get_overall_rank.$th;
                        break;
                  case '5':
                        $student_overall_position = $get_overall_rank.$th;
                        break;
                  case '6':
                         $student_overall_position = $get_overall_rank.$th;
                              break;
                  case '7':
                        $student_overall_position = $get_overall_rank.$th;
                        break;
                  case '8':
                        $student_overall_position = $get_overall_rank.$th;
                        break;
                  case '9':
                         $student_overall_position = $get_overall_rank.$th;
                              break;
                  
                  default:
                        # code...
                        break;
            }




?>

<table class="table table-bordered">

<thead>
	
<tr class="make_small">

<td colspan="7" style="text-align: center;">
<img src="" alt="School Logo" height="100px" width="100px">
<div id="school_name" style="margin-top: -20px"><h2>Test School</strong></h2></div>
<div><h5>P.O. BOX AM 118, AMASAMAN- ACCRA. TEL. 02441120834</h5></div>
<div>EDUCATION, KEY TO SUCCESS</div>
</td>
</tr>

<tr class="make_small">
<td><strong>NAME</strong></td>
<td colspan="3" style="text-align: left;"><strong><?php echo $student_first_name."&nbsp;".$student_last_name ?></strong></td>
<td><strong>CLASS</strong></td>
<td colspan="2" style="text-align: left;"><strong><?php echo $student_class ?></strong></td>
</tr>

<tr class="make_small">
	<td><strong>EXAM TYPE</strong></td>
	<td colspan="3" style="text-align: left;"><strong>END OF TERM</strong></td>
      <td><strong>YEAR</strong></td>
      <td colspan="3" style="text-align: left;"><strong>2018/2019</strong></td>
</tr>

<tr class="make_small">
	<td><strong>VACATION</strong></td>
      <td colspan="3" style="text-align: left;"><strong>14TH JUNE 2018</strong></td>
      <td><strong>RESUME</strong></td>
      <td colspan="3" style="text-align: left;"><strong>30TH JULY 2018</strong></td>

</tr>

<tr class="make_small">
	<td><strong>NUMBER ON ROLL</strong></td>
      <td colspan="3" style="text-align: left;"><strong style="color: blue"><?php echo $get_total_number;  ?></strong></td>
      <td><strong>POSITION</strong></td>
      <td colspan="3" style="text-align: left;"><strong style="color: red"><?php echo $student_overall_position;  ?></strong></td>
</tr>

<tr class="make_small">
      <td><strong>ATTENDANCE</strong></td>
      <td colspan="3" style="text-align: left;"><strong style="color: blue"><?php echo "20 OUT OF 60";  ?></strong></td>
      <td><strong>PROMOTED TO </strong></td>
      <td colspan="3" style="text-align: left;"><strong style="color: red"><?php echo "";  ?></strong></td>
</tr>

<tr class="make_small">
	<td style="text-align: center"><strong>SUBJECT</strong></td>
      <td style="text-align: center"><strong>CLASS SCORE <br> 50%</strong></td>
	<td style="text-align: center"><strong>EXAMS SCORE <br> 50%</strong></td>
      <td style="text-align: center"><strong>TOTAL SCORE <br> 100%</strong></td>
	<td style="text-align: center"><strong>GRADE POINT</strong></td>
      <td style="text-align: center"><strong>POSITION</strong></td>
	<td style="text-align: center"><strong>REMARKS</strong></td>
</tr>

</thead>

<tbody style="font-size: 12px">

<tr>
	<?php

            switch ($student_english_grade) {
            	case '1':
            		$remarks_holder = $exellent_performance;
            		break;
            	case '2':
            		$remarks_holder = $very_good;
            		break;
            	case '3':
            		$remarks_holder = $good;
            		break;
            	case '4':
            		$remarks_holder = $high_average;
            		break;
            	case '5':
            		$remarks_holder = $average;
            		break;
            	case '6':
            		$remarks_holder = $low_average;
            		break;
            	case '7':
            		$remarks_holder = $fail;
            		break;
            	case '8':
            		$remarks_holder = $fail;
            		break;
            	
            	default:
            		$remarks_holder = "Error";
            		break;
            }

	?>
	<td><strong>ENGLISH</strong></td>
	<td style="text-align: center"><?php echo $student_english_class; ?></td>
      <td style="text-align: center"><?php echo $student_english_exams; ?></td>
      <td style="text-align: center"><?php echo $student_english_total; ?></td>
	<td style="text-align: center"><?php echo $student_english_grade; ?></td>
      <td style="text-align: center"><?php echo $student_english_position; ?></td>
	<td style="text-align: center"> <?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php  
	         switch ($student_maths_grade) {
            	case '1':
                        $remarks_holder = $exellent_performance;
                        break;
                  case '2':
                        $remarks_holder = $very_good;
                        break;
                  case '3':
                        $remarks_holder = $good;
                        break;
                  case '4':
                        $remarks_holder = $high_average;
                        break;
                  case '5':
                        $remarks_holder = $average;
                        break;
                  case '6':
                        $remarks_holder = $low_average;
                        break;
                  case '7':
                        $remarks_holder = $fail;
                        break;
                  case '8':
                        $remarks_holder = $fail;
                        break;
                  
                  default:
                        $remarks_holder = "Error";
                        break;
            }
            ?>
	<td><strong>MATHEMATICS</strong></td>
	<td style="text-align: center"><?php echo $student_maths_class; ?></td>
      <td style="text-align: center"><?php echo $student_maths_exams; ?></td>
      <td style="text-align: center"><?php echo $student_maths_total; ?></td>
      <td style="text-align: center"><?php echo $student_maths_grade; ?></td>
      <td style="text-align: center"><?php echo $student_maths_position;  ?></td>
      <td style="text-align: center"><?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php
	         switch ($student_social_grade) {
            	case '1':
                        $remarks_holder = $exellent_performance;
                        break;
                  case '2':
                        $remarks_holder = $very_good;
                        break;
                  case '3':
                        $remarks_holder = $good;
                        break;
                  case '4':
                        $remarks_holder = $high_average;
                        break;
                  case '5':
                        $remarks_holder = $average;
                        break;
                  case '6':
                        $remarks_holder = $low_average;
                        break;
                  case '7':
                        $remarks_holder = $fail;
                        break;
                  case '8':
                        $remarks_holder = $fail;
                        break;
                  
                  default:
                        $remarks_holder = "Error";
                        break;
            }
	?>
	<td><strong>SOCIAL STUDIES</strong></td>
	<td style="text-align: center"><?php echo $student_social_class; ?></td>
      <td style="text-align: center"><?php echo $student_social_exams; ?></td>
      <td style="text-align: center"><?php echo $student_social_total; ?></td>
      <td style="text-align: center"><?php echo $student_social_grade; ?></td>
      <td style="text-align: center"><?php echo $student_social_position;  ?></td>
      <td style="text-align: center"><?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php
	           switch ($student_science_grade) {
            	case '1':
                        $remarks_holder = $exellent_performance;
                        break;
                  case '2':
                        $remarks_holder = $very_good;
                        break;
                  case '3':
                        $remarks_holder = $good;
                        break;
                  case '4':
                        $remarks_holder = $high_average;
                        break;
                  case '5':
                        $remarks_holder = $average;
                        break;
                  case '6':
                        $remarks_holder = $low_average;
                        break;
                  case '7':
                        $remarks_holder = $fail;
                        break;
                  case '8':
                        $remarks_holder = $fail;
                        break;
                  
                  default:
                        $remarks_holder = "Error";
                        break;
            }
	?>
	<td><strong>SCIENCE</strong></td>
	<td style="text-align: center"><?php echo $student_science_class; ?></td>
      <td style="text-align: center"><?php echo $student_science_exams; ?></td>
      <td style="text-align: center"><?php echo $student_science_total; ?></td>
      <td style="text-align: center"><?php echo $student_science_grade; ?></td>
      <td style="text-align: center"><?php echo $student_science_position;  ?></td>
      <td style="text-align: center"><?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php
        switch ($student_ict_grade) {
            	case '1':
                        $remarks_holder = $exellent_performance;
                        break;
                  case '2':
                        $remarks_holder = $very_good;
                        break;
                  case '3':
                        $remarks_holder = $good;
                        break;
                  case '4':
                        $remarks_holder = $high_average;
                        break;
                  case '5':
                        $remarks_holder = $average;
                        break;
                  case '6':
                        $remarks_holder = $low_average;
                        break;
                  case '7':
                        $remarks_holder = $fail;
                        break;
                  case '8':
                        $remarks_holder = $fail;
                        break;
                  
                  default:
                        $remarks_holder = "Error";
                        break;
            }

	?>
	<td><strong>I.C.T</strong></td>
	<td style="text-align: center"><?php echo $student_ict_class; ?></td>
      <td style="text-align: center"><?php echo $student_ict_exams; ?></td>
      <td style="text-align: center"><?php echo $student_ict_total; ?></td>
      <td style="text-align: center"><?php echo $student_ict_grade; ?></td>
      <td style="text-align: center"><?php echo $student_ict_position;  ?></td>
      <td style="text-align: center"><?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php
 switch ($student_bdt_grade) {
            	case '1':
                        $remarks_holder = $exellent_performance;
                        break;
                  case '2':
                        $remarks_holder = $very_good;
                        break;
                  case '3':
                        $remarks_holder = $good;
                        break;
                  case '4':
                        $remarks_holder = $high_average;
                        break;
                  case '5':
                        $remarks_holder = $average;
                        break;
                  case '6':
                        $remarks_holder = $low_average;
                        break;
                  case '7':
                        $remarks_holder = $fail;
                        break;
                  case '8':
                        $remarks_holder = $fail;
                        break;
                  
                  default:
                        $remarks_holder = "Error";
                        break;
            }
	?>
	<td><strong>BASIC DESIGN & TECH.</strong></td>
	<td style="text-align: center"><?php echo $student_bdt_class; ?></td>
      <td style="text-align: center"><?php echo $student_bdt_exams; ?></td>
      <td style="text-align: center"><?php echo $student_bdt_total; ?></td>
      <td style="text-align: center"><?php echo $student_bdt_grade; ?></td>
      <td style="text-align: center"><?php echo $student_bdt_position;  ?></td>
      <td style="text-align: center"><?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php
          switch ($student_rme_grade) {
            	case '1':
                        $remarks_holder = $exellent_performance;
                        break;
                  case '2':
                        $remarks_holder = $very_good;
                        break;
                  case '3':
                        $remarks_holder = $good;
                        break;
                  case '4':
                        $remarks_holder = $high_average;
                        break;
                  case '5':
                        $remarks_holder = $average;
                        break;
                  case '6':
                        $remarks_holder = $low_average;
                        break;
                  case '7':
                        $remarks_holder = $fail;
                        break;
                  case '8':
                        $remarks_holder = $fail;
                        break;
                  
                  default:
                        $remarks_holder = "Error";
                        break;
            }
	?>
	<td><strong>R.M.E</strong></td>
	<td style="text-align: center"><?php echo $student_rme_class; ?></td>
      <td style="text-align: center"><?php echo $student_rme_exams; ?></td>
      <td style="text-align: center"><?php echo $student_rme_total; ?></td>
      <td style="text-align: center"><?php echo $student_rme_grade; ?></td>
      <td style="text-align: center"><?php echo $student_rme_position;  ?></td>
      <td style="text-align: center"><?php echo $remarks_holder; ?></td>
</tr>

<!--
<tr>
	<?php 
      /*
          switch ($student_french_grade) {
            	case '1':
            		$remarks_holder = "Excellent Performance";
            		break;
            	case '2':
            		$remarks_holder = "Very Good Performance";
            		break;
            	case '3':
            		$remarks_holder = "Good Performance";
            		break;
            	case '4':
            		$remarks_holder = "Proficiency Level Performance";
            		break;
            	case '5':
            		$remarks_holder = "Advanced Performance";
            		break;
            	case '6':
            		$remarks_holder = "Beginners Performance";
            		break;
            	case '7':
            		$remarks_holder = "Performance Below Expectation";
            		break;
            	case '8':
            		$remarks_holder = "No Grade Possible";
            		break;
            	
            	default:
            		$remarks_holder = "Error";
            		break;
            }
	?>
	<td><strong>FRENCH</strong></td>
	<td><?php echo $student_english_class; ?></td>
      <td><?php echo $student_english_exams; ?></td>
      <td><?php echo $student_english_total; ?></td>
      <td><?php echo $student_english_grade; ?></td>
      <td><?php echo $remarks_holder; */ ?></td>
</tr>    -->

<tr>
	<?php
 switch ($student_gh_lang_grade) {
            	case '1':
                        $remarks_holder = $exellent_performance;
                        break;
                  case '2':
                        $remarks_holder = $very_good;
                        break;
                  case '3':
                        $remarks_holder = $good;
                        break;
                  case '4':
                        $remarks_holder = $high_average;
                        break;
                  case '5':
                        $remarks_holder = $average;
                        break;
                  case '6':
                        $remarks_holder = $low_average;
                        break;
                  case '7':
                        $remarks_holder = $fail;
                        break;
                  case '8':
                        $remarks_holder = $fail;
                        break;
                  
                  default:
                        $remarks_holder = "Error";
                        break;
            }
	?>
	<td><strong>GHA. LANGUAGE</strong></td>
	<td style="text-align: center"><?php echo $student_gh_lang_class; ?></td>
      <td style="text-align: center"><?php echo $student_gh_lang_exams; ?></td>
      <td style="text-align: center"><?php echo $student_gh_lang_total; ?></td>
      <td style="text-align: center"><?php echo $student_gh_lang_grade; ?></td>
      <td style="text-align: center"><?php echo $student_gh_lang_position;  ?></td>
      <td style="text-align: center"><?php echo $remarks_holder; ?></td>

<tr>
	<td>&nbsp;</td>
	<td style="text-align: center"><strong>TOTAL CLASS SCORE</strong></td>
      <td style="text-align: center"><strong>TOTAL EXAMS SCORE</strong></td>
      <td style="text-align: center"><strong>OVERALL SCORE</strong></td>
	<td style="text-align: center"><strong>BEST SIX(6) <br>AGGREGATE</strong></td>
	<td>&nbsp;</td>
      <td>&nbsp;</td>

</tr>

<tr>
	<td>&nbsp;</td>
      <td style="text-align: center"><strong><?php echo $student_total_class_score ; ?></strong></td>
      <td style="text-align: center"><strong><?php echo $student_total_exams_score ; ?></strong></td>
	<td style="text-align: center"><strong><?php echo $student_total_score."/800"; ?></strong></td>
	<td style="text-align: center"><strong><?php echo $student_total_aggregate ; ?></strong></td>
      <td style="text-align: center">&nbsp;</td>
	<td style="text-align: center">&nbsp;</td>
</tr>

<tr>
      <td colspan="2"><strong>Attitude :</strong><span><strong><?php echo "&nbsp;".$get_student_attitude  ?></span></strong></td>
      <td colspan="2"><strong>Interest :</strong><span><strong><?php echo "&nbsp;".$get_student_interest  ?></strong></span></td>
      <td colspan="3"><strong>Conduct :</strong><span><strong><?php echo "&nbsp;".$get_student_conduct  ?></strong></span></td>
      

</tr>

<tr>
  <td>Teachers Remarks</td>
  <td colspan="3"><strong><?php echo "&nbsp;".$get_teachers_remarks ?></strong></td>
	<td><strong>HEAD TEACHER'S SIGNATURE</strong></td>
	<td colspan="2">&nbsp;</td>

</tr>

</tbody>


</table>


<?php 
}
include '_footer.html';
 ?>





</body>
</html>