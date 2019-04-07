<?php

    $msg="";
    $opr="";
    $id="";
    if(isset($_GET['opr']))
    $opr=$_GET['opr'];
    
if(isset($_GET['rs_id']))
    $id=$_GET['rs_id'];
    
//--------------add data-----------------
if(isset($_POST['btn_sub'])){
    $f_name=$_POST['fnametxt'];
    $l_name=$_POST['lnametxt'];
    $dob=$_POST['dob'];
    $addr=$_POST['addrtxt'];
    $degree=$_POST['degree'];
    $married=$_POST['marriedrdo'];
    $phone=$_POST['phonetxt'];
    $mail=$_POST['emailtxt'];
    $subject_taught = $_POST['subject_taught'];
    $teacher_type = $_POST['select_teacher_type'];
    $class_taught = $_POST['class_taught'];
    $teacher_username = $_POST['username'];
    $teacher_password = $_POST['password'];

    $check_existence = mysqli_query($my_connection_string,"SELECT * FROM `users_tbl` WHERE username = '$teacher_username' AND `password` = '$teacher_password' LIMIT 1");
    $count_them = mysqli_num_rows($check_existence);
    if($count_them > 0){

        echo "<div>". "<div class='alert alert-danger col-md-6 col-md-offset-3'>". "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;". "</button>". "<strong>Error!</strong> Username or Password Already Taken". "</div>". "</div>";

    }else{

        $check_existence_teacher = mysqli_query($my_connection_string,"SELECT * FROM `teacher_tbl` WHERE `f_name` = '$f_name' AND `l_name` = '$l_name' AND `phone` = '$phone' LIMIT 1");
    $count_them_teacher = mysqli_num_rows($check_existence_teacher);
    if($count_them_teacher > 0){

        echo "<div>"."<div class='alert alert-danger col-md-6 col-md-offset-3'>"."<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"."</button>"."<strong>Error!</strong> Teacher Already Exists"."</div>"."</div>";

    }else{

        if($teacher_type == 'subject_teacher'){

        $sql_ins=mysqli_query($my_connection_string,"INSERT INTO `teacher_tbl` (`teacher_id`, `teacher_login_info`, `f_name`, `l_name`, `dob`, `address`, `degree`, `married`, `phone`, `email`, `classes`, `subject_taught`, `teacher_type`, `teacher_type_class`, `time_stamp`) VALUES (NULL, '0', '$f_name', '$l_name', '$dob', '$addr', '$degree', '$married', '$phone', '$mail', '$class_taught', '$subject_taught', '$teacher_type', NULL, CURRENT_TIMESTAMP)");
}else{

    $teacher_class = $_POST['select_class_teacher'];

    $sql_ins=mysqli_query($my_connection_string,"INSERT INTO `teacher_tbl` (`teacher_id`, `teacher_login_info`, `f_name`, `l_name`, `dob`, `address`, `degree`, `married`, `phone`, `email`, `classes`, `subject_taught`, `teacher_type`, `teacher_type_class`, `time_stamp`) VALUES (NULL, '0', '$f_name', '$l_name', '$dob', '$addr', '$degree', '$married', '$phone', '$mail', '$class_taught', '$subject_taught', '$teacher_type', '$teacher_class', CURRENT_TIMESTAMP)");

}

if($sql_ins==true) {
    $msg = ucfirst($f_name) ;
    echo "<div>"
        . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
        . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
        . "</button>"
        . "<strong>Sucess!</strong> Teacher $msg record inserted"
        . "</div>"
        . "</div>";

        $insert_password = mysqli_query($my_connection_string,"INSERT INTO `users_tbl` (`u_id`, `username`, `password`, `type`) VALUES (NULL, '$teacher_username', '$teacher_password', 'Teacher')");

        $get_teacher_login_id = mysqli_query($my_connection_string,"SELECT * FROM `users_tbl` WHERE `username`= '$teacher_username' AND `password` = '$teacher_password' LIMIT 1");
        $get_teacher_id = mysqli_fetch_array($get_teacher_login_id);

        $get_id = $get_teacher_id["u_id"];

        $insert_teachers_login_info = mysqli_query($my_connection_string,"UPDATE `teacher_tbl` SET `teacher_login_info` = '$get_id' WHERE `f_name` = '$f_name' AND `l_name`= '$l_name'");
}
else
    $msg="Insert Error:".mysqli_error();
    
}

}


    }

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
    $f_name=$_POST['fnametxt'];
    $l_name=$_POST['lnametxt'];
    $dob=$_POST['dob'];
    $addr=$_POST['addrtxt'];
    $degree=$_POST['degree'];
    $married=$_POST['marriedrdo'];
    $phone=$_POST['phonetxt'];
    $mail=$_POST['emailtxt'];
    $subject_taught = $_POST['subject_taught'];
    $teacher_type = $_POST['select_teacher_type'];
    $class_taught = $_POST['class_taught'];
    $teacher_username = $_POST['username'];
    $teacher_password = $_POST['password'];

    if($teacher_type == 'subject_teacher'){

    $sql_update=mysqli_query($my_connection_string,"UPDATE teacher_tbl SET
                            f_name='$f_name' ,
                            l_name='$l_name' ,
                            dob='$dob' ,
                            address='$addr' ,
                            degree='$degree' ,
                            married='$married' ,
                            phone='$phone' ,
                            email='$mail',
                            classes = '$class_taught',
                            subject_taught = '$subject_taught',
                            teacher_type = '$teacher_type',
                            teacher_type_class = ''
                        WHERE teacher_id=$id
    
    ");
}else{

     $teacher_class = $_POST['select_class_teacher'];

     $sql_update=mysqli_query($my_connection_string,"UPDATE teacher_tbl SET
                            f_name='$f_name' ,
                            l_name='$l_name' ,
                            dob='$dob' ,
                            address='$addr' ,
                            degree='$degree' ,
                            married='$married' ,
                            phone='$phone' ,
                            email='$mail',
                            classes = '$class_taught',
                            subject_taught = '$subject_taught',
                            teacher_type = '$teacher_type',
                            teacher_type_class = '$teacher_class'
                        WHERE teacher_id=$id
    
    ");

}

    $password_update = mysqli_query($my_connection_string,"UPDATE `users_tbl` SET `username` = '$teacher_username', `password` = '$teacher_password', `type` = 'Teacher' WHERE `u_id` = '$id'");

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

<?php
if($opr=="upd")
{
    $sql_upd=mysqli_query($my_connection_string,"SELECT * FROM teacher_tbl WHERE teacher_id=$id");
    $rs_upd=mysqli_fetch_array($sql_upd);
    list($y,$m,$d)=explode('-',$rs_upd['dob']);

    $teacher_users_table_id = $rs_upd['teacher_login_info']; 

    $get_username = mysqli_query($my_connection_string,"SELECT * FROM `users_tbl` WHERE `u_id` = '$teacher_users_table_id' LIMIT 1 ");
    $get_login = mysqli_fetch_array($get_username);
?>
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Teacher Update</h4>
        <a class="btn btn-primary right" href="?tag=view_teachers">Back</a>
    </div>
    <div class="col-md-10 col-md-offset-1 form-style">
            <form role="form" data-toggle="validator" method="post" class="form-horizontal">
                <div class="row">
                    <div class="form-group">
                        <label for="fnametxt" class="control-label col-sm-3">First Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $rs_upd['f_name'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lnametxt" class="control-label col-sm-3">Last Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $rs_upd['l_name'];?>"/>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="marriedrdo" class="control-label col-sm-3">Married:</label>
                    <div class="radio col-sm-2">
                        <label><input type="radio" name="marriedrdo" value="yes" <?php if($rs_upd['married']=="yes") echo "checked";?>>Yes</label>
                    </div>
                    <div class="radio col-sm-4">
                        <label><input type="radio" name="marriedrdo" value="no" <?php if($rs_upd['married']=="no") echo "checked";?>>No</label>
                    </div>
                </div>
            
                    <div class="form-group">
                        <label for="phonetxt" class="control-label col-sm-3">Phone:</label>
                        <div class="col-sm-8">
                            <input type="number" data-minlength="10" class="form-control only-number" data-error="Enter Valid 10 Digit Phone Number  " id="phonetxt" name="phonetxt" value="<?php echo $rs_upd['phone'];?>">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="degree" class="control-label col-sm-3">Qualification:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="degree">
                            <option <?php if($rs_upd['degree']=="Diploma") echo "selected";?>>Diploma</option>
                            <option <?php if($rs_upd['degree']=="Degree") echo "selected";?>>Degree</option>
                            <option <?php if($rs_upd['degree']=="Masters") echo "selected";?>>Masters</option>
                        </select>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="emailtxt" class="control-label col-sm-3">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="emailtxt" name="emailtxt" value="<?php echo $rs_upd['email'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="emailtxt" class="control-label col-sm-3">Class Taught:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="class_taught">
                            <?php  

                            $get_class_names = mysqli_query($my_connection_string,"SELECT * FROM `school_full_class`"); 
                            while ($get_each_class = mysqli_fetch_array($get_class_names)) {
                                $get_class_name = $get_each_class['class_name'];
                                $get_class_view_name = $get_each_class['view_class_name'];
                             ?>

                            <option value="<?php  echo $get_class_name; ?>" <?php  if ($rs_upd['subject_taught'] == "<?php  echo $get_class_name; ?>") {
                                echo "selected";
                            }  ?>><?php   echo $get_class_view_name;  ?></option>


                            <?php    }  ?>
                           
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="emailtxt" class="control-label col-sm-3">Subject Taught:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="subject_taught">
                            <?php  

                            $get_class_names = mysqli_query($my_connection_string,"SELECT * FROM `subjects_taught`"); 
                            while ($get_each_class = mysqli_fetch_array($get_class_names)) {
                                $get_subject_name = $get_each_class['subject_name'];
                                $get_subject_view_name = $get_each_class['view_subject_name'];
                             ?>

                            <option value="<?php  echo $get_subject_name; ?>" <?php  if ($rs_upd['subject_taught'] == "<?php  echo $get_subject_name; ?>") {
                                echo "selected";
                            }  ?>><?php   echo $get_subject_view_name;  ?></option>


                            <?php    }  ?>
                           
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="degree" class="control-label col-sm-3">Teacher Type :</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="select_teacher_type" id="select_teacher_type">
                            <option <?php if($rs_upd['teacher_type']=="subject_taught") echo "selected";?> value="subject_teacher">Subject Teacher</option>
                            <option <?php if($rs_upd['teacher_type']=="class_teacher") echo "selected";?> value="class_teacher">Class Teacher</option>
                        </select>
                    </div>
                </div>

                <?php   if($rs_upd['teacher_type']=="subject_teacher"){  ?>
                <div class="form-group" hidden  id="class_teacher_show_hide" >
                    <label for="degree" class="control-label col-sm-3">Select Teacher Class:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="select_class_teacher" id="select_class_teacher">
                             <?php  

                            $get_class_names = mysqli_query($my_connection_string,"SELECT * FROM `class_holders`"); 
                            while ($get_each_class = mysqli_fetch_array($get_class_names)) {
                                $get_class_name = $get_each_class['class_name'];
                                $get_class_view_name = $get_each_class['view_class_name'];
                             ?>

                            <option value="<?php  echo $get_class_name; ?>" <?php  if ($rs_upd['teacher_type_class'] == "<?php  echo $get_class_name; ?>") {
                                echo "selected";
                            }  ?>><?php   echo $get_class_view_name;  ?></option>


                            <?php    }  ?>

                        </select>
                    </div>
                </div>

                <?php   }else{   ?>

                <div class="form-group" id="class_teacher_show_hide" >
                    <label for="degree" class="control-label col-sm-3">Select Teacher Class:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="select_class_teacher" id="select_class_teacher">
                           <?php  

                            $get_class_names = mysqli_query($my_connection_string,"SELECT * FROM `class_holders`"); 
                            while ($get_each_class = mysqli_fetch_array($get_class_names)) {
                                $get_class_name = $get_each_class['class_name'];
                                $get_class_view_name = $get_each_class['view_class_name'];
                             ?>

                            <option value="<?php  echo $get_class_name; ?>" <?php  if ($rs_upd['teacher_type_class'] == "<?php  echo $get_class_name; ?>") {
                                echo "selected";
                            }  ?>><?php   echo $get_class_view_name;  ?></option>


                            <?php    }  ?>
                        </select>
                    </div>
                </div>
                <?php } ?>
                    <div class="form-group">
                        <label for="dob" class="control-label col-sm-3">Date of Birth :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker" name="dob" value="<?php echo $rs_upd['dob'];?>" data-date-format="yyyy-mm-dd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="addrtxt" class="control-label col-sm-3">Address:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="addrtxt" cols="8" rows="6" required><?php echo $rs_upd['address'];?></textarea>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="dob" class="control-label col-sm-3">Username:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" value="<?php echo $get_login['username'];?>" placeholder="username"/>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="dob" class="control-label col-sm-3">Password :</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" value="<?php echo $get_login['password'];?>" data-date-format="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn_upd" value="Update" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
                        <input type="reset" value="Cancel" class="btn btn-primary col-md-offset-3 col-sm-offset-3 col-xs-offset-3"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php   
}
else
{
?>
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Teacher Entry</h4>
        <a class="btn btn-primary right" href="?tag=view_teachers">Teacher View</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label for="fnametxt" class="control-label col-sm-3">First Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="fnametxt" name="fnametxt"  placeholder="First Name..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lnametxt" class="control-label col-sm-3">Last Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lnametxt" name="lnametxt"  placeholder="Last Name..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="marriedrdo" class="control-label col-sm-3">Married:</label>
                    <div class="radio col-sm-2">
                        <label><input type="radio" name="marriedrdo" value="yes" required>Yes</label>
                    </div>
                    <div class="radio col-sm-4">
                        <label><input type="radio" name="marriedrdo" value="no" required>No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phonetxt" class="control-label col-sm-3">Phone:</label>
                    <div class="col-sm-8">
                        <input type="number" data-minlength="10" data-error="Enter Valid 10 Digit Phone Number" class="form-control only-number" id="phonetxt" name="phonetxt"  placeholder="Contact No..." required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="degree" class="control-label col-sm-3">Qualification:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="degree">
                            <option value="Diploma">Diploma</option>
                            <option value="Degree">Degree</option>
                            <option value="Masters">Masters</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="emailtxt" class="control-label col-sm-3">Email:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="emailtxt" name="emailtxt"  placeholder="Email Address...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="emailtxt" class="control-label col-sm-3">Class Taught:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="class_taught">
                            <?php  

                            $get_class_names = mysqli_query($my_connection_string,"SELECT * FROM `school_full_class`"); 
                            while ($get_each_class = mysqli_fetch_array($get_class_names)) {
                                $get_class_name = $get_each_class['class_name'];
                                $get_class_view_name = $get_each_class['view_class_name'];
                             ?>

                            <option value="<?php  echo $get_class_name; ?>"><?php   echo $get_class_view_name;  ?></option>
                            <?php    }  ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="emailtxt" class="control-label col-sm-3">Subject Taught:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="subject_taught">
                            <?php  

                            $get_class_names = mysqli_query($my_connection_string,"SELECT * FROM `subjects_taught`"); 
                            while ($get_each_class = mysqli_fetch_array($get_class_names)) {
                                $get_subject_name = $get_each_class['subject_name'];
                                $get_subject_view_name = $get_each_class['view_subject_name'];
                             ?>

                            <option value="<?php  echo $get_subject_name; ?>"><?php   echo $get_subject_view_name;  ?></option>
                            <?php    }  ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="degree" class="control-label col-sm-3">Teacher Type:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="select_teacher_type" id="select_teacher_type">
                            <option value="subject_teacher">Subject Teacher</option>
                            <option value="class_teacher">Class Teacher</option>
                        </select>
                    </div>
                </div>

                 <div class="form-group" hidden  id="class_teacher_show_hide" >
                    <label for="degree" class="control-label col-sm-3">Select Teacher Class:</label>
                   <div class="col-sm-8">
                        <select class="form-control" name="select_class_teacher" id="select_class_teacher">
                           <?php  

                            $get_class_names = mysqli_query($my_connection_string,"SELECT * FROM `class_holders`"); 
                            while ($get_each_class = mysqli_fetch_array($get_class_names)) {
                                $get_class_name = $get_each_class['class_name'];
                                $get_class_view_name = $get_each_class['view_class_name'];
                             ?>

                            <option value="<?php  echo $get_class_name; ?>"><?php   echo $get_class_view_name;  ?></option>
                            <?php    }  ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dob" class="control-label col-sm-3">Date of Birth :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control datepicker" name="dob" data-date-format="yyyy-mm-dd" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="addrtxt" class="control-label col-sm-3">Address:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="addrtxt" cols="8" rows="6" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                        <label for="dob" class="control-label col-sm-3">Username:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" value="" placeholder="username" />
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="dob" class="control-label col-sm-3">Password :</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" value="" placeholder="password" />
                        </div>
                    </div>
                <div class="form-group">
                    <input type="submit" name="btn_sub" value="Register" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
                    <input type="reset" value="Cancel" class="btn btn-primary col-md-offset-3 col-sm-offset-3 col-xs-offset-3"/>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
}
?>
</body>
</html>