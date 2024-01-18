class Form {
    static SIGN_IN = "sign-in";
    static SIGN_UP = "sign-up";
}

class Error {
    static NONE = 0;
    static USER_NAME = 2;
    static PASSWORD = 4;
    static RE_PASSWORD = 8;
    static EMAIL = 16;
}

document.addEventListener("DOMContentLoaded", function () {

    const handleFormSubmit = ( form, endpoint ) => {
        const btnForgetPassword = form.querySelector( '#SIGN_IN_FORM .BtnForgetPassword' );
        const signingFormElements = Array.from( form.querySelectorAll('input') );
        const signingFormDatas = Object.fromEntries(
            signingFormElements.map(
                el => [el.name, el.name === 'chkboxImNotARobot' ? el.checked : el.value]
            )
        );

        //REM: TODO-HERE...
        btnForgetPassword.addEventListener( 'click', function( event ) {
            //REM: TODO-HERE...
            event.preventDefault();
            alert( "Going to retrieve account via a step by step process/inquiry later on." );
            window.location.reload();
            // event.stopPropagation();
        } );

        form.addEventListener( "submit", function ( event ) {
            event.preventDefault();

            var inputTxtUserName;

            signingFormElements.forEach(element => {
                if (element.name === 'txtUserName')
                    inputTxtUserName = element;
            });

            console.log( endpoint );
            console.log( signingFormElements );
            console.log( signingFormDatas );
            console.log( inputTxtUserName );
            console.log( btnForgetPassword );


            //REM: TODO-HERE...
            fetch(`./database/${endpoint}.php`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify( signingFormDatas ) //REM: e.q: { userName: <value>, password: <value> }
            })
                .then(response => response.json())
                .then(data => {
                    // const isAuthenticateEndpoint = ( endpoint === Form.SIGN_IN );
                    
                    switch( endpoint ) {
                        case Form.SIGN_IN:
                            if( data.isSuccess ) {
                                //REM: TODO-HERE...
                                console.log( "Successfully log-in!" )
                                alert( data.message );
                            } else {

                                switch( data.errorCode ) {
                                    case Error.USER_NAME:
                                        console.log( "catch user name invalid." )
                                        break;
                                    case Error.PASSWORD:
                                        console.log( "catch password invalid." )
                                        break;
                                    case Error.USER_NAME | Error.PASSWORD:
                                        console.log( "catch both user name & password invalid." )
                                        break;
                                    default:
                                        //REM: TODO-HERE...
                                        console.log( "catch sign-in invalid: something went wrong" )
                                }
                                
                                alert( data.message, ", ", data.errorCode );
                                // inputTxtUserName.focus();
                            }
                        
                            break;
                        case Form.SIGN_UP:
                            if( data.isSuccess ) {
                                //REM: TODO-HERE...
                            } else {
                                switch( data.errorCode ) {
                                    case Error.USER_NAME:

                                        break;
                                    case Error.PASSWORD:

                                        break;
                                    case Error.RE_PASSWORD:

                                        break;
                                    case Error.EMAIL:

                                        break;
                                    default:
                                        //REM: TODO-HERE...
                                }
                            }
                            break;
                        default:
                    }
                })
                .catch(error => {
                    console.error("::: Error:", error.message);
                });
        });
    };

    const signInForm = document.querySelector("#SIGN_IN_FORM");
    const signUpForm = document.querySelector("#SIGN_UP_FORM");

    if ( signInForm )
        handleFormSubmit( signInForm, Form.SIGN_IN );

    if ( signUpForm )
        handleFormSubmit( signUpForm, Form.SIGN_UP );

});