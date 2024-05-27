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
$sql="SELECT * FROM `memory` WHERE `username`='$username'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result)==0) {
    $sql = "insert into memory(username) values('" . $_SESSION['username'] . "')";
    $result = mysqli_query($conn, $sql);
    $sql="SELECT * FROM `memory` WHERE `username`='$username'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $bestScore = $row["bestScore"];
}
else{
    $highScore=$row["bestScore"];
}
echo "<script> let bestScore=" . $highScore . ";</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemoryGame</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Match The <span>Images</span></h1>
    <section id="card-section"></section>
    <img src="../Images/scoreCard.png" alt="" id="icon">
        <div class="moves">
        <p>Moves used:</p><span id="moves">0</span></div>
        <div class="buttons">
        <button id="playAgain">Play Again</button>
        <a href="../gamePage.php" class="homePage">Home Page</a>
        </div>
    <script src="app.js"></script>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){

        if(isset($_GET["won"])) {
            $bestScore = $_GET["won"];
            $sql = "update `memory` set `bestScore`='$bestScore' where `username`='$username'";
            $result = mysqli_query($conn, $sql);
            echo "<script> bestScore=" . $bestScore . ";</script>";
            echo"<div id='scoreBox'>

                <p class='text'>Best Score :<div class='scores'>$bestScore</div></p>
             </div>";
        }
        else{
            echo "<div id='scoreBox' class='scoreBoxs'>

            <p class='text'>Best Score :<div class='scores'>$highScore</div></p>
        </div>";
        }
    }
    ?>
    </div>
</body>
</html>
