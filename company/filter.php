<?php
    require_once("../db.php");
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<div class="container">
          <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
                        <form action="" method="post">
                            <div class="col-md-6 latest-job ">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="collegename" name="collegename" placeholder="College Name">
                                </div>
                                <div class="form-group">
                                    
                                    <input class="form-control" type="text" id="cgpa" name="cgpa" placeholder="cgpa">
                                </div>
                            </div>
                            <div class="col-md-6 latest-job ">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="gender" name="gender" placeholder="Gender">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" id="qualification" name="qualification" placeholder="Qualification">
                                </div>
                            <div>
                            
                        
                            <input type="submit" name="submit" value="Update">
                        </form>
            </div>
</div>

                        <?php


                            // $sql = "SELECT users.* FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  INNER JOIN users ON users.id_user=apply_job_post.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]' GROUP BY users.id_user";
                            $sql = "SELECT * from users";
                            $result = $conn->query($sql);
                            
                            $collegeName = '';
                            $cgpa = '';
                            $gender = '';
                            $qualification = '';
                            if (isset($_POST['submit'])) {
                                $collegeName = $_POST['collegeName'];
                                $cgpa = $_POST['cgpa'];
                                $gender = $_POST['gender'];
                                $qualification = $_POST['qualification'];
                                echo $qualification;
                            }
                            while($row = $result->fetch_assoc()) 
                            {
                                if($row['qualification']==$qualification || $qualification == '' &&
                                    $row['qualification']==$qualification || $qualification == '' &&    
                                    $row['qualification']==$qualification || $qualification == '' &&
                                    $row['qualification']==$qualification || $qualification == ''){
                                    $skills = $row['skills'];
                                    $skills = explode(',', $skills);
                            ?>
                                <tr>
                                <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                                <td><?php echo $row['qualification']; ?></td>
                              
                        ?>
                        
                            
                             <!-- <tr>
                              <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                              <td>
                                <?php 
                                  if($qualification == $row['qualification']){
                                    echo $row['qualification']; }?>
                              </td>
                              <td>
                                
                              </td>
                              <td><?php echo $row['city']; ?></td>
                              <td><?php echo $row['state']; ?></td>
                              <td><a href="../uploads/resume/<?php echo $row['resume']; ?> " download="<?php echo $row['firstname'] . ' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                            </tr>
                             -->
                        <?php    
                        } 
                    }
                        ?>
                         

</body>
</html>
