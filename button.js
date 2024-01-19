
document.addEventListener("DOMContentLoaded", function () {
    const btnForgetPassword = document.querySelector('#BTN_FOOTER .BtnForgetPassword');
    const btnSignIn = document.querySelector('#BTN_FOOTER .BtnSignIn');

    const btnHeaderRegister = document.querySelector('#BTN_HEADER .BtnRegister');
    const btnHeaderSignIn = document.querySelector('#BTN_HEADER .BtnSignIn');

    btnForgetPassword.addEventListener('mouseenter', () => {
        btnSignIn.style.backgroundColor= "var(--gray)";
        btnSignIn.style.color= "var(--black)";
    });

    btnForgetPassword.addEventListener('mouseleave', () => {
        btnSignIn.style.backgroundColor= "var(--light-blue)";
        btnSignIn.style.color= "var(--white)";
    });

    // btnHeaderRegister.addEventListener( 'mouseenter', () => {
    //     if( btnHeaderRegister.style.cursor === "not-allowed" ) {
    //         btnHeaderRegister.style.backgroundColor= "var(--gray)";
    //         btnHeaderRegister.style.color= "var(--dark-gray)";
    //     } else {
    //         btnHeaderRegister.style.backgroundColor= "var(--light-blue)";
    //         btnHeaderRegister.style.color= "var(--white)";
    //     }
    // });

    // btnHeaderSignIn.addEventListener( 'mouseenter', () => {
    //     if( btnHeaderSignIn.style.cursor === "not-allowed" ) {
    //         btnHeaderSignIn.style.backgroundColor= "var(--gray)";
    //         btnHeaderSignIn.style.color= "var(--dark-gray)";
    //     } else {
    //         btnHeaderSignIn.style.backgroundColor= "var(--light-blue)";
    //         btnHeaderSignIn.style.color= "var(--white)";
    //     }
    // });

    btnHeaderRegister.addEventListener( 'click', () => {
        btnHeaderSignIn.style.cursor = "pointer";
        btnHeaderRegister.style.cursor = "not-allowed";
    });

    btnHeaderSignIn.addEventListener( 'click', () => {
        btnHeaderSignIn.style.cursor = "not-allowed";
        btnHeaderRegister.style.cursor = "pointer";
    });
});


