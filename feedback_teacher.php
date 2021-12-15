<?php include('./db/server.php');
if(isset($_GET['aid']))
{
    $a_id=$_GET['aid'];
}
if(isset($_GET['uid']))
{
    $u_id=$_GET['uid'];
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add feedback</title>   
   
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="navbar2">

    

<nav >
    <ul>
        <li><a  href="page_of_teacher.php">Dashboard</a></li>
        <li><a href="create_new_ass.php">Create New Assignment</a></li>
        <li><a href="assignment_submit.php">Students Submissions</a></li>
        <li id="home"><a href="./Homes/Home_of_teacher.php">⌂ Home</a></li>
        <li id="logout"><a href="./login_signup/login.php"> logout</a></li>
        
        
        
    </ul>
</nav>
</div>
<div class = "card">
    <h1>Feedback </h1>
        	
         <form id="Feedback" method="post" action="feedback_teacher.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for= "good">what's good? </label><br>
                <textarea id="good"name="good" required rows="150" required cols="100"></textarea>
                <h5>Use motivational words as "keep it up" "great work".</h5> <br>
             </div>
             <div class="form-group">
                <label for= "improve">what needs to be improved? </label><br>
                <textarea id="improve"name="improve" required rows="150" required cols="100"></textarea>
                <h5>Remember Comments on assignments should never be negative & should indicate how to improve future performance. You can start with "With just few changes you can do much better"</h5> <br>
             </div>
             <label for="grade">grade (between 0 and 10):</label>
             <input type="number" id="grade" name="grade" min="0" max="10">
             <div class="form-group">
            <div class = "form-group">
            <input type="hidden" name="aid" value=<?php echo $a_id; ?>/>
            </div>
            <div class = "form-group">
            <input type="hidden" name="uid" value=<?php echo $u_id; ?>/>
            </div>

            <input type="submit" name="Done" class="btn " value="Done">
        </form>

    </div>

    <script src="./js/feedback.js"></script>

</body>
</html>



          

          
      