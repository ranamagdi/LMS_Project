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
    <title>Home page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
   
<!-- header section starts  -->
<header>
    <div id="menu" class="fas fa-bars"></div>
        <nav class="navbar">
            <ul>
                <li><a class="active" href="Home_of_teacher.php">home</a></li>
                <li><a href="../about/about_teacher.php">About us</a></li>
                
                <li><a href="../page_of_teacher.php">visit your page</a></li>
            </ul>

           

        </nav>

       
        <!-- notification message -->

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

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
        <div class="welcome_user">
            <p style="color: whitesmoke;"><strong>Welcome Dr.<?php echo $_SESSION['username']; ?></strong></p> 
            <p> <a href="Home_of_teacher.php?logout='1'" style="color: gold;"> <strong>logout</strong></a> </p>
        </div> 
        <?php endif ?>
        
</header>


<!-- header section ends -->

<section class="showcase">
      <h1>Welcome To The Ain Shams University learning managemnt system</h1>
      <p>As a teacher you can upload assignments with description, file and deadline, you can view student submissions and add personalised feedback including good points, what needs to improve and grade. Remember you are a facilitator and guide to all students enrolled.</p>  
</section>





  <div style="clear:both"></div>
  <footer>
           <h3>contact info</h3>
            <p> <i class="map"></i> Ahlam 17p6088 - Hager 17p1082 - Hana 17p6079</p>
            <p> <i class="map"></i> Nada 17p6081 - Rana 18p2022</p>
            <p> <i class="map"></i> </p>
            <p> <i class="email"></i> id@eng.asu.edu.eg </p>
            <p> <i class="phone"></i> (+20 2) 12345678</p>
  </footer>

</body>
</html>