const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
let signincheck=document.getElementById('signinceck');
signincheck.addEventListener('click',()=>{
    let username=document.getElementById('signinusername');
    let password=document.getElementById('signinpassword');
    if(username.value){
        if(password.value){
            signincheck.setAttribute(type="submit");
        }
        else{
            console.log("enter password");
        }
    }else{
        console.log("enetr username");
    }
});
signUpButton.addEventListener('click', () => {

    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});