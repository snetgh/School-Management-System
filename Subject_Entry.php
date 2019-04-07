<?php

    



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. Build Bright University .::</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
              <div style="text-align: center">  <h2>Select Class To Print</h2></div> <br>
                <div class="form-group">
                    <label for="smesterText" class="control-label col-sm-3">Select Class To Print:</label>
                    <div class="col-sm-8">
                       <select class="form-control" name="class_name" id="btn_select_class">
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
                    <input type="submit" name="btn_print" value="Print" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2 btn-lg" id="btn_print" />
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>