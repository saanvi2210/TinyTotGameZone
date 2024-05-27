let rows=3;
let cols=3;
let currTile;
let otherTile;//blankitle
let turn=0;
let order=0;
console.log(highScore);
let imgOrderCorr=[{src: "Images/slide1.jpg",index :"0-0"},{src: "Images/slide5.jpg",index :"0-1"},{src: "Images/slideb.jpg",index :"0-2"},{src: "Images/slide7.jpg",index :"1-0"},{src: "Images/slide9.jpg",index :"1-1"},{src: "Images/slide8.jpg",index :"1-2"},{src: "Images/slide3.jpg",index :"2-0"},{src: "Images/slide6.jpg",index :"2-1"},{src: "Images/4.jpg",index :"2-2"}];
let imgOrder=[{srcs: "Images/slide1.jpg",number:1},{srcs: "Images/slide5.jpg",number:2},{srcs: "Images/slide8.jpg",number:3},{srcs: "Images/slide7.jpg",number:4},{srcs: "Images/slideb.jpg",number:5},{srcs: "Images/slide9.jpg",number:6},{srcs: "Images/slide3.jpg",number:7},{srcs: "Images/slide6.jpg",number:8},{srcs: "Images/slide4.jpg",number:9}];
// "Images/slide1.jpg","Images/slide6.jpg","Images/slide5.jpg","Images/slide4.jpg","Images/slide7.jpg","Images/slideb.jpg","Images/slide3.jpg","Images/slide8.jpg","Images/slide9.jpg"

let board=document.querySelector(".board");
let winArray=[1,2,5,4,6,3,7,8,9];
let checkWin=((child)=>{
    console.log("hello");
    let matched=1;
    for(let i=0;i<child.length;i++){
        if(parseInt(child[i].dataset.n)!=winArray[i])
            matched=0;
        console.log(child[i].dataset.n);
        console.log(matched);
    }
    if(matched==1){
        let score=parseInt(highScore);
        if(score==0) {
            score = turn;
        }
        if(turn<score) {
            console.log("turn",turn)
            console.log("score",score);
            score = turn;
            console.log("high score");
        }
        console.log("get passed",score);
        setTimeout(()=>{
            window.location=`index.php?won=${score}`;
            let remove= document.querySelector(".scoreBoxs");
            remove.remove();
        },2000);
        document.getElementById("won").style.display="block";



    }
})
let dragStart=((event)=>{
    currTile=event.target;

})
let dragDrop=((event)=>{
    otherTile=event.target;
    turn++;
    document.getElementById("turn_no").innerText=turn;
//this refers to the image tile being dropped on
})
let dragEnd=(()=>{
    let child=board.childNodes;
    let currentRow=parseInt(currTile.id[0]);
    let currentCol=parseInt(currTile.id[2]);
    let otherRow=parseInt(otherTile.id[0]);
    let otherCol=parseInt(otherTile.id[2]);
    if(otherTile.id==blankId&&((currentRow==otherRow &&(currentCol==(otherCol+1)||currentCol==(otherCol-1)))||(currentCol==otherCol && (currentRow==(otherRow+1)||currentRow==(otherRow-1))))){
    let src1=currTile.src;
    let src2=otherTile.src;
    currTile.src=src2;
    otherTile.src=src1;
    blankId=currTile.id;
    console.log("BeforeSwapping");
    console.log(currTile.dataset.n);
    console.log(otherTile.dataset.n);
    let a=currTile.dataset.n;
    currTile.dataset.n=otherTile.dataset.n;
    otherTile.dataset.n=a;
    console.log("AfterSwapping");
    console.log(currTile.dataset.n);
    console.log(otherTile.dataset.n);
    }
    checkWin(child);
})
let dragEnter=((e)=>{
    e.preventDefault();
})
let dragLeave=(()=>{

})
let dragOver=((e)=>{
    e.preventDefault();
})
for(let i=0;i<rows;i++){
    for(let j=0;j<cols;j++){
        let tile=document.createElement('img');
        tile.classList.add('board_card');
        tile.src=imgOrder[order].srcs;
        tile.dataset.n=imgOrder[order].number;
        order++;
        tile.id=i.toString()+"-"+j.toString();
        //DRAG FUNCTIONALITY
        tile.addEventListener("dragstart",dragStart);//click an image to drag
        tile.addEventListener("dragover",dragOver);//moving image around while clicked
        tile.addEventListener("dragenter",dragEnter);//dragging image onot another one
        tile.addEventListener("dragleave",dragLeave);//dragged image leaving naother image
        tile.addEventListener("drop",dragDrop);//drag an image over other image and drop that image
        tile.addEventListener("dragend",dragEnd);//after drag drop swap the two tiles
        board.appendChild(tile);
    }
}
let blankId=document.getElementById("1-1").id;
let icon=document.getElementById("icon");
icon.addEventListener('click',()=>{
    document.getElementById("scoreBox").style.visibility="visible";
    document.getElementById("scoreBox").addEventListener('click',()=>{
        document.getElementById("scoreBox").style.visibility="hidden";
    })

})

