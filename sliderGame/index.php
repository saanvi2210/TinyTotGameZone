<?php
session_start();
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true){
    header("location: ../gamePage.php");
    exit();
}
$usernameM="root";
$password="saanvi22";
$database="phpTutorials";
$host="localhost";
$username=$_SESSION['username'];
$conn=mysqli_connect($host, $usernameM, $password, $database);
$sql="SELECT * FROM `slider` WHERE `username`='$username'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==0) {
    $sql = "insert into slider(username) values('" . $_SESSION['username'] . "')";
    $result = mysqli_query($conn, $sql);
    $sql="SELECT * FROM `slider` WHERE `username`='$username'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $highScore = $row["bestScore"];
}
else {
    $highScore = $row["bestScore"];
}
echo "<script> let highScore=" . $highScore . ";</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<img src="../Images/scoreCard.png" alt="" id="icon">
    <div class="container">
    <div id="inContainer"><img src="Images/logof.png" alt="" id="logo">
    <h1>Turns:<span id="turn_no">0</span></h1>
    <h2 id="won">Congrats!! You did it.</h2>

        <?php
        if($_SERVER["REQUEST_METHOD"] == "GET"){

            if(isset($_GET["won"])) {
                $bestScore = $_GET["won"];
                $sql = "update `slider` set `bestScore`='$bestScore' where `username`='$username'";
                $result = mysqli_query($conn, $sql);
                echo "<script> highScore=" . $bestScore . ";</script>";
                echo"<div id='scoreBox'>

                <p>Best Score :<div class='score'>$bestScore</div></p>
             </div>";
            }
            else{
                echo "<div id='scoreBox' class='scoreBoxs'>

            <p>Best Score :<div class='score'>$highScore</div></p>
        </div>";
            }
        }
        ?>
    <a href="../gamePage.php" class="homePage">Home Page</a>
</div>
    
    <div class="board"></div>
</div>
<script src="app.js"></script>
</body>
</html>