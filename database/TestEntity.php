<?php

namespace database;

require_once( __DIR__ . "/Entity.php" );
require_once( "../util/Objectx.php" );

use util\Objectx;

class TestEntity extends Entity {

    public function __construct( String $id, String $canonicalName = "database\TestEntity" ) {
        parent::__construct( $id, $canonicalName );
        $this->uniqueProp = 0;
    }

    public function setUniquProp( int $x ): void {
        if( $x === $this->uniqueProp )
            return;
        $this->uniqueProp = $x;
    }

    public function getUniqueProp(): int {
        return $this->uniqueProp;
    }

    /**
     * 
     * @inherit util\Objectx::toString(V)LString
     * 
     */
    public function toString(): String {
        return preg_replace( '/[ ]*\]$/i', ", uniqueProp=" . $this->uniqueProp . " ]",  parent::toString() );
    }

    /**
     * 
     * @inherit util\Objectx::equals(LObjectx)Z
     * 
     */
    public function equals( Objectx $obj ): bool {
        if( !$obj || !( $obj instanceof TestEntity ) )
            return false;
        return parent::equals( $obj ) && $obj->getUniqueProp() === $this->uniqueProp;
    }

    private int $uniqueProp;
}

// $testEntity = new TestEntity( "te-001" );
// $testEntity->setFirstName( "T.E." );
// printf( "::: " . $testEntity->toString() . "\n" );

// $testEntity1 = new TestEntity( "te-001" );
// $testEntity1->setFirstName( "T.E." );
// printf( "::: " . $testEntity1->toString() . "\n" );

// printf( "::: " . $testEntity1->equals( $testEntity ) . "\n" );
