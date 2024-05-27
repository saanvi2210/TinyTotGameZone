<?php
session_start();
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true){
    header("location: login.php");
    exit();
}
else{
//    echo "Hello $_SESSION[username]!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleGame.css">
</head>
<body>
    <div class="container">
        <div class="fixContainer">
            <div class="navContainer">
                <img src="Images/gameTime2f.png" alt="" id="logo">
                <h1 id="alsoHide" class="hide">TinyTot GameZone</h1>
<!--            <h1>Mini Games</h1>-->
                <img src="Images/profile.jpg" alt="" class="profile">
            </div>

            <h2>   <h1 id="alsoHide" class="responseHide">TinyTot GameZone</h1></h2>
        </div>
        <div class="mainContainer">

    <div class="gameContainer">
        <div class="card">
            <img src="Images/ttt2.png" alt="TicTacToe" class="w">
            <b>TicTacToe</b>
            <p class="rules">Click here to know the rules</p>
            <a href="TicTacToe/index.php" class="startPlay">Start Playing</a>
        </div>
        <div class="card">
            <img src="Images/rpsf.png" alt="RockPaperScissors">
            <b>Rock Paper Scissors</b>
            <p class="rules">Click here to know the rules</p>
            <a href="RockPaperScissors/index.php" class="startPlay">Start Playing</a>
        </div>
        <div class="card">
            <img src="Images/animalsf.png" alt="Animals">
            <b>Memory Game</b>
            <p class="rules">Click here to know the rules</p>
            <a href="MemoryGame/index.php" class="startPlay">Start Playing</a>
        </div>
        <div class="card">
            <img src="Images/princessf.png" alt="Princess" class="w">
            <b>Slider Game</b>
            <p class="rules">Click here to know the rules</p>
            <a href="sliderGame/index.php" class="startPlay">Start Playing</a>
        </div>
    </div>
    </div>
    <div class="gameRule" id="rule1">
        <h1 class="gameName">Tic Tac Toe</h1>
        <span id="objective">Objective:</span>
        <p id="text">The objective of the game is to get three of your symbols (either "X" or "O") in a row, either horizontally, vertically, or diagonally.</p>
        <p id="prules">Rules for Tic Tac Toe:</p>
        <ol>
            <li>The game is played on a 3x3 grid. Each cell in the grid can be marked with an "X" or an "O". Players typically take turns marking the cells.</li>
            <li>The game is played by two players, usually referred to as "Player X" and "Player O". Player X traditionally goes first.</li>
            <li>Players take turns marking an empty cell with their respective symbol ("X" or "O"). Once a cell is marked, it cannot be changed.</li>
            <li>If a player successfully places three of their symbols in a row, they win the game. The game ends immediately, and that player is declared the winner.</li>
            <li>If all cells on the grid are filled, and neither player has achieved three in a row, the game ends in a draw. In this case, no player wins.</li>
        </ol>
        <div class="buttons">
            <a href="./TicTacToe/index.php" class="playGame">Start Playing</a><br>
            <button class="goBack">Go Back</button>
        </div>
        
    </div>
    <div class="gameRule" id="rule2">
        <h1 class="gameName">Rock Paper Scissors</h1>
        <span id="objective">Objective:</span>
        <p id="text"> The objective of the game is to defeat your opponent by selecting a gesture that defeats theirs, according to the rules.</p>
        <p id="prules">Rules for Rock Paper Scissors</p>
        <ol>
            <li>Rock: Form a fist with your hand---Paper: Extend your hand flat with fingers together---
                Scissors: Extend your index and middle fingers to form a V shape.</li>
            <li>Rock crushes scissors (rock wins)</li>
            <li>Scissors cuts paper (scissors win)</li>
            <li>Paper covers rock (paper wins)</li>
            <li>If both players choose the same gesture, the game is a tie, and it's usually played again.</li>
            <li>Players simultaneously reveal their chosen gesture by counting aloud or using a hand signal.
                If one player's gesture defeats the other, they win the round.</li>
        </ol>
        <div class="buttons">
            <a href="./RockPaperScissors/index.php" class="playGame">Start Playing</a><br>
            <button class="goBack">Go Back</button>
        </div>
    </div>
    <div class="gameRule" id="rule3"><h1 class="gameName">Memory Game</h1>
        <span id="objective">Objective:</span>
        <p id="text"> The objective of the game is to match pairs of cards by flipping them over two at a time.The game ends when all pairs have been matched.</p>
        <p id="prules">Rules for Memory Game:</p>
        <ol>
            <li>Players take turns flipping over any two cards of their choice.</li>
            <li>If the two cards match (i.e., they have the same symbol or image), the player keeps the pair and takes another turn.</li>
            <li>If the two cards do not match, they are flipped face-down again, and it becomes the next player's turn.</li>
            <li>As cards are flipped over, players need to remember the positions of the cards to make successful matches later in the game.</li>
            <li>Paying attention to the symbols or images on the cards is crucial for remembering where matching pairs are located.</li>
            <li>The game continues until all pairs have been matched.</li>
        </ol>
        <div class="buttons">
            <a href="./MemoryGame/index.php" class="playGame">Start Playing</a><br>
            <button class="goBack">Go Back</button>
        </div></div>
    <div class="gameRule" id="rule4">
        <h1 class="gameName">Slider Game</h1>
        <span id="objective">Objective:</span>
        <p id="text"> The objective of the game is to rearrange the tiles or pieces from their initial disordered state to a specific target configuration. Usually, this target configuration forms a complete picture or pattern.</p>
        <p id="prules">Rules for Slider Game:</p>
        <ol>
            <li>Tiles can only be moved horizontally or vertically into the empty space adjacent to them. Diagonal movements are not allowed.</li>
            <li>The puzzle starts with the tiles in a disordered state. Typically, this means the tiles are arranged in a random order, with one tile space left empty.</li>
            <li>Only one tile can be moved at a time, and only into the empty space adjacent to it. The player cannot move tiles through one another; they can only slide them into the empty space.</li>
            <li>The puzzle is considered solved when the tiles are rearranged into the target configuration. This often forms a complete picture or pattern.</li>
        </ol>
        <div class="buttons">
            <a href="./sliderGame/index.php" class="playGame">Start Playing</a><br>
            <button class="goBack">Go Back</button>
        </div>
        </div>
        <div id="profileBox">
            <div class="half">
                <?php echo"<h2 id='name'>$_SESSION[name]</h2>" ?>
                <div id="profileM"><img src="Images/profile.jpg" alt=""  class="profile"></div>
            </div>
            <div class="details">
            <table>
                <tr><td><h3>Username</h3></td>
                <td><?php echo"<p>: $_SESSION[username]</p>" ?></td></tr>
                <tr><td><h3>E-mail</h3></td>
                    <td><?php echo"<p>: $_SESSION[email]</p>" ?></td></tr>
                <tr><td><h3>Age</h3></td>
                    <td><?php echo"<p>: $_SESSION[age]</p>" ?></td></tr>

            </table>
                <a href="logout.php" class="logout">LogOut</a>
            </div>
        </div>
    <script src="gamePlay.js"></script>
</div>
</body>
</html>
