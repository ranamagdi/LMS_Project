<?php include('./db/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Assignemnt Form</title>   
   
    <link rel="stylesheet" href="./css/style.css">

  
</head>


<body>



<div class="navbar2">



<nav >
        <ul>
            <li><a  href="page_of_teacher.php">Dashboard</a></li>
            <li><a class="active" href="create_new_ass.php">Create New Assignment</a></li>
            <li><a href="assignment_submit.php">Students Submissions</a></li>
            <li id="home"><a href="./Homes/Home_of_teacher.php">⌂ Home</a></li>
            <li id="logout"><a href="./login_signup/login.php"> logout</a></li>
            
            
            
        </ul>
    </nav>
</div>
<div class = "card">
    <h1>Create new assignment</h1>
 
        	
        <form id="upload_instructor" method="post" action="create_new_ass.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for= "title">Title </label>
                <input type="text" id="title" name="title" placeholder="Assignment title " required />
             </div>
             <div class="form-group">
               
                <label  for= "description">Description </label>
                <textarea id="description"name="description" placeholder="Brief description " required rows="3"></textarea>
             </div>
             <div class="form-group_file">
                
                <label for= "file">File </label>
                <input id="file" type="file" id="file" name="file" placeholder="File " required />
             </div>
             <div class="form-group">
              
                <label for= "deadline">Deadline </label>
                <input type="date"  id="deadline" name="deadline" placeholder="deadline: " required />
             </div>
            <input type="submit" name="create" class="btn " value="create">
        </form>
    </div>

<script src="./js/upload_teacher.js"></script>

</body>
</html>



          

          
      