<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MyFuse</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

  <script src="../js/tinymce/tinymce.min.js"></script>

  <script>
    tinymce.init({
      selector: '#description',
      height: 300
    });
  </script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <?php

    include 'header.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3" style="    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="edit-company.php"><i class="fa fa-tv"></i> Update Profile</a></li>
                    <li class="active"><a href="create-job-post.php"><i class="fa fa-file-o"></i> Post Drive</a></li>
                    <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> Current Drives</a></li>
                    <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Drive Applications</a></li>
                    <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                    <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                    <li><a href="resume-database.php"><i class="fa fa-user"></i> Scout Talents</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2" style="    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
              <h2>Post a new Drive</h2>
              <div class="row">
                <form method="post" action="addpost.php">
                  <div class="col-md-12 latest-job ">
                    <div class="form-group">
                      <input class="form-control input-lg hidden" type="text" id="jobtitle" name="jobtitle" placeholder="Company Name" value=<?php echo $_SESSION['name'];?>>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description">About the Company</textarea>
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control  input-lg" id="minimumsalary" autocomplete="off" name="minimumsalary" placeholder="CTC *" required="">
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control  input-lg" id="maximumsalary" name="maximumsalary" placeholder="Minimum CGPA out of 10*" required="">
                    </div>
                    <div class="form-group">
                      <input class="form-control  input-lg" id="experience" autocomplete="off" name="experience" placeholder="Role *" required="">
                    </div>
                    <div class="form-group">
                      <!-- <input type="text" class="form-control  input-lg" id="qualification" name="qualification" placeholder="Qualification Required" required=""> -->
                      <input name="current_select_qualification_values" type="hidden" value="" id="current_select_qualification_values">
                      <select multiple='multiple' class="form-control input-lg" type="text" id="current_select_qualification" name="qualification[]">
                                    <!-- <option value='' selected="selected">Choose Highest Qualification</option> -->
                                      <?php
                                        $qualificationoptions = array("B.E",
                                        "B.Tech",
                                        "B.Arch",
                                        "B.Sc",
                                        "B.S.E",
                                        "B.Eng",
                                        "B.Eng",
                                        "B.Sc",
                                        "M.E",
                                        "M.TECH",
                                        "MCA",
                                        "Matriculation - X", "Intermediate - XII");
                                        
                                        foreach($qualificationoptions as $value){
                                          //echo "<option value='strtolower($row['college'])'>$row['college']</option>";
                                        echo "<option value=".$value.">".$value."</option>";
                                      } ?> 
                                     </select> 
                        
                    </div>
                    <div class="form-group">
                      <!-- <input type="text" class="form-control  input-lg" id="qualification" name="qualification" placeholder="Qualification Required" required=""> -->
                      <input name="current_select_stream_values" type="hidden" value="" id="current_select_stream_values">
                      <select multiple='multiple' class="form-control input-lg" type="text" id="current_select_stream" name="stream[]">
                                    <!-- <option value='' selected="selected">Choose Highest Qualification</option> -->
                                      <?php
                                        $qualificationoptions = array("CSE",
                                        "ISE",
                                        "ECE",
                                        "ME",
                                        "EEE",
                                        "CIVIL",
                                        "BioTe Technology"
                                        );
                                        
                                        foreach($qualificationoptions as $value){
                                          //echo "<option value='strtolower($row['college'])'>$row['college']</option>";
                                        echo "<option value=".$value.">".$value."</option>";
                                      } ?> 
                                     </select> 
                        
                    </div>


                    <!-- adding image to drive post  -->




                    <div class="form-group">
                      <button type="submit" class="btn btn-flat"  style="background:#0C134F; color:#D4ADFC;">Create</button>
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </section>



    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer" style="margin-left: 0px;">
      <div class="text-center">
      <strong>Copyright &copy; 2023 <a href=../assets/privacypolicy.html>MyFuse </a></strong> All rights reserved.
      </div>
    </footer>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>                                    
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
  <script>
//   $(document).ready(function() {       
// 	$('#qualification').multiselect({		
// 		nonSelectedText: 'Select Minimum Qualification'				
// 	});
// });
$(document).ready(function() {       
	$('#current_select_qualification').multiselect({		
		nonSelectedText: 'Select Minimum Qualification *'				
	});
});

$(function () {

 
 $('#current_select_qualification').multiselect({ 
 buttonText: function(options, select) {
 var labels = [];
 console.log(options);
 options.each(function() {
 labels.push($(this).val());
 });
 $("#current_select_qualification_values").val(labels.join(',') + '');
 return labels.join(', ') + '';
 //}
 }
 
 });
});

$(document).ready(function() {       
	$('#current_select_stream').multiselect({		
		nonSelectedText: 'Select Elligible Streams *'				
	});
});

$(function () {

 
 $('#current_select_stream').multiselect({ 
 buttonText: function(options, select) {
 var labels = [];
 console.log(options);
 options.each(function() {
 labels.push($(this).val());
 });
 $("#current_select_stream_values").val(labels.join(',') + '');
 return labels.join(', ') + '';
 //}
 }
 
 });
});
  </script>
</body>


</html>