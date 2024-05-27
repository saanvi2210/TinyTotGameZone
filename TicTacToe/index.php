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
$sql="SELECT * FROM `tictactoe` WHERE `username`='$username'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result)==0) {
    $sql = "insert into tictactoe(username) values('" . $_SESSION['username'] . "')";
    $result = mysqli_query($conn, $sql);
    $sql="SELECT * FROM `tictactoe` WHERE `username`='$username'";
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
    <title>Tic-Tac-Toe Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tic_Tac_Toe</h1>
        <img src="../Images/scoreCard.png" alt="" id="icon">
    
    <div class="container">
        <div class="game">
            <button class="box"><p class="text"></p></button>
            <button class="box"><p class="text"></p></button>
            <button class="box"><p class="text"></p></button>
            <button class="box"><p class="text"></p></button>
            <button class="box"><p class="text"></p></button>
            <button class="box"><p class="text"></p></button>
            <button class="box"><p class="text"></p></button>
            <button class="box"><p class="text"></p></button>
            <button class="box"><p class="text"></p></button>
            </div>
    </div>
    <div class="turn"></div>
    <div class="msg"></div>
    <div class="button"><button id="playAgain">Play Again</button></div>
    <a href="../gamePage.php" class="homePage">Home Page</a>

    </div>
    <script src="app.js"></script>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){

        if(isset($_GET["won"])) {
            $bestScore = $_GET["won"];
            $sql = "update `tictactoe` set `bestScore`='$bestScore' where `username`='$username'";
            $result = mysqli_query($conn, $sql);
            echo "<script> gamesWon=" . $bestScore . ";</script>";
            echo"<div id='scoreBox'>

                <p class='text'>Games won :<div class='score'>$bestScore</div></p>
             </div>";
        }
        else{
            echo "<div id='scoreBox' class='scoreBoxs'>

            <p class='text'>Games won :<div class='score'>$gamesWon</div></p>
        </div>";
        }
    }
    ?>
</body>
</html>
