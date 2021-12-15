<?php include('../db/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <title>Sign Up Form</title>
    
</head>
<body>
    
    <header>
        
        <div class="card">
            <h1 id="welcome">Welcome To ASU learning managemnt system </h1>
            <h3>Sign Up</h3>

            <form method="post" action="signup.php">
        	<?php include('../db/errors.php'); ?>

            <div class="form-group">
                <i class="fas fa-user"></i>
                <label for="name">Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>" required>
            </div>


            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <label for="name">Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="form-group">
                <i class="fas fa-lock"></i>
                <label for="name">Password</label>
                <input type="password" name="password_1" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <label for="name">Confirm Password</label>
                <input type="password" name="password_2" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <label for="name">Register As</label>
               
                <select name="usertype" required >
                    <option >Teacher</option>
                    <option>student</option>
                </select>
            </div>
            <button class="btn" type="submit" name="reg_user">Sign Up</button>
            <a href="login.php">Already have an account? Login</a> 
        
  </form>
</div>
    </header>
</body>
</html>