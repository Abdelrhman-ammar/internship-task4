function formHandel(){
    var signInForm = document.getElementById("signinForm");
    var signUpForm = document.getElementById("signupForm");
    var btn = document.getElementById("mybtn");
    if(signInForm.style.display == '' || signInForm.style.display == 'block'){
        btn.innerHTML = "sign In";
        signInForm.style.display = 'none';
        signUpForm.style.display = 'block';   
    }else{
        btn.innerHTML = "sign Up";
        signInForm.style.display = 'block';
        signUpForm.style.display = 'none';
    }
}