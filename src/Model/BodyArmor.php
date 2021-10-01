<?php

namespace App\Model\Equipment;

class BodyArmor extends Armor {

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