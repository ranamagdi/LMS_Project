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
    <title>Student page</title>

    

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
<div class="navbar3"></div>
<div class="navbar7"><h1>Submit the new assignments and check the feedback of the old assignments</h1></div>
<?php  if (isset($_SESSION['username'])) : ?>
<div class="navbar8"><h1>welcome <?php echo $_SESSION['username']; ?> to your page</h1></div>
<?php endif ?>
    <div class="navbar2">

    

    <nav >
        <ul>
            <li><a class="active" href="">Dashboard</a></li>
            <li><a href="check_new_ass.php">Check New Assignments</a></li>
            <li id="home"><a href="./Homes/Home_of_student.php">⌂ Home</a></li>
            <li id="logout"><a href="./login_signup/login.php"> logout</a></li>
            
            
            
        </ul>
    </nav>
</div>
<div class="navbar4">

    <div class="navbar5">
        <h1><a href="check_new_ass.php"> Check  Assignments</a></h1>
        
    </div>
    
</div> 

</body>
</html>