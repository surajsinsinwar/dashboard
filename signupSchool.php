
<?php
    $conn = mysqli_connect('localhost','root','','school');
    if(isset($_POST['submitform']))
    {
        $query2 = "SELECT * from `student` ORDER BY EID desc;";
        $run2 = mysqli_query($conn,$query2);
    $yr = date('y');
    if(mysqli_num_rows($run2)<1)
    {
        $lastID['EID']=0;
        $eid  = $yr*10+  +$lastID['EID']+1;
    }
    else
    {
        $lastID = mysqli_fetch_assoc($run2);
        $eid  = $lastID['EID']+1;
    }
    $name1 = $_POST['fname']." ".$_POST['lname'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $aadhaar = $_POST['aadhaar'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $email1 = $_POST['email'];
    $class = $_POST['class'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $image1 = $_FILES['image1']['name'];
    $image_t = $_FILES['image1']['tmp_name'];
    $img_name = $eid."_profile_image".$image1;
    move_uploaded_file($image_t,"image_signup/".$img_name);


    echo $name1.$father.$mother.$dob.$aadhaar.$email1.$mobile.$class.$address.$city.$district.$state.$pincode.$img_name;


    $query3 = "INSERT into 
    student (EID,Name,Father,Mother,DOB,Aadhaar,Email,Mobile,class,Address,City,District,State,Pincode,Photo) values ('$eid','$name1','$father','$mother','$dob','$aadhaar','$email1','$mobile','$class','$address','$city','$district','$state','$pincode','$img_name')";
    mysqli_query($conn,$query3);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Document</title>



    <style>
    .navbar{
        background-color:#916042;
    }
    input{
        outline:none;
    }
    #stu_form{
        display: none;
    }

    .nav-link{
        color: white;
    }

/* Css for Custom Input Radio box */
input[type=radio] {
  border: 1px solid #916042;
  padding: 0.5em;
  -webkit-appearance: none;
}

input[type=radio]:checked {
  background: url('image_signup/check.bmp') no-repeat center center;
  background-size: 11px 11px;
}

input[type=radio]:focus {
  outline-color: transparent;
}

/* css over end for custom checkbox */
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-sm navbar-inverse ">
                <a class="navbar-brand" href="#" style="color:yellow">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon">
                      <i class="fa fa-plus-square"></i>
                  </span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto text-primary">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">SignUp</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Reference</a>
                    </li>   
                        
                </ul>
                <ul class="nav navbar-nav navbar-right">
                        <li> <a href="#"> <span class="glyphicon glyphicon-user"> </span> Sign Up </a> </li>
                        <li> <a href="#"> <span class="glyphicon glyphicon-log-in"> </span> Login </a> </li>
                </ul>
                </div>
              </nav>

    <div class="container-fluid">
        <div id="question">
            <div class="row w-100 h-30" style="position:absolute;top:40%;">
                <div class="col-sm-2" style="marign: 5px 0 5px 0;">
                       
                </div>
                <div class="col-sm" style="marign: 5px 0 5px 0;">
                    <button class="btn py-3"style="background-color: #916042; width:80%;height:100%;font-size:20px;color:white">Teacher</button>
                </div>
                <div class="col-sm-1 " style="color:white;">
                        s
                    </div>
                <div class="col-sm" style="marign: 5px 0 5px 0;">
                    <button class="btn py-3"style="background-color: #916042;width:80%;height:100%;font-size:20px;color:white" onclick="show_studnet()" >Student</button>
                </div>
                <div class="col-sm-2" style="marign: 5px 0 5px 0;">
                   
                </div>
            </div>
        </div>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
       <div class="container my-5">
        <div id="stu_form" class="form-row px-3 py-2 rounded" style="border:1px solid lightgrey;">






        





















        <!-- Form input -->
                <form action="signupSchool.php" method="post" enctype="multipart/form-data">













                <div class="col-sm-1 col-md-2 col-lg-2 my-5 float-right">
                        <div class="card"style="height: 50%;">
                    <div class="content">
                       <input type="file" name="image1" id="file" class="inputfile" onchange="readURL(this);">
                        <label for="file"><img src="image_signup/fc32f922.png" id=tempimg width="100%"></label>
                        <style type="text/css">
                            .inputfile {
                                            width: 0.1px;
                                            height: 0.1px;
                                            opacity: 0;
                                            overflow: hidden;
                                            position: absolute;
                                            z-index: -1;
                                        }
                                        .inputfile + label {
                                            font-size: 1.25em;
                                            color: white;
                                            display: inline-block;
                                            border-radius: 5px;
                                            width:100%;
                                            text-align: center;
                                            margin-top: 10px;
                                            padding:5px 0 5px 0;
                                            cursor: pointer;
                                        }
                        </style>
                    </div>
                    
                </div>
                <div class="header">
                            <h5 class="title"><b>Upload Photo</b></h5>
                        </div>
                        </div>





            <div class="col-lg-9 col-md-9">
                    <div class="header">
                        <h4 class="title"><b>Add Student Profile</b></h4>
                    </div>
                    <div class="content">
                        
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input required type="text" name=fname class="form-control border-input" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input required type="text" name=lname class="form-control border-input" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Aadhaar Number</label>
                                        <input required type="text" name=aadhaar class="form-control border-input"
                                        maxlength="12" placeholder="Aadhar No.">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input required type="date" name="dob" class="form-control border-input">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Father's Name</label>
                                        <input required type="text" name="father" class="form-control border-input" placeholder="Father's Name">
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mother's Name</label>
                                        <input type="text" name="mother" class="form-control border-input" placeholder="Mother's Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select required=required name="class" class="form-control border-input">
                                            <option selected>Select Class</option>
                                            <option value="Nursery">Nursery</option>
                                            <option value="kg1">Kg1</option>
                                            <option value="kg2">Kg2</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control border-input" placeholder="Email Address" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input required type="text" name="mobile" class="form-control border-input" placeholder="Mobile Number" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control border-input" placeholder="Home Address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control border-input" placeholder="City" value="Waraseoni">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>District</label>
                                        <input type="text" name="district" class="form-control border-input" placeholder="District"
                                         value="Balaghat">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control border-input" placeholder="State" value="Madhya Pradesh">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Pin Code</label>
                                        <input type="number" name="pincode" class="form-control border-input" placeholder="ZIP Code" 
                                        value="481331">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" name="submitform" class="btn btn-info btn-fill btn-wd">Add Student</button>
                            </div>
                            <div class="clearfix"></div>

                </div>
            </div>


            <script type="text/javascript">
                                
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#tempimg').attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }</script>        
</form>



          </div>
          </div>
    </div>
    </div>












    

<!-- Javascript -->
<script>
    function show_studnet() {
    document.getElementById("stu_form").style.display = "block";
    document.getElementById("question").style.display = "none";

}
</script>
</body>
</html>