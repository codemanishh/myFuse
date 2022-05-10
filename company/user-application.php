<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if (empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files  
require_once("../db.php");

$sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]' AND id_user='$_GET[id]'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Placement Portal</title>
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
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="edit-company.php"><i class="fa fa-tv"></i> Update Profile</a></li>
                    <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Post Drive</a></li>
                    <li class="active"><a href="my-job-post.php"><i class="fa fa-file-o"></i> Current Drives</a></li>
                    <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Drive Applications</a></li>
                    <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                    <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                    <li><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-9 bg-white padding-2">
              <div class="row margin-top-20">
                <div class="col-md-12">
                  <?php
                  $sql = "SELECT * FROM users WHERE id_user='$_GET[id]'";
                  $result = $conn->query($sql);

                  //If Job Post exists then display details of post
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                  ?>
                      <div class="pull-left">
                        <h2><b><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></b></h2>
                      </div>
                      <div class="pull-right">
                        <a href="job-applications.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                      <div>
                        <?php
                        echo 'Email: ' . $row['email'];
                        echo '<br>';
                        echo 'City: ' . $row['city'];
                        echo '<br>';
                        if ($row['resume'] != "") {
                          echo '<a href="../uploads/resume/' . $row['resume'] . '" class="btn btn-info" download="Resume">Download Resume</a>';
                        }
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        ?>
                        <div class="row">
                          <div class="col-md-3 pull-left">
                            <a href="under-review.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $_GET['id_jobpost']; ?>" class="btn btn-success">Mark Under Review</a>
                          </div>
                          <div class="col-md-3 pull-right">
                            <a href="reject.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $_GET['id_jobpost']; ?>" class="btn btn-danger">Reject Application</a>
                          </div>
                        </div>
                      </div>

                      <div>
                      </div>
                  <?php
                    }
                  }
                  ?>
                </div>

                <div class="col-md-9 bg-white padding-2">

                  <h3>Candidates Database</h3>
                  <div class="row margin-top-20">
                    <div class="col-md-12">
                      <div class="box-body table-responsive no-padding">
                        <table id="example2" class="table table-hover">
                          <thead>
                            <th>Candidate</th>
                            <th>Highest Qualification</th>
                            <th>Skills</th>
                            <th>City</th>
                            <th>State</th>

                          </thead>
                          <tbody>
                            <?php
                            $sql = "SELECT * FROM users";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {

                                $skills = $row['skills'];
                                $skills = explode(',', $skills);
                            ?>
                                <tr>
                                  <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                                  <td><?php echo $row['qualification']; ?></td>
                                  <td>
                                    <?php
                                    foreach ($skills as $value) {
                                      echo ' <span class="label label-success">' . $value . '</span>';
                                    }
                                    ?>
                                  </td>
                                  <td><?php echo $row['city']; ?></td>
                                  <td><?php echo $row['state']; ?></td>
                                  <?php if ($row['resume'] != '') { ?>

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
      </section>




    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer" style="margin-left: 0px;">
      <div class="text-center">
        <strong>Copyright &copy; 2022 <a href="scsit@Davv">Placement Portal</a>.</strong> All rights
        reserved.
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

</body>

</html>