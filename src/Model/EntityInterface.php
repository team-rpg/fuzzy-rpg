<?php

namespace App\Model;

use App\Model\Entity;
use App\Model\Equipment;

interface EntityInterface
{

    public function attack(Entity $enemy): void;

    public function takeDamage(int $damage): void;

    public function loot(): Equipment;
}
