<?php

namespace database;

require_once( __DIR__ . "/json-response.php" );
require_once( "../util/Error.php" );

use util\Error;

header('Content-Type: application/json');

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['txtUserName'], $data['txtPassword'], $data['chkboxImNotARobot'])) {

        $userName = $data['txtUserName'];
        $password = $data['txtPassword'];
        $isNotARobot = (bool)$data['chkboxImNotARobot'];

        if( empty( trim( $userName ) ) && empty( trim( $password ) ) ) {
            jsonResponse( false, ( Error::USER_NAME | Error::PASSWORD ), false, Error::$value[Error::USER_NAME | Error::PASSWORD] );
        }
        else if( empty( trim( $userName ) ) ) {
            jsonResponse( false, ( Error::USER_NAME ), false, Error::$value[Error::USER_NAME] );
        }
        else if( empty( trim( $password ) ) ) {
            jsonResponse( false, ( Error::PASSWORD ), false, Error::$value[Error::PASSWORD] );
        }
        else if( !$isNotARobot ) {
            jsonResponse( false, ( Error::FATAL ), false, 'Pls check the box "I\'m not a robot!"' );
        }

        jsonResponse( true, ( Error::NONE ), true, Error::$value[Error::NONE]. ", Welcome: " . $data['txtUserName'] );

    } else 
        jsonResponse( false, ( Error::FATAL ), false, Error::$value[Error::FATAL]. ": Add more description here..." );
        
    //REM: TODO-HERE...
    // jsonResponse( false, ( Error::USER_NAME | Error::PASSWORD ), true, Error::$value[Error::USER_NAME | Error::PASSWORD] );
    // jsonResponse( false, ( Error::PASSWORD ), true, Error::$value[Error::PASSWORD] );
    // jsonResponse( false, ( Error::USER_NAME ), true, Error::$value[Error::USER_NAME] );
    // jsonResponse( true, ( Error::NONE ), true, Error::$value[Error::NONE]);
}