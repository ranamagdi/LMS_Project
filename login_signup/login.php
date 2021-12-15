
<?php include('../db/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_page</title>
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    
</head>
<body>
   	<header>
        <div class="card">
            <h1 id="welcome">Welcome To ASU learning managemnt system </h1>
            <h3>Login</h3>

        <form method="post" action="login.php">
  	    <?php include('../db/errors.php'); ?>

            <div class="form-group">
                <i class="fas fa-user"></i>
                <label for="name">Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <i class="fas fa-lock"></i>
                <label for="name">Password</label>
                <input type="password" name="password" required>
            </div>
            
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <label for="name">Login As</label>
               
                <select name="usertype" required >
                    <option >Teacher</option>
                    <option>student</option>
                </select>
            </div>

            <div class="form-group">
            <button class="btn" type="submit" name="login_user">Login</button>
            </div>
            

           
           <a href="signup.php"> Don't have an account? Sign Up</a>
           
         </form>

        </div>
    </header>
</body>
</html>