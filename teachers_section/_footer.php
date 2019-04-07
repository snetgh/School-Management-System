<footer>
	<script src="../js/jquery-2.1.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/validator.js"></script>
	<script src="../js/application.js"></script>
	<script src="../js/jquery.tabledit.min.js"></script>
    <script src="../js/jquery-check-all.min.js"></script>

	<script type="text/javascript">

    $(document).ready(function() {

        <?php   

            $get_last_class_ini = mysqli_query($my_connection_string,"SELECT * FROM `class_holders` ORDER BY `id` DESC LIMIT 1");
            $get_last_class_item = mysqli_fetch_array($get_last_class_ini);

            $get_last_class_name = $get_last_class_item["class_name"];



        ?>

        <?php 
            $tag = $_GET['tag'];
            if($tag == 'student_grades'){
        ?>
            $("#students_table").Tabledit({
            url: "update_result.php",
            deleteButton:false,
            columns: {
                identifier: [0, 'id'],
                editable: [[3, 'student_grade'], [4, 'student_exam']]
            },
            restoreButton: false,
            onSuccess: function (data, textStatus, jqXHR) {
                console.log(data);
                console.log(textStatus);
                console.log(jqXHR);
                window.location.reload();
              
                },
            onFail: function(data, textStatus, errorThrown){
                console.log(data);
                console.log(textStatus);
                console.log(errorThrown);
                window.location.reload();
            }                
            });

        <?php  }elseif ($tag == "manage_class") {   ?>

        $("#manage_class_table").Tabledit({
            url: "manage_class_students.php",
            deleteButton:false,
            columns: {
                identifier: [0, 'id'],
                editable: [[2, 'stu_attitude','{"Satisfactory":"Satisfactory","Lazy":"Lazy","Troublesome":"Troublesome","Respectful":"Respectful"}'], [3, 'stu_conduct','{"Calm":"Calm","Well-Behaved":"Well-Behaved","Quite":"Quite","Noisy":"Noisy"}'],[4, 'stu_interest','{"Arts":"Arts","Reading":"Reading","Soccer":"Soccer"}'],[5, 'teachers_remarks','{"Exellent performance,Keep it up":"Exellent performance,Keep it up","More_Room_For_Improvement":"More Room For Improvement","Can Do Better":"Can Do Better","Should Be Assisted At Home":"Should Be Assisted At Home"}'],[6,'student_attendance'],[7,'student_promotion','{"":"",<?php   $get_class_query = mysqli_query($my_connection_string,"SELECT * FROM `class_holders`"); while ($get_classes = mysqli_fetch_array($get_class_query)) {
                    $get_class_names = $get_classes["class_name"];
                    $view_class_names = $get_classes["view_class_name"];
                    if($get_class_names != $get_last_class_name){
                       echo "\"$get_class_names\":\"$view_class_names\","; 
                    }else{
                       echo "\"$get_class_names\":\"$view_class_names\"";  
                    }
                    
                    # code...
                }    ?>}']]
            },
            restoreButton: false,
            onSuccess: function (data, textStatus, jqXHR) {
               	console.log(data);
               	console.log(textStatus);
               	console.log(jqXHR);
                window.location.reload();
              
                },
            onFail: function(data, textStatus, errorThrown){
               	console.log(data);
               	console.log(textStatus);
               	console.log(errorThrown);
                window.location.reload();
            }                
            });

        <?php    }else{};    ?>

        
        $(".tabledit-save-button").on('click',function(){
          var space_grade = $("input[name='student_grade']").val();
          var space_exam =  $("input[name='student_exam']").val();

          if(space_grade > 50 || space_exam > 50){alert("Please Choose A Value Below 51"); window.location.reload() }
        });


        $('#check-all').checkAll();

        });
  


</script>
</footer>
</body>
</html>