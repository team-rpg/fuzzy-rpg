<?php

namespace App\Model\Equipment;

class Sword extends Weapon
{

    public function __construct(
        string $name,
        int $damage,
        bool $isEquipped
    ) {
        $this->name = $name;
        $this->damage = $damage;
        $this->isEquipped = $isEquipped;
    }
}
