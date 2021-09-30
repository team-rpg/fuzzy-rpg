<?php

namespace App\Model\Equipment;

class Helmet extends Armor
{
    public function __construct(
        string $name,
        int $defense
    ) {
        $this->name = $name;
        $this->defense = $defense;
    }

    
}


