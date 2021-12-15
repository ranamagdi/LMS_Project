<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login_signup/login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../login_signup/login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher page</title>

    

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
     <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
            <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
            ?>
            </h3>
        </div>
        <?php endif ?>
   
<!-- header section starts  -->
<div class="navbar9"></div>
<?php  if (isset($_SESSION['username'])) : ?>
<div class="navbar10"><h1>welcome Dr.<?php echo $_SESSION['username']; ?> to your page</h1></div>
<?php endif ?>

    <div class="navbar2">

    

    <nav >
        <ul>
            <li><a class="active" href="">Dashboard</a></li>
            <li><a href="create_new_ass.php">Create New Assignment</a></li>
            <li><a href="assignment_submit.php">Students Submissions</a></li>
            <li id="home"><a href="./Homes/Home_of_teacher.php">⌂ Home</a></li>
            <li id="logout"><a href="./login_signup/login.php"> logout</a></li>
            
            
            
            
        </ul>
    </nav>
</div>

<div class="navbar11">
    <div class="navbar12">
        <h1><a href="create_new_ass.php"> Create New Assignment</a></h1>   
    </div>
     
   <div class="navbar6">
        <h1><a href="assignment_submit.php"> Check Student Submissions</a></h1>
    </div>
 </div>

</body>
</html>