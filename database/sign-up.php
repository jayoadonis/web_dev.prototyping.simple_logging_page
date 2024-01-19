<?php

namespace database;

require_once( __DIR__ . "/json-response.php" );
require_once( "../util/Error.php" );

use util\Error;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    jsonResponse( true, ( Error::NONE ), true, Error::$value[Error::NONE] );
}