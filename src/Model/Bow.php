<?php

namespace App\Model\Equipment;

class Bow extends Weapon
{

    public function __construct(
        string $name,
        int $attack
    ) {
        $this->name = $name;
        $this->attack = $attack;
    }
}
