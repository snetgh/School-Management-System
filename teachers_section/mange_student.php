<?php
    $msg="";
    $opr="";
    $id="";
    if(isset($_GET['opr']))
    $opr=$_GET['opr'];
    
   // $id=$_GET['rs_id'];
    if(isset($_COOKIE['i']))
        $id = $_COOKIE['i'];

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
    $f_name=$_POST['fnametxt'];
    $l_name=$_POST['lnametxt'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $addr=$_POST['addrtxt'];
    $degree=$_POST['degree'];
    $salary = $_POST['slarytxt'];
    $married=$_POST['marriedrdo'];
    $phone=$_POST['phonetxt'];
    $mail=$_POST['emailtxt'];

    $sql_update=mysqli_query($my_connection_string,"UPDATE teacher_tbl SET
                            f_name='$f_name' ,
                            l_name='$l_name' ,
                            gender='$gender' ,
                            dob='$dob' ,
                            address='$addr' ,
                            degree='$degree' ,
                            salary='$salary' ,
                            married='$married' ,
                            phone='$phone' ,
                            email='$mail'
                        WHERE teacher_id=$id
    
    ");
if($sql_update==true) {
    $msg = ucfirst($f_name) ;
    echo "<div>"
        . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
        . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
        . "</button>"
        . "<strong>Sucess!</strong> Student $msg record Updated"
        . "</div>"
        . "</div>";
}
else {
    echo "<div>"
        . "<div class='alert alert-danger col-md-6 col-md-offset-3'>"
        . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
        . "</button>"
        . "<strong>Warning!</strong> Update Failed"
        . "</div>"
        . "</div>";
}

}
?>

<div class="col-md-10 col-md-offset-1 form-style">
   
    <div class="col-md-10 col-md-offset-1 form-style">
            <form role="form" data-toggle="validator" method="post" class="form-horizontal" style="overflow-x: auto">
                <div class="row">
                    <table class="table table-bordered table-responsive" style="margin-left: 25px" id="students_table">
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

                            $get_students_query = mysqli_query($my_connection_string,"SELECT * FROM stu_tbl_2018 WHERE student_class LIKE '%jhs1%'");
                            while ($get_details = mysqli_fetch_array($get_students_query)) {
                                $student_id = $get_details['stu_id'];
                                $student_name = $get_details['f_name']."&nbsp;".$get_details['l_name'];
                                $student_class = $get_details['student_class'];


                            ?>
                            <tr style="text-align: center;">
                                <td><?php  echo $student_id; ?></td>
                                <td><?php  echo $student_name; ?></td>
                                <td><?php  echo $student_class; ?></td>
                                <td style="background-color: #e82a4b54"></td>
                                <td style="background-color: #0000ff40"></td>
                                <td></td>
                            </tr>
                            <?php   } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
