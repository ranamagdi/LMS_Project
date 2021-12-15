<!DOCTYPE html>
<html lang="en">
<head>
<title>submissions of sutdents</title>   
   
    <link rel="stylesheet" href="./css/style.css">

<body>
<div class="navbar2">



<nav >
        <ul>
            <li><a  href="page_of_teacher.php">Dashboard</a></li>
            <li><a  href="create_new_ass.php">Create New Assignment</a></li>
            <li><a class="active" href="assignment_submit.php">Students Submissions</a></li>
            <li id="home"><a href="./Homes/Home_of_teacher.php">⌂ Home</a></li>
            <li id="logout"><a href="./login_signup/login.php"> logout</a></li>
            
            
            
        </ul>
    </nav>
</div>
<div class = "card">

    <h1> submissions of sutdents</h1>
    
    <?php
    // Include the database configuration file
    include './db/server.php';
    session_start();
    // Get records from the database
    $query = $db->query("SELECT * FROM feedback ORDER BY a_id ASC ");

    
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){ 
            $a = $row['a_id'];
            $u = $row['u_id'];
           
    ?>

    <table class="styled-table" >
       <thead>
         <tr>
                <th>assignment id</th>
                <th>user id</th>
                <th>submitted_file</th>
         </tr>
       </thead>
      <tbody>
   
        <tr>
                    
        <td><?php echo  $a; ?></div></td>
        <td><?php echo  $u; ?></div></td>
        <td><?php echo  $row["file_name"]; ?></div></td>
        <td> <a href="download.php?file=<?php echo $row['file_name']?>">Download</a></td>
        <td> <a href="feedback_teacher.php?aid=<?php echo $row['a_id'] ?> & uid=<?php echo $row['u_id'] ?> ">Add feedback</a></td>
  

        
        
       

        </tr> 
       
     </tbody> 
    </table>   

    <?php } ?>
    <?php } ?>

</div>