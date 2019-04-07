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



    $query_get_teacher_details = mysqli_query($my_connection_string,"SELECT * FROM teacher_tbl WHERE teacher_id='$id' LIMIT 1");
    $get_each_detail = mysqli_fetch_array($query_get_teacher_details);
    $subject_taught = $get_each_detail['subject_taught'];
    $class_taught = $get_each_detail['classes'];


    $get_subject_name_ini = mysqli_query($my_connection_string,"SELECT `view_subject_name` FROM `subjects_taught` WHERE `subject_name` = '$subject_taught'");
    $get_subject_name = mysqli_fetch_array($get_subject_name_ini);
    $subject_name_display = $get_subject_name['view_subject_name'];

?>

<form role="form" data-toggle="validator" method="post" class="form-horizontal">
        <div class="form-group">
            <div class="col-md-9 col-md-offset-1 col-xs-9 col-sm-10">
                <input type="text" class="form-control" name="searchtxt" Placeholder="Enter name or class for search" autocomplete="off"/></div>
            <input type="submit" name="btnsearch" value="Search" class="btn btn-info"/>
        </div>
    </form>

<div class="table-responsive" style="margin: 20px;background: aliceblue;">
    <div style="text-align: center;background: #c19eb3;padding: 8px"><span style="color: blue;font-size: 15px;font-weight: bold;"><?php echo $subject_name_display;  ?></span></div>
        <table class="table table-bordered" id="students_table">
        <thead>
           <th>#</th>
            <th> Name</th>
            <th> Class</th>
            <th style="text-align: center">Class Marks (50%)</th>
            <th style="text-align: center">Exams Marks (50%)</th>
            <th>Total</th>
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
   $get_students_query = mysqli_query($my_connection_string,"SELECT * FROM `stu_tbl_2018` WHERE student_class LIKE '%$class_taught%' ORDER BY `student_class`");

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

      $i=0;
        while ($get_details = mysqli_fetch_array($get_students_query)) {
                $student_id = $get_details['stu_id'];
                $student_name = $get_details['f_name']."&nbsp;".$get_details['l_name'];
                $student_class = $get_details['student_class'];
                $student_grade = $get_details["sub_".$hot_item."_grade"];
                $student_exams = $get_details["sub_".$hot_item."_exams"];
                $student_total = $get_details["sub_".$hot_item."_total"];


        $i++;

        $color=($i%2==0)?"lightblue":"white";
      
    ?>
      <tr bgcolor="<?php echo $color?>">
          
    <td><?php  echo $student_id; ?></td>
    <td><?php  echo $student_name; ?></td>
    <td><?php  echo $student_class; ?></td>
    <td style="background-color: #e82a4b54"><?php  echo $student_grade; ?></td>
    <td style="background-color: #0000ff40"><?php  echo $student_exams; ?></td>
    <td><?php  echo $student_total; ?></td>
                           

        </tr>
    <?php
    }
    // ----- for search studnens------


    ?>
    </tbody>
    </table>


</body>
</html>
