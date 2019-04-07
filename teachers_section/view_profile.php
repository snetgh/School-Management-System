<?php
    $msg="";
    $opr="";
    $id="";
    if(isset($_GET['opr']))
    $opr=$_GET['opr'];
    
   // $id=$_GET['rs_id'];
    if(isset($_COOKIE['i']))
        $id = $_COOKIE['i'];


?>

<?php
    $sql_upd=mysqli_query($my_connection_string,"SELECT * FROM teacher_tbl WHERE teacher_id=$id");
    $rs_upd=mysqli_fetch_array($sql_upd);
?>
<div class="col-md-10 col-md-offset-1 form-style">
   
    <div class="col-md-10 col-md-offset-1 form-style">
            <form role="form" data-toggle="validator" method="post" class="form-horizontal">
                <div class="row">
                    <div class="form-group">
                        <label for="fnametxt" class="control-label col-sm-3">First Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $rs_upd['f_name'];?>" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lnametxt" class="control-label col-sm-3">Last Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $rs_upd['l_name'];?>" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="marriedrdo" class="control-label col-sm-3">Married:</label>
                    <div class="radio col-sm-2">
                        <label><input type="radio" name="marriedrdo" value="yes" <?php if($rs_upd['married']=="yes") echo "checked";?> disabled>Yes</label>
                    </div>
                    <div class="radio col-sm-4">
                        <label><input type="radio" name="marriedrdo" value="no" <?php if($rs_upd['married']=="no") echo "checked";?> disabled>No</label>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="phonetxt" class="control-label col-sm-3">Phone:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control only-number" data-error="Enter Valid 11 Digit Phone Number" id="phonetxt" name="phonetxt" value="<?php  echo $rs_upd['phone']; ?>" disabled>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="degree" class="control-label col-sm-3">Qualification:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="degree" disabled>
                            <option <?php if($rs_upd['degree']=="Diploma") echo "selected";?>>Diploma</option>
                            <option <?php if($rs_upd['degree']=="Degree") echo "selected";?>>Degree</option>
                            <option <?php if($rs_upd['degree']=="Masters") echo "selected";?>>Masters</option>
                        </select>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="emailtxt" class="control-label col-sm-3">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="emailtxt" name="emailtxt" value="<?php echo $rs_upd['email'];?>" disabled>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="emailtxt" class="control-label col-sm-3">Class Taught:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="classestxt" name="classtxt" value="<?php echo $rs_upd['classes'];?>" disabled>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="emailtxt" class="control-label col-sm-3">Subject Taught:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="classestxt" name="subjecttxt" value="<?php echo $rs_upd['subject_taught'];?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="control-label col-sm-3">Date of Birth :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker" name="dob" value="<?php echo $rs_upd['dob'];?>" data-date-format="yyyy-mm-dd" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="addrtxt" class="control-label col-sm-3">Address:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="addrtxt" cols="8" rows="6" disabled><?php echo $rs_upd['address'];?></textarea>
                        </div>
                    </div>
                   
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>