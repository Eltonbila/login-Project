<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php

            include("php/config.php");
                if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $age = $_POST['age'];
                    $password = $_POST['password'];
               

                //verifica se o email e unico
                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email ='$email'");

                if(mysqli_num_rows($verify_query) != 0){
                    echo "<div class = 'message' >
                    
                            <p>This e-mail is used, Try another one Please!</p>
                         </div> <br>";
                    echo "<a href = 'javascript:self.history.back()' ><button class = 'btn'>Go Back</button>"; 
                
                }
                else{
                    mysqli_query($con, "INSERT INTO users (Username, Email, Age, Password) VALUE('$username','$email','$age','$password')") or die("Error Ocurred");
                    
                    echo "<div class = 'message' >
                    
                            <p>Registration successefully!</p>
                        </div> <br>";
                    echo "<a href = 'index.php' ><button class = 'btn'>Login Now</button>";
        
                    
                }
            
            }else{
        
        
        ?>

        
            <header>Sign up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="Username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                  
                </div>
                <div class="link">
                    Already a member? <a href="index.php">sign in</a>
                </div>
            </form>

        </div>

        <?php  } ?>

    </div>
</body>
</html>