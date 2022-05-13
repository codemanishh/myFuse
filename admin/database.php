<?php

session_start();

if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}

require_once("../db.php");
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
                        <div class="col-md-2 ">



                        </div>
                        <div class="col-md-8">
                            <h3 style="text-align: center;"> Student applications for various companies</h3>
                            <?php

                            $sql1 = "SELECT distinct jobtitle FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  INNER JOIN users ON users.id_user=apply_job_post.id_user WHERE apply_job_post.id_company=2";

                            $result1 = $conn->query($sql1);
                            ?>
                            <form method="POST">
                                <div class="form-group text-center option">
                                    <!-- <label>Select Company </label> -->
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true" class="input" name="company">
                                        <option value="" selected>Select Company</option>
                                        <?php
                                        if ($result1->num_rows > 0) {
                                            while ($row1 = $result1->fetch_assoc()) {


                                        ?>
                                                <option class="option1" name="option1" id="option1" value="<?php echo $row1['jobtitle']; ?>"><?php echo $row1['jobtitle']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input name="submit" type="submit" value="submit">

                                </div>

                            </form>

                            <?php

                            if (isset($_POST['submit'])) {


                                $option = mysqli_real_escape_string($conn, $_POST['company']);

                                // echo $_SESSION['option'];

                            ?>
                                <h3>Drive Applications</h3>
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
                                                    <th>HSC</th>
                                                    <th>SSC</th>
                                                    <th>UG</th>
                                                    <th>PG</th>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // selecting student record via option 

                                                    $sql2 = "select id_jobpost from job_post where jobtitle = '$option'";
                                                    $result2 = $conn->query($sql2);

                                                    if ($result2->num_rows > 0) {
                                                        while ($row2 = $result2->fetch_assoc()) {
                                                            $jobid = $row2['id_jobpost'];



                                                            $sql = "select * from users inner join apply_job_post on users.id_user = apply_job_post.id_user where id_jobpost = '$jobid' ";
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

                                                                        <td><?php echo $row['hsc']; ?></td>
                                                                        <td><?php echo $row['ssc']; ?></td>
                                                                        <td><?php echo $row['ug']; ?></td>
                                                                        <td><?php echo $row['pg']; ?></td>


                                                                    </tr>


                                                <?php

                                                                }
                                                            }
                                                        }
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
                    <div class="col-md-2 ">



                    </div>
                </div>
        </div>
        </section>



    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer" style="margin:auto;bottom: 0;
  width: 100%;
  height: 50px; position:absolute; background-color:#1f0a0a; color:white">
        <div class="text-center">
            <strong>Copyright &copy; 2022 Placement Portal</strong> All rights
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
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>
</body>

</html>