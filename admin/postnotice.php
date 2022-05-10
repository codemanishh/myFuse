<?php

//To Handle Session Variables on This Page


session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");



if (isset($_POST['submit'])) {

    // they take values using name attribute 
    $subject = $_POST['subject'];
    $notice = $_POST['input'];
    $audience = $_POST['audience'];




    $sql = "INSERT INTO notice(subject,notice,audience,`date`) VALUES ('$subject','$notice','$audience',now())";

    if ($conn->query($sql) === TRUE) {
        header("Location: postnotice.php");
        exit();
    }
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
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
    <?php

    include 'header.php';
    ?>



    <div class="row">
        <div class="col-xs-6">
            <section>
                <div class="alert alert-success alert-dismissible" style="display: none;" id="truemsg">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    New Notice Successfully added
                </div>

                <form class="centre " action="" method="POST">
                    <div>
                        <h4><strong> Post a new notice</strong></h4>
                    </div>
                    <div>

                        <input id="subject" placeholder="Subject" type="text" name="subject" style="margin:auto">
                    </div>
                    <br>
                    <div class="form-group mt-3">
                        <textarea style="top:80px " type="input" class="input" name="input" id="input" placeholder="Notice" required></textarea>
                    </div>

                    <div class="form-group text-center">
                        <label>Audience </label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true" class="input" name="audience">

                            <option value="All Students">All Students</option>
                            <option value="Co-ordinators">Co-ordinators</option>


                        </select>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-sm" id="submit" name="submit" type=" submit1">NOTIFY</button>

                    </div><br>
                    <div>
                    </div>


                </form>


        </div>
        </section>



        <div class="col-xs-5">


            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Posted Notice</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Notice</th>

                                <th>Audience</th>

                                <th>Date and Time</th>
                                <th>Delete</th>



                            </tr>
                        </thead>
                        <tbody>


                            <?php

                            $sql = "SELECT * FROM notice";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <td><?php echo $row['subject']; ?></td>
                                    <td><?php echo $row['notice']; ?></td>
                                    <td><?php echo $row['audience']; ?></td>
                                    <td><?php echo $row['date']; ?></td>

                                    <td><a id="delete" href="deletenotice.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a></td>
                                    </tr><?php

                                        }
                                    }

                                            ?>


                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </div>

    </div>


    <footer style="background-color:#021e36; color:aliceblue; padding: 12px" class="main-footer" style="margin-left: 0px;">
        <div class="text-center mb-0">
            <strong>Copyright &copy; 2022 <a>Placement Portal</a>.</strong> All rights
            reserved.
        </div>
    </footer>

</body>

</html>


<style>
    body {

        /* background-color: #bccde5;
         */
        background-color: white;
    }

    .centre {
        margin: 20px 30px 100px 20px;
        text-align: center;
        height: 450px;
        width: 700px;
        border: 2px solid black;
        border-radius: 10px;
        display: inline-grid;


    }

    #subject {

        width: 86%;


    }

    .input {

        height: 200px;
        width: 600px;
        border-radius: 5px;
        background-color: white;
        text-align: center;


    }

    .button {


        background-color: #3e79c8;

        /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 0px 10px 0px 10px;
    }

    @media screen and (max-width: 903px) {

        .input1 {
            width: 70%;
            height: 80%;
        }

        .centre {
            width: 100%;
            height: 80%;
        }
    }
</style>