class Form {
    static SIGN_IN = "sign-in";
    static SIGN_UP = "sign-up";
}

class Error {
    static FATAL = -1;
    static NONE = 0;
    static USER_NAME = 2;
    static PASSWORD = 4;
    static RE_PASSWORD = 8;
    static EMAIL = 16;
}

document.addEventListener("DOMContentLoaded", function () {

    const handleForm = ( form, endpoint ) => {
        const btnForgetPassword = form.querySelector( '#SIGN_IN_FORM .BtnForgetPassword' );

        //REM: TODO-HERE...
        btnForgetPassword.addEventListener( 'click', function( event ) {
            //REM: TODO-HERE...
            event.preventDefault();
            console.log( "click: btnForgetPassword" );
            alert( "TEST ALERT: " + "Going to retrieve account via a step by step process/inquiry later on." );
            window.location.reload();
            // event.stopPropagation();
        } );

        form.addEventListener( "submit", function ( event ) {
            event.preventDefault();

            var inputTxtUserName;
            const signingFormElements = Array.from( form.querySelectorAll('input') );

            //REM: e.q: [ txtUserName: '<str>', txtPassword: '<str>',  chkboxImNotARobot: <bool> ]
            const signingFormDatas = Object.fromEntries(
                signingFormElements.map(
                    el => [el.name, ( el.name === 'chkboxImNotARobot' )? el.checked : el.value]
                )
            );

            signingFormElements.forEach(element => {
                if (element.name === 'txtUserName')
                    inputTxtUserName = element;
            });
            
            console.log( `submit: ${endpoint}` );
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
                body: JSON.stringify( signingFormDatas ) //REM: e.q: { txtUserName: '<str>', txtPassword: '<str>',  chkboxImNotARobot: <bool> }
            })
                .then(response => response.json())
                .then(data => {
                    // const isAuthenticateEndpoint = ( endpoint === Form.SIGN_IN );

                    //REM: Check this out for security...
                    // data.isSuccess = true; //REM: note we explicity modified it at client-side/front-end impl.

                    switch( endpoint ) {
                        case Form.SIGN_IN:
                            if( data.isSuccess ) {
                                //REM: TODO-HERE...
                                console.log( "Successfully log-in!" )
                                alert( "TEST ALERT: " +  data.message + "; ErrorCode = " + data.errorCode );
                                window.location.reload();
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
                                        console.log( "catch sign-in invalid: something went wrong: " + data.message )
                                }
                                
                                alert( "TEST ALERT: " + data.message + "; ErrorCode = " + data.errorCode );
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
                                        console.log( "catch sign-up invalid: something went wrong: " + data.message )
                                }
                            }
                            break;
                        default:
                    }
                })
                .catch(error => {
                    console.error( "::: Error: " + error.message );
                });
        });
    };

    const signInForm = document.querySelector("#SIGN_IN_FORM");
    const signUpForm = document.querySelector("#SIGN_UP_FORM");

    if ( signInForm )
        handleForm( signInForm, Form.SIGN_IN );

    if ( signUpForm )
        handleForm( signUpForm, Form.SIGN_UP );

    console.log( "DOMContentLoaded..." );
});

console.log( "init: simple-logging-page.js" );