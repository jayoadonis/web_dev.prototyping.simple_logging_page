<?php

namespace util;

class Objectx {

    public function __construct( 
        String $canonicalName = "util\Objectx" 
    ) {
        $this->canonicalName = $canonicalName;
    }

    public function toString() : String {
        return $this->canonicalName . "@" . $this->hashCode();
    }

    /** [Warning]: This defaulted only to check for address location equality.
     * 
    */
    public function equals( Objectx $obj ): bool {
        return $obj === $this;
    }

    public function hashCode(): int {
        //REM: note; masking to 4 bytes
        return 31 * self::hashStr( $this->canonicalName) + 
            spl_object_hash( $this ) & 0xFFFF_FFFF ;
    }

    protected static function hashStr( String $str ): int {
        if( !$str )
            return 0;

        $result = 0;
        $len = strlen( $str );
        for( $i = 0; $i < $len; ++$i )
            $result += 31 * ord( $str[$i] );
        return $result;
    }

    protected static function hashInt( int $x ): int {
        return 31 * $x;
    }

    protected String $canonicalName;
}

// $obj = new Objectx();
// printf( "::: " . $obj->toString() . "\n" );
// printf( "::: " . $obj->equals( $obj ) . "\n" );