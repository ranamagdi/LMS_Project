<?php include('./db/server.php');
session_start();
if(isset($_GET['aid']))
{
    $a_id=$_GET['aid'];
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    div.ex1 {
  width: 1000px;
  margin: auto;
  font-family:    Arial, Helvetica, sans-serif;
  font-size:      16px;
  font-weight:    bold;
            }
}



</style>
<head>
<title>Check grades</title>   
   
    <link rel="stylesheet" href="./css/style.css">

<body>
<div class="navbar2">
<nav >
    <ul>
        <li><a  href="page_of_student.php">Dashboard</a></li>
        <li><a class="active" href="">View feedback</a></li>
     
        <li id="home"><a href="./Homes/Home_of_student.php">⌂ Home</a></li>
        <li id="logout"><a href="./login_signup/login.php"> logout</a></li>
        
        
        
    </ul>
</nav>
</div>
<div class = "card">

    <h1>Feedback </h1>
    
    <?php
    
 
   include('./db/server.php');
   $query = $db->query("SELECT  * FROM feedback where  a_id = '".$a_id."' AND u_id = '".$_SESSION['u_id']."' and status='reviewed' " );
   if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){       
       
?>
 
       
       
        <h2>Strength points</h2>
        <div class="ex1">
       <h3><?php echo  $row["good"]; ?></h3></div><br>
       <h2>Areas for improvment</h2>
       <div class="ex1">
       <h3><?php echo  $row["improve"]; ?></h3></div><br>
       <h2>Grade</h2>
       <div class="ex1">
       <h3><?php echo  $row["grade"]; ?>/10</h3><br>
       </div>
       
       
    <?php } ?>
    <?php }
    else{
        ?> <h2> if you submitted your assignment successfully, it is in queue, please wait for instructor to review it<h2>
        
        <?php } ?>
 
    
    
  

  


</div>