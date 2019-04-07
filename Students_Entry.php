<?php
    $id="";
    $opr="";
    if(isset($_GET['opr']))
    	$opr=$_GET['opr'];

    if(isset($_GET['rs_id']))
    	$id=$_GET['rs_id'];
    //--------------add data-----------------
    if(isset($_POST['btn_sub'])){
    	$f_name  = $_POST['fnametxt'];
    	$l_name  = $_POST['lnametxt'];
    	$gender  = $_POST['gender'];
        $phone   = $_POST['phonetxt'];
        $addr    = $_POST['addrtxt'];
        $dob     = $_POST['dob'];
        $mail    = $_POST['emailtxt'];
        $class   = $_POST['select_class']; 

        $sql_ins=mysqli_query($my_connection_string,"INSERT INTO `stu_tbl_2018` (`stu_id`, `f_name`, `l_name`, `gender`, `dob`, `address`, `phone`, `email`, `student_class`, `sub_english_grade`, `sub_english_exams`, `sub_english_total`, `sub_maths_grade`, `sub_maths_exams`, `sub_maths_total`, `sub_science_grade`, `sub_science_exams`, `sub_science_total`, `sub_social_grade`, `sub_social_exams`, `sub_social_total`, `sub_rme_grade`, `sub_rme_exams`, `sub_rme_total`, `sub_ict_grade`, `sub_ict_exams`, `sub_ict_total`, `sub_bdt_grade`, `sub_bdt_exams`, `sub_bdt_total`, `sub_gh_lang_grade`, `sub_gh_lang_exams`, `sub_gh_lang_total`, `english_grade`, `maths_grade`, `social_grade`, `science_grade`, `rme_grade`, `bdt_grade`, `ict_grade`, `gh_lang_grade`, `total`, `stu_conduct`, `stu_intrest`, `stu_attitude`, `teachers_remarks`,`attendance`,`promotion`) VALUES (NULL, '$f_name', '$l_name', '$gender', '$dob', '$addr', '$phone', '$mail', '$class', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '','','')");
        if($sql_ins==true) {
            $msg = ucfirst($f_name) ;
            echo "<div>"
                . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
                . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                . "</button>"
                . "<strong>Sucess!</strong> Student $msg record inserted"
                . "</div>"
                . "</div>";
        }
        else
            $msg="Insert Error:".mysqli_error();

        }
//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$addr=$_POST['addrtxt'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
    $class   = $_POST['select_class']; 
	
	$sql_update=mysqli_query($my_connection_string,"UPDATE `stu_tbl_2018` SET 
        `f_name` = '$f_name', 
        `l_name` = '$l_name', 
        `gender` = '$gender', 
        `dob` = '$dob', 
        `address` = '$addr', 
        `phone` = '$phone', 
        `email` = '$mail', 
        `student_class` = '$class' 
        WHERE 
        `stu_id` = '$id'");

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
	$sql_upd=mysqli_query($my_connection_string,"SELECT * FROM stu_tbl_2018 WHERE stu_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Students Update</h4>
        <a class="btn btn-primary right" href="?tag=view_students">Back</a>
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
                        <label for="gender" class="control-label col-sm-3">Gender:</label>
                        <div class="radio col-sm-2">
                            <label><input type="radio" name="gender" value="male" <?php if($rs_upd['gender']=="male") echo "checked";?>>Male</label>
                        </div>
                        <div class="radio col-sm-4">
                            <label><input type="radio" name="gender" value="female" <?php if($rs_upd['gender']=="female") echo "checked";?>>Female</label>
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
                    <label for="phonetxt" class="control-label col-sm-3">Class:</label>
                    <div class="col-sm-8">
                            <select class="form-control" name="select_class">
                            <?php  

                            $get_class_names = mysqli_query($my_connection_string,"SELECT * FROM `class_holders`"); 
                            while ($get_each_class = mysqli_fetch_array($get_class_names)) {
                                $get_class_name = $get_each_class['class_name'];
                                $get_view_name = $get_each_class['view_class_name'];
                             ?>

                            <option value="<?php  echo $get_class_name; ?>" <?php if ($rs_upd['student_class'] == "<?php  echo $get_class_name; ?>") {
                                echo "selected";
                            }else{echo "";}  ?>><?php echo $get_view_name; ?></option>

                            <?php    }  ?>
                           
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="emailtxt" class="control-label col-sm-3">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="emailtxt" name="emailtxt" value="<?php echo $rs_upd['email'];?>">
                        </div>
                    </div>
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
<!-- for form Register-->
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Student Entry</h4>
        <a class="btn btn-primary right" href="?tag=view_students">Students View</a>
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
                      <label for="gender" class="control-label col-sm-3">Gender:</label>
                      <div class="radio col-sm-2">
                        <label><input type="radio" name="gender" value="male" required>Male</label>
                      </div>
                      <div class="radio col-sm-4">
                         <label><input type="radio" name="gender" value="female" required>Female</label>
                      </div>
                </div>
                <div class="form-group">
                    <label for="phonetxt" class="control-label col-sm-3">Phone:</label>
                    <div class="col-sm-8">
                        <input type="number" data-minlength="10" class="form-control only-number" data-error="Enter Valid 10 Digit Phone Number" id="phonetxt" name="phonetxt"  placeholder="Phone..." >
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="phonetxt" class="control-label col-sm-3">Class:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="select_class">
                            <?php  

                            $get_class_names = mysqli_query($my_connection_string,"SELECT * FROM `class_holders`"); 
                            while ($get_each_class = mysqli_fetch_array($get_class_names)) {
                                $get_class_name = $get_each_class['class_name'];
                                $get_view_name = $get_each_class['view_class_name'];
                             ?>

                            <option value="<?php  echo $get_class_name; ?>"><?php echo $get_view_name; ?></option>

                            <?php    }  ?>
                           
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="emailtxt" class="control-label col-sm-3">Email:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="emailtxt" name="emailtxt"  placeholder="e.g: example@gmail.com" >
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