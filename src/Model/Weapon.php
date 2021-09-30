<?php

namespace App\Model\Equipment;

abstract class Weapon extends Equipment
{
    protected int $attack;

    public function __construct(int $attack)
    {
        $this->attack = $attack;
    }

    /**
     * Get the value of attack
     *
     * @return int
     */
    public function getAttack(): int
    {
        return $this->attack;
    }

    /**
     * Set the value of attack
     *
     * @param int $attack
     *
     * @return static
     */
    public function setAttack(int $attack): static
    {
        $this->attack = $attack;

        return $this;
    }
}

