
const btnForgetPassword = document.querySelector('#BTN_FOOTER .BtnForgetPassword');
const btnSignIn = document.querySelector('#BTN_FOOTER .BtnSignIn');

btnForgetPassword.addEventListener('mouseenter', () => {
    btnSignIn.style.backgroundColor= "var(--gray)";
    btnSignIn.style.color= "var(--black)";
});

btnForgetPassword.addEventListener('mouseleave', () => {
    btnSignIn.style.backgroundColor= "var(--light-blue)";
    btnSignIn.style.color= "var(--white)";
});
