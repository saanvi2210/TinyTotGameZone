let boxes=document.querySelectorAll(".box");
let counter=0;
let turn=document.querySelector(".turn");
let message=document.querySelector(".msg");
let record=[[0,1,2],[3,4,5],[6,7,8],[0,3,6],[1,4,7],[2,5,8],[0,4,8],[2,4,6]];
let playButton=document.querySelector("#playAgain");
let play=false;
console.log(gamesWon);
playButton.addEventListener("click",()=>{
    counter=0;
    turn.innerText="";
    message.innerText="";
    message.style.display="none";
    boxes.forEach((box)=>{
    box.querySelector(".text").innerText="";
    box.style.backgroundColor="#bde0fe";
    box.classList.remove("enlarge");
        box.disabled=false;
})  ;
})
const resetBoard=(win)=>{
    message.style.display="block";
    if(win==1){
        message.innerText="There is a draw!!";
    }
    else{
        message.innerText=`Player ${win} Won!!`;
        if(win=='X'){
            gamesWon=gamesWon+1;
            setTimeout(()=>{
                window.location=`index.php?won=${gamesWon}`;
                document.getElementById("scoreBox").remove();

                },2000);

        }
    }
    boxes.forEach((box)=>{
        box.disabled=true;
    })
    turn.innerText="";
    document.querySelector("#playAgain").style.display="block";
}

const checkWin=()=>{
    let a=false;
    record.forEach((pattern)=>{
        if(a){
            return;
           }
        let pos1Elem=boxes[pattern[0]].querySelector(".text").innerText;
        let pos2Elem=boxes[pattern[1]].querySelector(".text").innerText;
        let pos3Elem=boxes[pattern[2]].querySelector(".text").innerText;
        console.log(pos1Elem);
        console.log(pos2Elem);
        console.log(pos3Elem);

        if(pos1Elem!=""&&pos2Elem!=""&&pos3Elem!=""){
            if(pos1Elem==pos2Elem && pos2Elem==pos3Elem){
                boxes[pattern[0]].classList.add("enlarge");
                boxes[pattern[1]].classList.add("enlarge");
                boxes[pattern[2]].classList.add("enlarge");
            resetBoard(pos1Elem);
            a=true;
            }
           } 
          
    });
    if(counter==8 && !a)
    resetBoard(1);
   
}
const addCross=(box)=>{
    box.querySelector(".text").innerText="X";
    box.style.backgroundColor="#e0aaff";
    turn.innerText="Player 0 turn!!";
    checkWin();
}
const addZero=(box)=>{
    box.querySelector(".text").innerText="0";
    box.style.backgroundColor="#b2fba5";
    turn.innerText="Player X turn!!";
    checkWin();
}
boxes.forEach((box)=>{
    box.addEventListener("click",()=>{
        if(counter%2==0)
        addCross(box);
        else
        addZero(box);
        counter++;
        console.log(counter);
        box.disabled=true;
    })
})
let icon=document.getElementById("icon");
icon.addEventListener('click',()=>{
    document.getElementById("scoreBox").style.visibility="visible";
    document.getElementById("scoreBox").addEventListener('click',()=>{
        document.getElementById("scoreBox").style.visibility="hidden";
    })

})



// Function to create the cookie

// $(document).ready(function () {
//
// });

