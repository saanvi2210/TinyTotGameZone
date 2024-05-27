let cardsArray=[
    {
        name:'Lion',
        image:'Images/lion.webp'
    },
    {
        name:'Elephant',
        image:'Images/elephant.jpg'
    },
    {
        name:'fox',
        image:'Images/fox.jpg'
    },
    {
        name:'owl',
        image:'Images/owl.jpg'
    },
    {
        name:'monkey',
        image:'Images/monkey.png'
    },
    {
        name:'giraffe',
        image:'Images/giraffe.jpg'
    },
];
let num=0;

let gameCard=cardsArray.concat(cardsArray);
let moves=document.getElementById("moves");
const parentDiv=document.querySelector("#card-section");
//Shuffling the game
let myNumbers=(gameCard)=>{
    for(let i=gameCard.length-1;i>0;i--){
        let j=Math.floor(Math.random()*(i+1));
        let temp=gameCard[i];
        gameCard[i]=gameCard[j];
        gameCard[j]=temp;
    };
    return gameCard;
}
const shuffledChild=myNumbers(gameCard);
let createGame=((shuffledChild)=>{
    console.log("hello");
    for(let i=0; i<shuffledChild.length;i++){
        let bigChildDiv=document.createElement('button');
        let childDiv=document.createElement('div');
        childDiv.classList.add('card');
        bigChildDiv.classList.add('bigCard');
        childDiv.dataset.name=shuffledChild[i].name;
        bigChildDiv.disabled=false;
        childDiv.style.backgroundImage=`url(${shuffledChild[i].image})`;
        bigChildDiv.appendChild(childDiv);
        parentDiv.appendChild(bigChildDiv);
    }
    return parentDiv;
})

let childArray=createGame(shuffledChild).childNodes;
console.log(childArray);
let count=0;
let firstCard="";
let secondCard="";
let matched=0;
let matchCount=0;
let matchCard=()=>{
    let cardSelected=document.querySelectorAll('.card_selected');
    cardSelected.forEach((card)=>{
        card.classList.add('card_matched');
        card.firstChild.style.display="none";
        card.classList.remove('card_selected');
        card.classList.remove('bigCard');
    })
    matchCount++;
    if(matchCount==6){
        document.getElementById("playAgain").style.display="block";
        if(num<bestScore) {
            bestScore = num;
        }
        setTimeout(()=>{
            window.location=`index.php?won=${bestScore}`;
            document.getElementById("scoreBox").remove();
        },2000);

    }
}
let unmatchedCard=()=>{
    let cardSelected=document.querySelectorAll('.card_selected');
    cardSelected.forEach((card)=>{
        card.classList.remove('card_selected');
        card.disabled=false;
        firstCard="";
         secondCard="";
         setTimeout(()=>{
            card.firstChild.style.display="none";
        },300)
        card.style.transform="none";
    })
}
let eventCreator=((childArray)=>{

    for(let i=0; i<childArray.length;i++){
        childArray[i].addEventListener('click',()=>{
            count++;
            num++;
            moves.innerText=num;
            childArray[i].style.transform="rotateY(180deg)";
            setTimeout(()=>{
                childArray[i].firstChild.style.display="block";
            },300)
            
            childArray[i].disabled=true;
            if(count<3){
                if(count==1){
                    matched=0;
                    firstCard=childArray[i].firstChild.dataset.name;
                }
                else
                secondCard=childArray[i].firstChild.dataset.name;
            childArray[i].classList.add('card_selected');
            if(firstCard!=""&& firstCard==secondCard){
                setTimeout(()=>{ matchCard();
                    count=0;
                    matched=1;},800);
               
            }
            else if(count==2 && matched==0){
                setTimeout(()=>{
                    unmatchedCard();
                count=0;
                },800);
                
            }
            console.log(childArray[i].classList);
            }
        })
    }
})
eventCreator(childArray);
let playButton=document.getElementById("playAgain");
playButton.addEventListener('click',()=>{
    const newShuffle=myNumbers(shuffledChild);
    childArray=createGame(newShuffle).childNodes;
    let n=childArray.length;
    for(let i=0;i<n/2;i++){
         childArray[0].remove();
     }
     count=0;
     firstCard="";
     secondCard="";
     matched=0;
     matchCount=0;
     num=0;
     moves.innerText=0;
     eventCreator(childArray);
});
let icon=document.getElementById("icon");
icon.addEventListener('click',()=>{
    document.getElementById("scoreBox").style.visibility="visible";
    document.getElementById("scoreBox").addEventListener('click',()=>{
        document.getElementById("scoreBox").style.visibility="hidden";
    })

})

