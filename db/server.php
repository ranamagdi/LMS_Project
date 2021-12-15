<?php

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
//session_start();
// connect to the database

$db = mysqli_connect('localhost', 'root', '', 'lms');

// REGISTER USER
if (isset($_POST['reg_user'])) {
   session_start();
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $usertype = mysqli_real_escape_string($db, $_POST['usertype']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($usertype)) { array_push($errors, "user type required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists

    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password,usertype) 
  			  VALUES('$username', '$email', '$password','$usertype')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['u_id'] = $u_id;

  	//$_SESSION['success'] = "You are now logged in";
  	header('location: ../login_signup/successful_signup.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  session_start();
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $usertype = mysqli_real_escape_string($db, $_POST['usertype']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (empty($usertype)) {
  	array_push($errors, "user type is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND usertype='$usertype'";
  	$results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $row = $results->fetch_array(MYSQLI_BOTH);
  	  $_SESSION['u_id'] = $row['u_id'];
      if($usertype=="student"){
        header('location: ../page_of_student.php ');
      }
      elseif($usertype=="Teacher"){
     
  	  header('location:../page_of_teacher.php ');
      }
    
  
  	else {
  		array_push($errors, "Wrong username/password combination");
  	}
    }
  }
}
//upload assignment by teacher
    if(isset($_POST['create'])){
        $fileName = $_FILES['file']['name'];
        $title = $_POST['title']; 
        $description = $_POST['description']; 
        $deadline = $_POST['deadline']; 
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "instructor_uploads/".$fileName;
      
        $query = "INSERT INTO assignments(title,description,file_name,deadline) VALUES ('".$title."','".$description."','".$fileName."','".$deadline."')"; 
        $run = mysqli_query($db,$query);
        
        if($run){
            move_uploaded_file($fileTmpName,$path);
            echo "success";
        }
        else{
            echo "error".mysqli_error($db);
        }
        
    }
     //upload assignment by student
        //upload assignment by student
   if(isset($_POST['submit_ass'])){
    session_start();
    $file_name = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $path = "student_uploads/".$file_name;
    $a_id = $_POST['id'];

    $query = $db->query("SELECT * FROM feedback WHERE a_id = '".$a_id."' AND u_id = '".$_SESSION['u_id']."' ");
    if($query->num_rows > 0)
    {
     $row = $query->fetch_assoc();  
     $query = "UPDATE feedback SET good = NULL, trial = trial+1 ,improve = NULL,grade= NULL, status ='submitted'  WHERE a_id = '".$a_id."' AND u_id = '".$_SESSION['u_id']."' ";
    }
    else
    {
         $query = "INSERT INTO feedback(u_id,a_id,file_name,status) VALUES ('".$_SESSION['u_id']."','".$a_id."','".$file_name."', 'submitted')"; 
    }

    $run = mysqli_query($db,$query);
    
    if($run){
        move_uploaded_file($fileTmpName,$path);
        echo "success";
    }
    else{
        echo "error".mysqli_error($db);
    }
    
} 
    //download assignment by student
    if(isset($_GET['file']))
{
    $filename = basename($_GET['file']);
    $filepath = 'instructor_uploads/' . $filename;
    if(!empty($filename) && file_exists($filepath)){

//Define Headers
        header("Cache-Control: public");
        header("Content-Description: FIle Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Emcoding: binary");

        readfile($filepath);
        exit;

    }
    else{
        echo "This File Does not exist.";
    }
}
  
//download assignment by teacher
    if(isset($_GET['file']))
{
    $filename = basename($_GET['file']);
    $filepath = 'student_uploads/' . $filename;
    if(!empty($filename) && file_exists($filepath)){

//Define Headers
        header("Cache-Control: public");
        header("Content-Description: FIle Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Emcoding: binary");

        readfile($filepath);
        exit;

    }
    else{
        echo "This File Does not exist.";
    }
}

    
   if(isset($_POST['Done'])){
    session_start();
        $good = $_POST['good']; 
        $improve = $_POST['improve']; 
        $grade = $_POST['grade']; 
        $a_id = $_POST['aid'];
        $u_id = $_POST['uid'];
        $query = "UPDATE feedback SET good = '".$good."', improve = '".$improve."',grade= '".$grade."', status ='reviewed' WHERE a_id = '".$a_id."' AND u_id = '".$u_id."' ";
      
        $run = mysqli_query($db,$query);
        
        if($run){
            echo "success";
        }
        else{
            echo "error".mysqli_error($db);
        }  
} 
  
  ?>
