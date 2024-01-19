<?php

namespace database;

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