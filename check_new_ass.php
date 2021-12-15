<!DOCTYPE html>
<html lang="en">
<head>
<title>Check New Assignemnt Form</title>   
   
    <link rel="stylesheet" href="./css/style.css">

<body>
<div class="navbar2">

    

<nav >
    <ul>
        <li><a  href="page_of_student.php">Dashboard</a></li>
        <li><a class="active" href="">Check New Assignments</a></li>
     
        <li id="home"><a href="./Homes/Home_of_student.php">⌂ Home</a></li>
        <li id="logout"><a href="./login_signup/login.php"> logout</a></li>
        
        
        
    </ul>
</nav>
</div>
<div class = "card">

    <h1>Previous Assignments</h1>
    
    <?php
    // Include the database configuration file
    include './db/server.php';
    session_start();
    // Get records from the database
    $query = $db->query("SELECT * FROM assignments ORDER BY a_id ASC ");
    
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){ 
            $assigment_title = $row['a_id'];
           
    ?>

    <table class="styled-table" >
       <thead>
         <tr>
                
                <th>title</th>
                <th>description</th>
                <th>deadline</th>
                <th>assignment id</th>
                <th>file</th>
         </tr>
       </thead> 
      <tbody>
   
        <tr>
        <td><?php echo  $row["title"]; ?></div></td>
        <td><?php echo  $row["description"]; ?></div></td> 
        <td><?php echo  $row["deadline"]; ?></div></td>
        <td><?php echo  $row["a_id"]; ?></div></td>    
        <td><?php echo  $row["file_name"]; ?></div></td>
        <td> <a href="download.php?file=<?php echo $row['file_name']?>">Download</a></td>  
        
        <?php
         $today = date("Y-m-d");
         $expire = $row["deadline"]; //from database

         $today_time = strtotime($today);
         $expire_time = strtotime($expire);
        if ($expire_time < $today_time) {

        
         ?>
           <td> <a >can not submit assignment</a></td> 
       
        <?php }
        else{
            ?>  <td> <a id='time' href="upload_student.php?aid=<?php echo $row['a_id']; ?> ">submit assignment</a></td> 
                <td> <a href="chek_grades.php?aid=<?php echo $row['a_id']; ?> ">view feedback</a></td>  
        
        <?php } ?>

        </tr> 
       
     </tbody> 
    </table>   

    <?php } ?>
    <?php } ?>

</div>