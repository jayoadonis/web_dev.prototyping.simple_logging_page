<?php

namespace util;

require_once( __DIR__ . "/Objectx.php" );

class Stack extends Objectx {

    public function __construct() {
        $this->init();
    }

    private function init(): void {
        $this->data = [];
        $this->size = 0;
    }

    public function getSize(): int {
        return $this->size;
    }

    public function getData(): array {
        return clone $this->data;
    }

    /**
     * 
     * @return array The diffirence value of both data list/set
     */
    // public function dataDiff( Stack $stack ): array {
    //     $result = [];
    
    //     foreach ($stack->data as $element) {
    //         if ( !in_array( $element, $this->data, true ) )
    //             $result[] = $element;
    //     }
    
    //     return $result;
    // }
    
    // public function isSameContent( Objectx $obj ) {
    //     if( !$obj || !( $obj instanceof Stack ) || $this->size !== $obj->size )
    //         return false;
    //     if( $obj === $this )
    //         return true;
    //     $counter = 0;
    //     for( $i = 0; $i < $this->size; ++$i ) {
    //         for( $j = 0; $j < $obj->size; ++$j ) {
    //             if( $this->data[$i] === $obj->data[$j] ) {
    //                 ++$counter;
    //                 continue;
    //             }
    //         }
    //         if( $counter === 0 )
    //             return false;
    //     }
    //     return $counter === $this->size;
    // }

    /**
     * [warning]: Deep equality check... And strict sequencial ordinal equality check...
     * 
     * @inherit util\Objectx::equals(LObjectx)Z
     * 
     */
    public function equals( Objectx $obj ): bool {
        if( !$obj || !( $obj instanceof Stack ) || $this->size !== $obj->size )
            return false;
        if( $obj === $this )
            return true;
        for( $i = 0; $i < $this->size; ++$i ) {
            if( $this->data[$i] !== $obj->data[$i] )
                return false;
        }
        return true;
    }

    private array $data;
    private int $size;
}