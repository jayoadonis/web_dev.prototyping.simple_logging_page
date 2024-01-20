<?php

namespace database;

require_once( "../util/Objectx.php" );

use util\Objectx;

class User extends Objectx {
    //REM: TODO-HERE...
    public function __construct( 
        String $canonicalName = "database\User" 
    ) {
        parent::__construct( $canonicalName );
        $this->firstName = null;
    }

    /**
     * An overwritten function, a deep equality check.
     * 
     * @inherit util\Objectx::equals( Lutil\Objectx )Z
     * 
     */
    public function equals( Objectx $obj ): bool {
         //REM: TODO-HERE...
        if( !$obj || !( $obj instanceof User ) )
            return false;
        if( $obj === $this )
            return true;
        //REM: No need explicit downcasting, PHP does runtime casting. 
        //REM: And we already check if it is an instance of the said Class in
        //REM: this case the class named 'User'
        // $user = (User)$obj; 
        return $this->firstName === $obj->getFirstName();
    }

    /**
     * 
     * @inherit util\Objectx::hashCode()I
     */
    public function hashCode(): int {
        $result = 0;
        $result = $result + 31 * parent::hashStr( $this->firstName?? 0xF0C ); //REM: -_-
        return $result & 0xFFFF_FFFF;
    }

    public function setFirstName( ?String $firstName ): void {
        if( !$firstName || empty( trim( $firstName ) ) )
            return;
        $this->firstName = $firstName;
    }
    
    public function getFirstName(): ?String {
        return $this->firstName;    
    }
    
    private ?String $firstName;
}

$user = new User();
$user->setFirstName( "Ok" );

$user1 = new User();
$user1->setFirstName( "Ok" );
printf( "::: " . $user->toString() . "\n" );
printf( "::: " . $user1->toString() . "\n" );
printf( "::: " . $user->equals( $user ) . "\n" );
printf( "::: " . $user1->equals( $user1 ) . "\n" );
printf( "::: " . $user1->equals( $user ) . "\n" );

$obj = new Objectx();
$obj1 = new Objectx();
printf( "::: " . $obj->toString() . "\n" );
printf( "::: " . $obj1->toString() . "\n" );
printf( "::: " . $obj->equals( $obj ) . "\n" );
printf( "::: " . $obj1->equals( $obj1 ) . "\n" );
printf( "::: " . $obj1->equals( $obj ) . "\n" );