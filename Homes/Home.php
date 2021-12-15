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
                <li><a class="active" href="Home.php">home</a></li>
                <li><a href="../about/about.php">About us</a></li>
                
                <li><a href="../login_signup/login.php">Login</a></li>
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
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p> 
            <p> <a href="Home_of_student.php?logout='1'" style="color: red;">logout</a> </p>
        </div> 
        <?php endif ?>
        
</header>


<!-- header section ends -->

<section class="showcase">
      <h1>Welcome To The Ain Shams University learning managemnt system</h1>
      <p>This is our project for <b>CSE 487 E-learning Systems</b> Assignment submission feature in LMS. Instructors can upload assignments with description, file and deadline, they can view student submissions and add personalised feedback accordingly. As for students; they can view assignments, upload their work and receive feedback; if they have time before deadline they can always resubmit with improvment.</p>  
</section>





  <div style="clear:both"></div>
  <footer>
           <p> <i class="map"></i> Ahlam 17P6088 - Hager 17P1082 - Hana 17P6079</p>
            <p> <i class="map"></i> Nada 17P6081 - Rana 18P2022</p>
            <p> <i class="map"></i> </p>
            <p> <i class="email"></i> id@eng.asu.edu.eg </p>
            <p> <i class="phone"></i> (+20 2) 12345678</p>
  </footer>

</body>
</html>