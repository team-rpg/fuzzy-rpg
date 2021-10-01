<?php

namespace App\Model\Entity;

interface EntityInterface
{

    public function attack(Entity $enemy): void;

    public function takeDamage(int $damage): void;

    public function loot(): Equipment;
}
