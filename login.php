<?php
$usernameM="root";
$password="saanvi22";
$database="phpTutorials";
$host="localhost";
$error=false;
$signedup=false;
$missingUsername=false;
$missingPassword=false;
$conn=mysqli_connect($host, $usernameM, $password, $database);
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    if(isset($_POST["signin"]) &&($_POST["username"]) &&($_POST["password"])){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $sql="SELECT * FROM `details` WHERE `username`='$username' AND `password`='$password'";
        $result=mysqli_query($conn,$sql);


        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            $_SESSION['name']=$row['name'];
            $_SESSION['email']=$row['email'];
            $_SESSION['age']=$row['age'];
            $_SESSION['loggedIn']=true;
            header("location:gamePage.php");
        }
        else{
            $error=true;
            $_SESSION['loggedIn']=true;
        }

    }
    elseif(isset($_POST["signup"]) &&($_POST["username"]) &&($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $name=$_POST["name"];
        $age=$_POST["age"];
        $email=$_POST["email"];
        $sql = "insert into details (username,password,name,age,email)values('$username','$password','$name','$age','$email')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $signedup = true;
        } else {
            echo "some error occured";
        }
    }
    else{
        if(isset($_POST["signin"])){
        if (!$_POST["username"]) {
            $missingUsername = true;
        } else {
            $missingPassword = true;
            $username = $_POST["username"];
        }
    }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="outcontainer">
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="login.php" method="post">
            <h1>Create Account</h1>
            <input type="text" placeholder="Name" name="name" id="name"/>
            <input type="number" id="age" name="age" placeholder="Age">
            <input type="email" id="email" name="email" placeholder="E-mail">
            <input type="text" placeholder="Username" name="username" id="username"/>
            <input type="password" placeholder="Password" name="password" id="password" />
            <input type="hidden" value="true" name="signup">
            <button id="submitSignUp" type="button">Sign Up</button>
            <p id="message"></p>
            <script>
                let btn=document.getElementById('submitSignUp');
                let message=document.getElementById('message');
                btn.addEventListener('click',()=>{
                    let name=document.getElementById('name').value;
                    let username=document.getElementById('username').value;
                    let password=document.getElementById('password').value;
                    let age=document.getElementById('age').value;
                    let email=document.getElementById('email').value;
                    if(name){
                        if(username){
                            if(password){
                                btn.setAttribute("type","submit");
                            }
                            else{
                                message.innerText="Enter Password";
                            }

                        }
                        else{
                            message.innerText="Enter Username";
                        }
                    }
                    else{
                        message.innerText="Enter name";
                    }
                });
            </script>
            <?php
            if($signedup){
                echo "<script>alert('You signed up successfully');</script>";
            }?>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="login.php" method="post">
            <h1>Sign in</h1>
            <?php
            if(isset($username)){
                echo  "<input type='text' placeholder='Username' name='username' id='signinusername' value='".$username."'/>";
            }else
                {
                    echo  "<input type='text' placeholder='Username' name='username' id='signinusername' />";
                }
             ?>
            <input type="password" placeholder="Password" name="password" id="signinpassword" />
            <?php
            if($error){
                echo "<p class='error'>Wrong Username or Password</p>";
            }
            if($missingUsername){
                echo "<p class='error'>Enter Username</p>";
            }
            if($missingPassword){
                echo "<p class='error'>Enter Password</p>";
            }
            ?>
            <a href="#">Forgot your password?</a>
            <input type="hidden" name="signin" value="true">
            <button id="signinceck">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Player!</h1>
                <p>Enter your personal details and start playing.</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

</div>
<script src="login.js"></script>
</body>
</html>

