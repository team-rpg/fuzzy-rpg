<?php

namespace App\Model\Entity;

class Archer extends Character
{
    protected int $energy;

    public function __construct(
        string $name,
        int $health,
        int $level,
        array $equipment,
        int $money,
        int $energy
    ) {
        $this->name = $name;
        $this->health = $health;
        $this->level = $level;
        $this->equipment = $equipment;
        $this->money = $money;
        $this->energy = $energy;
    }
    /**
     * Get the value of energy
     *
     * @return int
     */
    public function getEnergy(): int
    {
        return $this->energy;
    }

    /**
     * Set the value of energy
     *
     * @param int $energy
     *
     * @return self
     */
    public function setEnergy(int $energy): self
    {
        $this->energy = $energy;

        return $this;
    }
}
