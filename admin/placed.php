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
                        <!-- <div class="col md-1"></div> -->
                        <div class="col-md-6">

                            <div class="col md-4">
                                <h3 style="text-align: center;">Placed Students list </h3>
                                <h3>Filters</h3>
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                                <!-- <button onclick="sortTable()">Sort</button> -->
                                <button type="submit1" name='export_excel_btn' style="margin-left: 8px;" class=" btn btn-primary">Export to Excel</button>

                                <button type="submit1" onclick="sortTable()" name='export_excel_btn' style="margin-left: 8px;" class="btn btn-success">Sort Data</button>
                            </div>



                            <div class="row margin-top-20">
                                <div class="col-md-12">
                                    <div class="box-body table-responsive no-padding">
                                        <table id="example2" class="table table-hover">
                                            <thead>
                                                <th>Student Name</th>
                                                <th>Student Email</th>
                                                <th>Company Name</th>
                                                <th>Role</th>
                                                <th>CTC</th>
                                                <th>Gender</th>



                                            </thead>
                                            <tbody>
                                                <?php
                                                // selecting student record via option 
                                                // fetching placed students from placed table &user table

                                                $sql = "select * from placed;";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {

                                                    while ($row = $result->fetch_assoc()) {


                                                ?>
                                                        <tr>
                                                            <td><?php echo $row['sname']; ?></td>
                                                            <td><?php echo $row['semail']; ?></td>
                                                            <td><?php echo $row['cname']; ?></td>
                                                            <td><?php echo $row['role']; ?></td>
                                                            <td><?php echo $row['ctc']; ?></td>
                                                            <td><?php echo $row['gender']; ?></td>

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
                        <div class="col md-6"></div>

                        <div class="col md-4">


                            <!-- yah par table ki id or function ki id sab alag dalni hai  -->


                            <h3 style="text-align: center;">Unplaced Students list </h3>
                            <h3>Filters</h3>
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                            <!-- <button onclick="sortTable()">Sort</button> -->
                            <button type="submit1" name='export_excel_btn' style="margin-left: 8px;" class=" btn btn-primary">Export to Excel</button>

                            <button type="submit1" onclick="sortTable()" name='export_excel_btn' style="margin-left: 8px;" class="btn btn-success">Sort Data</button>
                        </div>








                    </div>
                    <!-- <div class="col-md-2 ">



                    </div> -->
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

<!-- script to sort data  -->
<script>
    function sortTable() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("example2");
        switching = true;
        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Get the two elements you want to compare,
                one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[i + 1].getElementsByTagName("TD")[0];
                // Check if the two rows should switch place:
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
</script>

<!-- script for filtering table on the basis of company name  -->
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("example2");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            for (j = 0; j < 5; j++) {
                {
                    td = tr[i].getElementsByTagName("td")[j]; //1 row ke 1 column ki value hai yeh
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }
    }
</script>