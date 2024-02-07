<?php

namespace database;

require_once( "../util/Objectx.php" );
require_once( "../util/Status.php" );

use util\Objectx;
use util\Status;

class User extends Objectx {
    //REM: TODO-HERE...
    public function __construct( 
        String $firstName = Status::VALUE[ Status::NA ],
        String $middleName = Status::VALUE[ Status::NA ],
        String $canonicalName = "database\User"
    ) {
        parent::__construct( $canonicalName );

        $this->id = date( 'Y' ) . "-" . sprintf( "%04d", ++self::$idCounter );

        $this->init( 
            $firstName,
            $middleName
        );
    }

    private function init( 
        String $firstName,
        String $middleName
    ) {
        $this->setFirstName( $firstName );
        $this->setMiddleName( $middleName );
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
        return strtolower( $this->firstName ) === strtolower( $obj->getFirstName() );
        //REM: (Note); we can remove strtolower impl here, if we have another field such as the 'id'
    }

    /**
     * 
     * @inherit util\Objectx::hashCode()I
     */
    public function hashCode(): int {
        $result = 0;
        //REM: TODO-HERE; Do we want to always have a mono-case( lowercase or uppercase ) for the String?
        $result = $result + 31 * parent::hashStr( $this->id?? 0xF0C ); //REM: -_-
        $result = $result + 31 * parent::hashStr( $this->firstName?? 0xF0C ); //REM: -_-
        $result = $result + 31 * parent::hashStr( $this->middleName?? 0xF0C ); //REM: -_-
        return $result & 0xFFFF_FFFF;
    }

    public function getId(): ?String {
        return $this->id;
    }

    public function setFirstName( ?String $firstName ): void {
        $fn = null;
        if( !$firstName || empty( $fn = trim( $firstName ) ) || 
            isset( $this->firstName ) && strtolower( $this->firstName ) === strtolower( $fn )  
        ) {
            return;
        }
        $this->firstName = $fn;
    }
    
    
    public function getFirstName(): ?String {
        return $this->firstName;    
    }
    
    public function setMiddleName( ?String $middleName ): void {
        $mD= null;
        if( !$middleName || empty( $mD = trim( $middleName ) ) ||
                isset( $this->middleName ) && strtolower( $this->middleName ) === strtolower( $mD )
        ) {
            return;
        }
        $this->middleName = $mD;
    }

    public function getMiddleName(): ?String {
        return $this->middleName;
    }

    /**
     * 
     * @inherit util\Objectx::toString()LString
     * 
     */
    public function toString(): String {
        // return parent::toString() . "[ firstName='" . $this->firstName . 
        //     "', middleName='" . $this->middleName . "' ]"; 

        return sprintf( "%s[ id='%s', firstName='%s', middleName='%s' ]",
            parent::toString(), $this->id, $this->firstName, $this->middleName
        );
    }
    
    private ?String $id;
    private static int $idCounter = 0;
    private ?String $firstName;
    private ?String $middleName;
    private ?String $lastName;
    private ?String $suffix;

    private bool $isAdmin;
    private String $userName;
    private String $password;
}

// $user = new User();
// $user1 = new User();
// printf( "::: " . $user->toString() . "\n" );
// printf( "::: " . $user1->toString() . "\n" );
// printf( "::: " . $user->equals( $user ) . "\n" );
// printf( "::: " . $user1->equals( $user1 ) . "\n" );
// printf( "::: " . $user1->equals( $user ) . "\n" );
// printf( "::: " . $user->toString() . "\n" );
// printf( "::: " . $user1->toString() . "\n" );

// echo "====\n";

// $user->setFirstName( "Ok   " );
// $user1->setFirstName( "    OK   " );
// printf( "::: " . $user->toString() . "\n" );
// printf( "::: " . $user1->toString() . "\n" );
// printf( "::: " . $user->equals( $user ) . "\n" );
// printf( "::: " . $user1->equals( $user1 ) . "\n" );
// printf( "::: " . $user1->equals( $user ) . "\n" );


// echo "====\n";
// $user->setFirstName( "Ok   " );
// $user1->setFirstName( "   Oks   " );
// printf( "::: " . $user->toString() . "\n" );
// printf( "::: " . $user1->toString() . "\n" );
// printf( "::: " . $user->equals( $user ) . "\n" );
// printf( "::: " . $user1->equals( $user1 ) . "\n" );
// printf( "::: " . $user1->equals( $user ) . "\n" );


// echo "====\n";
// $obj = new Objectx();
// $obj1 = new Objectx();
// printf( "::: " . $obj->toString() . "\n" );
// printf( "::: " . $obj1->toString() . "\n" );
// printf( "::: " . $obj->equals( $obj ) . "\n" );
// printf( "::: " . $obj1->equals( $obj1 ) . "\n" );
// printf( "::: " . $obj1->equals( $obj ) . "\n" );