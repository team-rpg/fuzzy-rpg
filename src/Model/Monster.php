<?php

namespace App\Model;



class Monster extends Entity
{
    public function __construct(
        string $name,
        int $health,
        int $level,
        array $equipment,
        int $money,

    ) {
        $this->name = $name;
        $this->health = $health;
        $this->level = $level;
        $this->equipment = $equipment;
        $this->money = $money;
    }
}
