let clickRule= document.querySelectorAll('.rules');
console.log(clickRule);
let cards=document.querySelectorAll('.card');
for(let i=0;i<clickRule.length;i++){
    clickRule[i].addEventListener('click',()=>{
        let ids="rule"+(i+1).toString();
        document.getElementById("alsoHide").style.display="none";
        document.getElementById(ids).style.display="block";
        document.querySelector('.fixContainer').style.display="none";
        cards.forEach((card)=>{
            card.style.display="none";
        })
    })
}
let goback=document.querySelectorAll('.goBack');
for(let i=0;i<goback.length;i++){
    goback[i].addEventListener('click',()=>{
        let ids="rule"+(i+1).toString();
        document.getElementById(ids).style.display="none";
        document.getElementById("alsoHide").style.display="block";
        document.querySelector('.fixContainer').style.display="block";
        cards.forEach((card)=>{
            card.style.display="flex";
        });
})
let profile=document.getElementsByClassName("profile");
for (let i=0;i<profile.length;i++){
profile[i].addEventListener('click',(e)=>{
    document.getElementById("profileBox").style.display="block";
    document.querySelector(".gameContainer").style.opacity=0.3;
    e.stopPropagation();
})}
}
let container=document.querySelector(".container");
container.addEventListener('click',(e)=>{
    document.getElementById("profileBox").style.display="none";
    document.querySelector(".gameContainer").style.opacity=1;
    e.stopPropagation();
})
