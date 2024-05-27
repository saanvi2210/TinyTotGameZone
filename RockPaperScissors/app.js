let userScore=0;
let compScore=0;
const choices= document.querySelectorAll(".choice");
const generateCompChoice=()=>{
    const choices=["rock","paper","scissors"];
    const index=Math.floor(Math.random()*3);
    return choices[index];
}
const clearChoice=()=>{
    document.getElementById("user_chosen").innerText="";
    document.getElementById("comp_chosen").innerText="";

}
const updateBoard=()=>{
    userScore=0;
    compScore=0;
    document.getElementById("user_score").innerHTML=userScore;
    document.getElementById("comp_score").innerHTML=compScore;
    choices.forEach((choice)=>{
        choice.disabled=true;
    })
}
const reverseBack=()=>{setTimeout(()=>{
        if(userScore==3||compScore==3){
            if(userScore==3){
                gamesWon=gamesWon+1;
                setTimeout(()=>{
                    window.location=`index.php?won=${gamesWon}`;
                    document.getElementById("scoreBox").remove();
                },2000);
            }
            checkEnd();
        }
        else{
            choices.forEach((choice)=>{
                choice.disabled=false;
            })
        document.getElementById("msg").innerHTML="Play your move";
        document.getElementById("msg").style.backgroundColor="rgb(8, 13, 81)";
        clearChoice();
        }
    },2000);
}
const matchDraw=()=>{
    console.log("there is a draw");
    document.getElementById("msg").innerHTML="There is a draw";
    document.getElementById("msg").style.backgroundColor="#0a96bd";
    reverseBack();
}
const showWinner=(userWin,userChoice,compChoice)=>{
    if(userWin){
        console.log("User won");
        userScore++;
        document.getElementById("user_score").innerHTML=userScore;
        document.getElementById("msg").innerHTML="The user won";
        document.getElementById("msg").style.backgroundColor="green";
        document.getElementById("user_chosen").style.color="green";
    document.getElementById("comp_chosen").style.color="red";

        
    }
    else{
        console.log("comp win");
        compScore++;
        document.getElementById("comp_score").innerHTML=compScore;
        document.getElementById("msg").innerHTML="The computer won";
        document.getElementById("msg").style.backgroundColor="red";
        document.getElementById("user_chosen").style.color="red";
        document.getElementById("comp_chosen").style.color="green";
        
    }
    document.getElementById("user_chosen").innerText=userChoice;
    document.getElementById("comp_chosen").innerText=compChoice;
    
    reverseBack();
}
const playGame= (userChoice)=>{
    const compChoice=generateCompChoice();
    console.log("UserChoice:",userChoice,"Computers choice",compChoice);
    if(userChoice==compChoice){
        matchDraw();
    }
    else{
        let userWin=true;
        if(userChoice=="rock"){
            userWin=compChoice=="scissors"? true: false;
        }else if(userChoice=="paper"){
            userWin=compChoice=="rock"?true:false;
        }else{
            userWin=compChoice=="paper"?true:false;
        }
        showWinner(userWin,userChoice,compChoice);
    }
    
}
const checkEnd=()=>{
    
        document.getElementById("msg").innerHTML="Thanks for playing";
        document.getElementById("msg").style.backgroundColor="#ff006e";
        updateBoard();
        document.getElementById("play_again").innerText="Play Again";
        document.getElementById("play_again").style.display="inline";
        document.getElementById("play_again").style.backgroundColor="purple";
        clearChoice();
}

choices.forEach((choice)=>{
        choice.addEventListener("click",()=>{
        const userChoice=choice.getAttribute("id");
        choices.forEach((choice)=>{
            choice.disabled=true;
        })
        playGame(userChoice);
    });
});
document.getElementById("play_again").addEventListener("click",()=>{
    reverseBack();
    updateBoard();
})
let icon=document.getElementById("icon");
icon.addEventListener('click',()=>{
    document.getElementById("scoreBox").style.visibility="visible";
    document.getElementById("scoreBox").addEventListener('click',()=>{
        document.getElementById("scoreBox").style.visibility="hidden";
    })

})
