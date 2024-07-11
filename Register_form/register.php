
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
    <style>
        .message {
            text-align: center;
            background: #f9eded;
            padding: 15px 0px;
            border: 1px solid #699053;
            border-radius: 5px;
            margin-bottom: 10px;
            color: red;
        }
        .message1{
            text-align: center;
            background: #f9eded;
            padding: 15px 0px;
            border: 1px solid #699053;
            border-radius: 5px;
            margin-bottom: 10px;
            color: rgb(14, 207, 107);
        }
    </style>

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

            //verifying the unique email

            $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
            if(mysqli_num_rows($verify_query) !=0){
                echo "<div class='message'>
                        <p>This email is used, Try another One please!</p> 
                        </div> <br>";

                echo "<a href='javascript:self.history.back()'><button class='btn'>Go back</button>";
            }

            else{

                mysqli_query($con, "INSERT INTO users(Username,Email,Age,Password) VAlUES('$username', '$email', '$age', '$password')") or die("Error Occured");
                echo "<div class='message1'>
                        <p>Registration Successfully!<p>
                        </div> <br>";

                echo "<a href='index.php'><button class='btn'>Login Now</button>";
            }
        }
        else{
        ?>
            <header>Sign up</header>
            <form method="post" action="">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" autocomplete="off" id="username" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member <a href="index.php">Sing in</a>
                </div>
            </form>
        </div>
            <?php } ?>
    </div>
</body>
</html>