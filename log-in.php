<?php

$conn = mysqli_connect('localhost','root','','school');
if(isset($_POST['submitform'])){

    $email = $_POST['emailid'];
    $password = $_POST['pass'];
    echo "HEllo";

    $query2 = "SELECT `EID` from `student`where`Email`='$email' and `Password` = '$password';";
    $run2 = mysqli_query($conn,$query2);
    $data = mysqli_fetch_assoc($run2);
    echo $data['EID'];
    if(mysqli_num_rows($run2)<1){
      echo "Incorect Password";
    }
    else{
      session_start();
      $_SESSION['user'] = $data['EID'];
      header('location: studentprofile.php');
    }

    
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
    <title>BookNote</title>
    <style>
      *{color:black;}
    .bg{
      background-image: url('Library/library.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      height: 100vh;
    }
    .form_container{
      border:1px solid white;
      padding: 50px 60px;
      margin: 20vh 0 0 0;
      box-shadow: -1px 4px 26px 11px rgba(0, 0,0,0.75)
    }
    </style>
</head>
<body>
  <div class="container-">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
        <h1>BookNote Share</h1>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        
          <form class="form_container" action="log-in.php" method="post">
              <h1 style="margin-bottom:7vh;">Login</h1>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="emailid">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div>
              <input type="submit" class="btn btn-sucess" style="background-color:#0033ff;width:20ch;height:50px;margin-top:5vh;margin-left:30ch;margin-bottom:-5px; " name="submitform">
            </form>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12"></div>

    </div>
  </div>
</body>
</html>