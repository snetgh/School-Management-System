  <?php
      include '_header.html';
      session_start();
      require("../conection/connect.php");
      $tag="";
      if (isset($_GET['tag']))
      $tag=$_GET['tag'];

       // $id=$_GET['rs_id'];
    if(isset($_COOKIE['i'])){
        $id = $_COOKIE['i'];
    }



    $query_get_teacher_details = mysqli_query($my_connection_string,"SELECT * FROM teacher_tbl WHERE teacher_id='$id' LIMIT 1");
    $get_each_detail = mysqli_fetch_array($query_get_teacher_details);
    $teacher_type = $get_each_detail['teacher_type'];


  ?>
  <div id="admin" class="col-md-10 col-md-offset-1">
  	<nav class="navbar navbar-inverse" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">School Managment System</a>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="?tag=home">Home</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> My Profile <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="index.php?tag=view_profile">View Profile</a>
                    </li>

                    <li>
                        <a href="index.php?tag=update_profile">Update Profile</a>
                    </li>
                </ul>

              </li>

               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Manage Student <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="index.php?tag=student_grades">Score Students</a>
                    </li>
                </ul>
                
              </li>
             
              <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Contact <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#">Contact Entry</a>
                    </li>
                    <li>
                        <a href="#">View Contact</a>
                    </li>
                </ul>
 -->              </li>
                <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Teacher <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li>
                      <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                  </li>
                  <li class="divider"></li>
                  <li>
                      <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                  </li>
              </ul>
          </li>
        </ul>
      

  <ul class="nav navbar-nav side-nav visible-lg visible-md visible-sm">
      <li>
          <a href="index.php?tag=view_profile">View Profile</a>
      </li>
      <?php  if($teacher_type == 'subject_teacher'){}else{ ?>
          <li>
           <a href="index.php?tag=student_grades">Student Assessment</a>
        </li>
         <li>
           <a href="index.php?tag=manage_class">Student Remarks</a>
        </li>
        <li>
       <a href="index.php?tag=promote">Promote Students</a>
        </li>

        <?php } ?>
      <li>
          <a href="index.php?tag=student_grades">Student Grades</a>
      </li>
      <li>
          <a href="../logout.php">Logout</a>
      </li>
        </ul>
</div>
</nav>
  <div id="wrapper">
    <div id="page-wrapper">
        <?php
              if($tag=="home" or $tag=="")
              include("../home.php");
            elseif($tag == 'view_profile')
              include("view_profile.php");
           elseif($tag == 'student_grades')
              include("student_grades.php");
          elseif($tag == 'update_results')
              include("update_result.php");
            elseif($tag == 'manage_class')
              include("manage_class.php");
              elseif($tag == 'promote')
              include("promote_stu.php");
              /*$tag= $_REQUEST['tag'];
              
              if(empty($tag)){
                include ("Students_Entry.php");
              }
              else{
                include $tag;
              }*/
                  
                        ?>
      </div> 
    </div>
    </div>  
  <?php include '_footer.php'; ?>