<?php

namespace App\Model\Equipment;

class Helmet extends Armor
{
    public function __construct(
        string $name,
        int $defense,
        bool $isEquipped = false
    ) {
        $this->name = $name;
        $this->defense = $defense;
        $this->isEquipped = $isEquipped;
    }

    
}

$superCasque = new Helmet('Super casque', 5);

$superCasque->setName('Casque pas terrible')->setDefense(3);

