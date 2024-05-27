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
$sql="SELECT * FROM `rockpaper` WHERE `username`='$username'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result)==0) {
$sql = "insert into rockpaper(username) values('" . $_SESSION['username'] . "')";
$result = mysqli_query($conn, $sql);
$sql="SELECT * FROM `rockpaper` WHERE `username`='$username'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$gamesWon = $row["bestScore"];
}
else{
$gamesWon=$row["bestScore"];
}
echo "<script> let gamesWon=" . $gamesWon . ";</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock Paper Scissors</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Rock Paper Scissors Game</h1>
    <img src="../Images/scoreCard.png" alt="" id="icon">
    <div class="choices">
        <button class="choice" id="rock"><img src="images/rock.png" alt="" class="symbols"></button>
        <button class="choice" id="paper"><img src="images/paper.png" alt="" class="symbols"></button>
        <button class="choice" id="scissors"><img src="images/scissors.png" alt="" class="symbols"></button>
    </div>
    <div class="score-container">
        <div class="score">
            <p id="user_score">0</p>
            <p>You</p>
            <p id="user_chosen"></p>
        </div>
        <div class="score">
            <p id="comp_score">0</p>
            <p>Comp</p>
            <p id="comp_chosen"></p>
        </div>
    </div>
    <div class="msg_button">
        <button id="msg">Play your move</button>
    </div>
    <div id="play_again"></div>
    <a href="../gamePage.php" class="homePage">Home Page</a>
    <script src="app.js"></script>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){

        if(isset($_GET["won"])) {
            $bestScore = $_GET["won"];
            $sql = "update `rockpaper` set `bestScore`='$bestScore' where `username`='$username'";
            $result = mysqli_query($conn, $sql);
            echo "<script> let highScore=" . $gamesWon . ";</script>";
            echo"<div id='scoreBox'>

                <p class='text'>Games won :<div class='scores'>$bestScore</div></p>
             </div>";
        }
        else{
            echo "<div id='scoreBox' class='scoreBoxs'>

            <p class='text'>Games won :<div class='scores'>$gamesWon</div></p>
        </div>";
        }
    }
    ?>
</body>
</html>