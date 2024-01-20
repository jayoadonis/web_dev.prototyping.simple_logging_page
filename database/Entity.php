<?php

namespace database;

require_once( "../util/Objectx.php" );

use Closure;
use util\Objectx;

abstract class Entity extends Objectx {

    public function __construct( String $id, String $canonicalName = "database\Entity"  ) {
        parent::__construct( $canonicalName );
        $this->id = $id;
        $this->init();
    }

    private function init(): void {
        $this->setFirstName( "N/a" );
        // $this->setMiddleName( "N/a" );
        // $this->setLastName( "N/a" );
        // $this->setSuffix( "N/a" );

        $this->middleName = "N/a";
        $this->lastName = "N/a";
        $this->suffix = "N/a";
    }

    public function getId(): String {
        return $this->id;
    }

    public function isSameId( Objectx $obj ): bool {
        if( !$obj || !( $obj instanceof Entity ) )
            return false;
        if( $obj === $this )
            return true;
        return $this->id === $obj->id;
    }

    /**
     * 
     * @param String $x
     * @param callable $func signature must be: function( LString )Z, this is for additional block
     */
    private static function verify( ?String $x, ?Closure $func = null ): null | String {
        $func = $func?? function( $x ): bool { return true; };
        $fn = trim( $x );
        if( $fn && !empty( $fn ) && $func( $fn ) )
            return $fn;
        return null;
    }

    public function setFirstName( ?String $firstName ): void {
        if( $fn = self::verify( 
            $firstName, 
            function( $x ): bool {
                return $this->firstName === null || $this->firstName !== $x;
            } 
        ) ) {
            $this->firstName = $fn;
        }

        // $fn = null;
        // if( !$firstName || empty( $fn = trim( $firstName ) ) ||
        //         strtoupper( $this->firstName ) === strtoupper( $fn )
        // ) {
        //     return;
        // }
        // $this->firstName = $fn;
    }

    public function setMiddleName( ?String $middleName ): void {
        if( $fn = self::verify( 
            $middleName, 
            function( $x ): bool {
                return $this->middleName === null || $this->middleName !== $x;
            } 
        ) ) {
            $this->middleName = $fn;
        }
    }
    public function getFirstName(): String {
        return $this->firstName;
    }

    public function getMiddleName(): String {
        return $this->middleName;
    }

    public function getLastName(): String {
        return $this->lastName;
    }

    public function getSuffix(): String {
        return $this->suffix;
    }

    /**
     * 
     * @inherit util\Objectx::hashCode(V)I
     * 
     */
    public function hashCode(): int {
        $result = 0;
        $result = $result + 31 * parent::hashStr( $this->id );
        $result = $result + 31 * parent::hashStr( $this->firstName );
        $result = $result + 31 * parent::hashStr( $this->middleName );
        $result = $result + 31 * parent::hashStr( $this->lastName );
        $result = $result + 31 * parent::hashStr( $this->suffix );

        return $result;
    }

    /**
     * 
     * @inherit util\Objectx::equals(LObjectx)Z
     * 
     */
    public function equals( Objectx $obj ): bool {
        if( !$obj || !( $obj instanceof Entity ) )
            return false;
        if( $obj === $this ) 
            return true;
        //REM: no need to explicitly downcast this '$obj' into 'Entity'
        return $this->id === $obj->id &&
            strtolower( $this->firstName ) === strtolower( $obj->firstName ) &&
            strtolower( $this->middleName ) === strtolower( $obj->middleName ) &&
            strtolower( $this->lastName ) === strtolower( $obj->lastName ) &&
            strtolower( $this->suffix ) === strtolower( $obj->suffix );
    }
    /**
     * 
     * @inherit util\Objectx::toString(V)LString
     */
    public function toString(): String {
        return parent::toString() . "[ id='". $this->id . "', firstName='". $this->firstName ."' ]";
    }

    public readonly String $id;
    
    private ?String $firstName = null;
    private ?String $middleName = null;
    private ?String $lastName = null;
    private ?String $suffix = null;
}

//REM: Make the abstract 'database\Entity' a concrete class...
// $entity = new Entity( "e-001" );
// $entity->setFirstName( "JohNs" );

// $entity1 = new Entity( "e-001" );
// $entity1->setFirstName( "Johns" );

// $entity2 = new Entity( "e-001" );
// $entity2->setFirstName( "Johnss" );

// printf( "::: " . $entity->toString() . "\n" );
// printf( "::: " . $entity1->toString() . "\n" );
// printf( "::: " . $entity2->toString() . "\n" );
// printf( "===\n" );
// printf( "::: " . $entity->equals( $entity ) . "\n" );
// printf( "::: " . $entity->equals( $entity1 ) . "\n" );
// printf( "::: " . $entity->equals( $entity2 ) . "\n" );
// printf( "===\n" );
// printf( "::: " . $entity1->equals( $entity ) . "\n" );
// printf( "::: " . $entity1->equals( $entity1 ) . "\n" );
// printf( "::: " . $entity1->equals( $entity2 ) . "\n" );
// printf( "===\n" );
// printf( "::: " . $entity2->equals( $entity ) . "\n" );
// printf( "::: " . $entity2->equals( $entity1 ) . "\n" );
// printf( "::: " . $entity2->equals( $entity2 ) . "\n" );