<?php

namespace util;

class Status {
    //REM: version 1.0
    public static Value $NA;
    public static Value $WAITING;
    public static Value $READY;
    public static Value $RUNNING;

    //REM: version 2.0
    public const NA = 0000_0000;
    public const WAITING = 0000_0001;
    public const READY = 0000_0010;
    public const RUNNING = 0000_0100;
    public const DESC = [
        Status::NA => "NOT APPLICABLE",
        Status::WAITING => "WAITING",
        Status::READY => "READY",
        Status::RUNNING => "RUNNING"
    ];
    public const VALUE = [
        Status::NA => "N/a",
        Status::WAITING => "WTG",
        Status::READY => "RDY",
        Status::RUNNING => "RUN"
    ];
}

//REM: Part of version 1.0
class Value {
    public readonly int $CODE;
    public readonly String $VALUE;
    public readonly String $DESCRIPTION;

    public function __construct( 
        int $CODE, 
        String $VALUE,
        String $DESCRIPTION
    ) {
        $this->CODE = $CODE;
        $this->VALUE = $VALUE;
        $this->DESCRIPTION = $DESCRIPTION;
    }
}

//REM: Part of version 1.0
//REM: Initializing...
Status::$NA = new Value( 0000_0000, "N/a", "NOT APPLICABLE" );
Status::$WAITING = new Value( 0000_0001, "WTG", "WAITING" );
Status::$READY = new Value( 0000_0010, "RDY", "READY" );
Status::$RUNNING = new Value( 0000_0100, "RUN", "RUNNING" );


//REM: checking both version 1.0 and 2.0
// echo Status::$NA->DESCRIPTION . PHP_EOL;
// echo Status::$WAITING->CODE . PHP_EOL;
// echo Status::$READY->CODE . PHP_EOL;
// echo Status::$RUNNING->CODE . PHP_EOL;
// echo Status::DESC[ Status::NA ] . PHP_EOL;
// echo Status::DESC[ Status::WAITING ] . PHP_EOL;
// echo Status::DESC[ Status::READY ] . PHP_EOL;
// echo Status::DESC[ Status::RUNNING ] . PHP_EOL;


//REM: Here come's the problem... Re-initialization!
// Status::$NA = new Value( 0000_0000, "NOT APPLICABLEssss" );
// Status::$WAITING = new Value( 0000_0001, "WAITING what..." );
// Status::$READY = new Value( 0000_0002, "READY SET GO..." );

// echo Status::$NA->DESCRIPTION . PHP_EOL;
// echo Status::$WAITING->CODE . PHP_EOL;
// echo Status::$READY->CODE . PHP_EOL;
