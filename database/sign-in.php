<?php

namespace database;

header('Content-Type: application/json');

class Error {
    public const NONE = 0;
    public const USER_NAME = 2;
    public const PASSWORD = 4;

    public static array $value = [
        self::NONE => 'No Error',
        self::USER_NAME => 'Error found: User Name invalid',
        self::PASSWORD => 'Error found: Password invalid',
        self::USER_NAME | self::PASSWORD => 'Error found: both user name & password invalid'
    ];
}

function jsonResponse(
    $isSuccess, 
    $errorCode,
    $isAdmin,
    $message
) {
    echo json_encode([
        'isSuccess' => $isSuccess,
        'errorCode' => $errorCode,
        'isAdmin' => $isAdmin,
        'message' => $message,
    ]);
    exit;
}

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    
    //REM: TODO-HERE...
    // jsonResponse( false, ( Error::USER_NAME | Error::PASSWORD ), true, Error::$value[Error::USER_NAME | Error::PASSWORD] );
    // jsonResponse( false, ( Error::PASSWORD ), true, Error::$value[Error::PASSWORD] );
    // jsonResponse( false, ( Error::USER_NAME ), true, Error::$value[Error::USER_NAME] );
    jsonResponse( true, ( Error::NONE ), true, Error::$value[Error::NONE] );
}