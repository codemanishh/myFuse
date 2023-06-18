<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
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
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">

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
                    <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Post Drive</a></li>
                    <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> Current Drives</a></li>
                    <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Drive Applications</a></li>
                    <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                    <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                    <li class="active"><a href="resume-database.php"><i class="fa fa-user"></i> Scout Talents</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                  </ul>
                </div>
              </div>
            </div>
            <?php
              
              //while($row = $result->fetch_assoc()){
            ?> 
            <div class="col-md-9 bg-white padding-2" style="    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
              <h2><i>Talent Database</i></h2>
              <p>In this section you can download resume of all candidates who applied to your job posts</p>
              <div class="row margin-top-10">
                <div class="col-md-12">
                  <div class="box-body table-responsive no-padding">
                  <div class="container col-md-12">
                  <h3 class="margin-bottom-10">Apply Filters</h3>
                      <div class="row margin-top-10 margin-bottom-20 bg-white">
                        <form action="" method="post">
                            <div class="col-md-6">
                                <div class="form-group" style="width:75%;">
                                    <!-- <input class="form-control" type="text" id="collegeName" name="collegeName" placeholder="College Name"> -->
                                    <select class="form-control" type="text" id="collegeName" name="collegeName" placeholder="College Name">
                                    <option value='' selected="selected">Choose College Name</option>
                                      <?php
                                        $sql = "SELECT DISTINCT college FROM users";
                                        $result = $conn->query($sql);
                                        while($row = $result->fetch_assoc()){
                                          //echo "<option value='strtolower($row['college'])'>$row['college']</option>";
                                        echo "<option value=".$row['college'].">".$row['college']."</option>";
                                      } ?>
                                     <select> 
                                </div>
                                <?php //}
                                ?>
                                <div class="form-group" style="width:75%;">
                                    <input class="form-control" type="text" id="cgpa" name="cgpa" placeholder="Minimum Cgpa">
                                </div>
                              </div>
                            <div class="col-md-6">
                                <div class="form-group" style="width:75%;">
                                    <!-- <input class="form-control" type="text" id="gender" name="gender" placeholder="Gender"> -->
                                    <select class="form-control" type="text" id="gender" name="gender" placeholder="gender">
                                    <option value='' selected="selected">Choose Gender</option>
                                      <?php
                                        $genderoptions = array("Male", "Female", "Others");
                                        foreach($genderoptions as $value){
                                          //echo "<option value='strtolower($row['college'])'>$row['college']</option>";
                                        echo "<option value=".$value.">".$value."</option>";
                                      } ?> 
                                     <select> 
                                </div>
                                <div class="form-group" style="width:75%;">
                                    <!-- <input class="form-control" type="text" id="qualification" name="qualification" placeholder="Qualification"> -->
                                    <select class="form-control" type="text" id="qualification" name="qualification" placeholder="Qualification">
                                    <option value='' selected="selected">Choose Highest Qualification</option>
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
                                     <select> 
                                </div>
                            <div>
                            <input class="btn btn-flat btn-success" type="submit" name="submit" value="Update">
                        </form>
                  </div>
                </div>
                
                    <table id="example2" class="table table-hover">
                      <thead>
                        <th>Candidate</th>
                        <th>Qualification</th>
                        <th>Skills</th>
                        <th>Gender</th>
                        <th>College Name</th>
                        <th>CGPA</th>
                        <th>Resume</th>
                      </thead>
                      <tbody>
                          
                        <?php
                        $collegeName = '';
                        $cgpa = '';
                        $gender = '';
                        $qualification = '';

                       // $sql = "SELECT users.* FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  INNER JOIN users ON users.id_user=apply_job_post.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]' GROUP BY users.id_user";
                        $sql = "SELECT * from users";
                        $result = $conn->query($sql);
                        
                        //$dummy = $result;
                        //echo $result;
                        // if ($result->num_rows > 0) {
                        //   $arrayOfArray = array();
                        //   while($row1 = $result->fetch_assoc()){
                        //     array_push($arrayOfArray,$row1);
                        //   }
                         
                        if (isset($_POST['submit'])) {
                            $collegeName = $_POST['collegeName'];
                            $cgpa = $_POST['cgpa'];
                            $gender = $_POST['gender'];
                            $qualification = $_POST['qualification'];
                            echo $qualification;
                        }
                          while($row = $result->fetch_assoc()) 
                          {
                            if(($row['qualification']==$qualification || $qualification == '') &&
                               ($row['gender']==$gender || $gender == '') &&
                               ($row['ug']>=$cgpa || $cgpa == '') &&
                               ($row['college']==$collegeName || $collegeName== '')
                            ){
                        ?>
                            <tr>
                              <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                              <td>
                                <?php 
                                    echo $row['qualification']; ?>
                              </td>
                              <td>
                                <?php
                                $skills = $row['skills'];
                                $skills = explode(',', $skills);
                                foreach ($skills as $value) {
                                  echo ' <span class="label label-success">' . $value . '</span>';
                                }
                                ?>
                              </td>
                              <td><?php echo $row['gender']; ?></td>
                              <td><?php echo $row['college']; ?></td>
                              <td><?php echo $row['ug']; ?></td>
                              <td><a href="../uploads/resume/<?php echo $row['resume']; ?> " download="<?php echo $row['firstname'] . ' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                              
                                <?php 
                                $sql9 = "SELECT email_access FROM company WHERE id_company={$_SESSION['id_company']}";
                                $result9 = $conn->query($sql9);
                                $row9 = $result9->fetch_assoc(); 
                                if($row9['email_access'] == "Yes"){ 
                                  ?>
                                  <td>
                                <form  method="post" action="test-send-email.php" target="_blank">
                                  <input type="hidden" name = "id" value=<?php echo $row['id_user']?> > 
                                  <button type ="submit" class='btn btn-flat btn-primary'>Send mail<button>
                                 </form>
                              </td>
                              <?php } ?>
                            </tr>

                        <?php

                          }
                        }
                        
                        ?>

                      </tbody>
                    </table>
                  </div>
                </div>
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
  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>


  <script>
    $(function() {
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      });
    });
  </script>
</body>

</html>