<?php

// To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="../css/style.css">
    <title>MyFuse</title>
</head>

<body class="hold-transition skin-green sidebar-mini">
    
<div class="wrapper">
    <?php
    include 'header.php'
    ?>


    <div class="container" id="cv-form">
        <h1 class="text-center my-3">Resume Generator</h1>
        <div class="text-right ">


            <br>
            <br>


            <div class="row" style="box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
    padding: 21px;     font-size: 15px;    gap: 73px;">


                <div class="col md-6">
                    <h3>Personal Information</h3>
                    <div class="form-group">

                        <label for="namefield">Your Name</label>
                        <input type="text" id="nameField" placeholder=" Enter here" class=" form-control">

                    </div>
                    <div class="form-group mt-2">

                        <label for="contactfield">Your Contact</label>
                        <input type="text" id="contactField" placeholder=" Enter here" class=" form-control">

                    </div>
                    <div class="form-group mt-2">

                        <label for="addressfield">Your Address</label>
                        <textarea type="text" id="addressField" placeholder=" Enter here" class=" form-control" rows="5"></textarea>

                    </div>

                    <div class="form-group mt-3">
                        <label for="">Select Your Photo</label>
                        <input type="file" onchange="previewFile()" id="imageField" class="form-control">
                        <img id="img8" src="" height="200" alt="Image preview...">


                    </div>
                    <p class="text-secondary mt-2">Important Links</p>
                    <div class="form-group mt-2">

                        <label for="emailfield"><i class="fa fa-facebook" aria-hidden="true">Email</i></label>
                        <input type="text" id="emailField" placeholder=" Enter here" class=" form-control">

                        </di <div class="form-group mt-2">

                        <label for="fbfield"><i class="fa fa-facebook" aria-hidden="true">Facebook</i></label>
                        <input type="text" id="fbField" placeholder=" Enter here" class=" form-control">

                    </div>
                    <div class="form-group mt-2">

                        <label for="instafield"><i class="fa fa-instagram" aria-hidden="true">Instagram</i></label>
                        <input type="text" id="instaField" placeholder=" Enter here" class=" form-control">

                    </div>
                    <div class="form-group mt-2">

                        <label for="linkedField"><i class="fa fa-linkedin" aria-hidden="true">Linkedin</i></label>
                        <input type="text" id="linkedField" placeholder=" Enter here" class=" form-control">

                    </div>
                </div>
                <div class="col md-6">
                    <h3>Professional Information</h3>
                    <div class="form-group mt-2">

                        <label for="addressfield">Objective</label>
                        <textarea type="text" id="objectiveField" placeholder=" Enter here" rows="1" class=" form-control"></textarea>
                    </div>
                    <div class="form-group mt-2 " id="sF">

                        <label for="">Skills</label>
                        <textarea type="text" placeholder=" Enter here" rows="3" class=" form-control sField"></textarea>

                        <!-- new -textarea will be added here dynamically -->


                        <div class="container mt-2 text-center " id="sAddButton">
                            <button onclick="addNewSfield()" class="btn btn-primary btn-small">Add</button>
                        </div>
                    </div>
                    <div class="form-group mt-2 " id="we">

                        <label for="">Work Experience</label>
                        <textarea type="text" placeholder=" Enter here" rows="3" class=" form-control weField"></textarea>

                        <!-- new -textarea will be added here dynamically -->


                        <div class="container mt-2 text-center " id="weaddButton">
                            <button onclick="addNewWEfield()" class="btn btn-primary btn-small">Add</button>
                        </div>
                    </div>

                    <div class="form-group mt-2" id="eq">

                        <label for="">Academic Qualification</label>
                        <textarea type="text" placeholder=" Enter here" rows="3" class=" form-control eqfield"></textarea>

                        <div class="container mt-2 text-center " id="eqaddButton">
                            <button onclick="addNewEQfield()" class="btn btn-primary btn-small">Add</button>
                        </div>
                    </div>

                </div>


            </div>

            <div class="container text-center mt-3 mb-5">
                <button onclick="generateCV()" class=" btn btn-primary btn-lg">Generate CV</button>
            </div>
        </div>
    </div>

    <div class="container mb-4" id="cv-template">

        <div class="row">


            <div class="col-md-4 text-center py-5 background">
                <!-- first-col -->
                <img id="imgT" src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" class="img-fluid my-img" alt="">
                <div class="container">

                    <p id="nameT1"><strong>Narendra Kumar</strong></p>
                    <p id="contactT">8541122525</p>
                    <p id="addressT">City, India</p>
                    <hr />
                    <p><a id="emailT" href="#">Email</a></p>
                    <p><a id="fbT" href="#">www.facebook.com</a></p>
                    <p><a id="instaT" href="#">www.instagram.com</a></p>
                    <p><a id="linkedT" href="#">www.linkedin.com</a></p>
                </div>
            </div>

            <div class="col-md-8 py-5">
                <!-- second-col -->
                <h1 id="nameT2">Narendra Kumar</h1>

                <!-- Objective card  -->


                <div class="card mt-4">
                    <div class="card-header background">
                        <h4>Objective</h4>
                    </div>

                    <div class="card-body">
                        <p id="objectiveT">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, alias! Impedit
                            totam fugiat
                            accusamus maxime, hic earum alias molestiae! Numquam.</p>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header background">
                        <h4>Skills</h4>
                    </div>

                    <div class="card-body">

                        <ul id="sT">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, maiores!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, maiores!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, maiores!</li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header background">
                        <h4>Work Experience</h4>

                    </div>

                    <div class="card-body">
                        <ul id="weT">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, maiores!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, maiores!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, maiores!</li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header background">
                        <h4>Education Qualification</h4>
                    </div>

                    <div class="card-body">
                        <ul id="eqT">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, maiores!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, maiores!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, maiores!</li>
                        </ul>
                    </div>
                </div>


            </div>

            <div class="container mt-3 text-center">
                <button onclick="printCV()" class="btn btn-primary">Print CV</button>
            </div>


        </div>

    </div>
 <style>
    .form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    border-radius: 13px;
    padding: 10px;
}
 </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script src="../js/script.js"></script>
</body>

</html>