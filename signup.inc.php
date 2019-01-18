<?php

  if (isset($_POST['signup-submit'])) //check signup in signup.php 
  {
    require 'dbh.inc.php'

    $username= $_POST['uid'];
    $email = $_POST['mail'];
    $password= $_POST['pwd'];
    $passwordRepeat= $_POST['pwd-repeat'];
    $RegistrationNo= $_POST['reg-no'];
    $Name = $_POST['name'];
    $Gender= $_POST['gen'];
    $date= $_POST['dob'];
    $phone=$_POST['ph'];
    $image=$_POST['img'];
    $Class=$_POST['cls'];
    $section=$_POST['sec'];

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($RegistrationNo) || empty($Name) || empty($Gender) || empty($date)  || empty($phone) || empty($image) || empty($Class) || empty($section)) 
    {
    	header("Location: ../signup.php?error=emptyfields&uid=" .$username. "&mail=" .$email);
    	exit();
    }
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL && !preg_match("/^[a-zA-Z0-9]*$/", $username)) 
{
	header("Location: ../signup.php?error=invalidmail&uid");
    	exit();
}

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	header("Location: ../signup.php?error=invalidmail&uid=" .$username);
    	exit();
    }
     elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    	header("Location: ../signup.php?error=invalidmail&uid=" .$email);
    	exit();
    }
    elseif (&password !== $passwordRepeat) {
    	header("Location: ../signup.php?error=passwordcheck&uid=".$username. "&mail=" .$email);
    	exit();
    }
    else
    {
    	$sql= "SELECT Registration_Number FROM student_profile WHERE Registration_Number=?";
    	$stmt = mysqli_stmt_init($conn);
    	if (!mysqli_stmt_prepare($stmt,$sql))
    	{
    		header("Location: ../signup.php?error=sqlerror");
    	exit();
    	}
    	else
    	{
    		mysqli_stmt_bind_param($stmt, "i", $RegistrationNo);
    		mysqli_stmt_execute($stmt);
    		mysqli_stmt_store_result($stmt);
    		$resultCheck = mysqli_stmt_num_rows($stmt);

    		if ($resultCheck>0) 
    		{
    			header("Location: ../signup.php?error=usertaken&mail=".$email);
    	        exit();
    		}
    		else
    	   {
    			$sql= "INSERT INTO student_profile(Roll no, Image, Registration_Number, Name, Username, Email_Address, Password, Class, Gender, DOB, Phone_Number) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    			$stmt = mysqli_stmt_init($conn);
    	if (!mysqli_stmt_prepare($stmt,$sql))
    	{
    		header("Location: ../signup.php?error=sqlerror");
    	exit();
    	}
    	else{
    		$hashedPwd= password_hash($password, PASSWORD_DEFAULT)
    		mysqli_stmt_bind_param($stmt, "ssssissiiis",  $username, $email, $hashedPwd, $RegistrationNo, $Name, $Gender, $date, $phone, $Class, $section);
    		  mysqli_stmt_execute($stmt);
    		  header("Location: ../signup.php?signup=success");
    	     exit();
    		
    	}

    		}
    	}
    }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  }

  else
  {
  	header("Location: ../signup.php");
    	exit();
  }