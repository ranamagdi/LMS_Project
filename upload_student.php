<?php include('./db/server.php');
if(isset($_GET['aid']))
{
    $a_id=$_GET['aid'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Assignemnts</title>
    <link rel="stylesheet" href="./css/style.css">
   
</head>


<body>
<div class="navbar2">



<nav >
    <ul>
        <li><a  href="page_of_student.php">Dashboard</a></li>
        <li><a href="check_new_ass.php">Check New Assignments</a></li>
   
        <li id="home"><a href="./Homes/Home_of_student.php">⌂ Home</a></li>
        <li id="logout"><a href="./login_signup/login.php"> logout</a></li>
        
        
    </ul>
</nav>
</div>
<div class = "card">
<div class = "container">

    <h1>submit  assignment </h1>
    <div class="col-lg-6">
        <form id="upload_student"method="post" action="upload_student.php" enctype="multipart/form-data">
        
            <div class = "form-group">
                <label for= "file">File </label>
                <input type="file" class="form-control" id="file" name="file" placeholder="File " required />
            </div>
            <div class = "form-group">
                <input type="hidden" name="id" value=<?php echo $a_id; ?>/>
            </div>
            <input type="submit" name="submit_ass" class="btn " value="submit"  >
        </form>
    </div>
</div>
</div>
<script src="./js/upload_student.php"></script>
</body>
</html>

