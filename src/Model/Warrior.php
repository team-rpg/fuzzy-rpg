<?php

namespace App\Model\Entity;

class Warrior extends Character
{
    public int $rage;

    public function __construct(
        string $name,
        int $health,
        int $level,
        array $equipment,
        int $money,
        int $rage
    ) {
        $this->name = $name;
        $this->health = $health;
        $this->level = $level;
        $this->equipment = $equipment;
        $this->money = $money;
        $this->rage = $rage;
    }

    /**
     * Get the value of rage
     *
     * @return int
     */
    public function getRage(): int
    {
        return $this->rage;
    }

    /**
     * Set the value of rage
     *
     * @param int $rage
     *
     * @return self
     */
    public function setRage(int $rage): self
    {
        $this->rage = $rage;

        return $this;
    }
}
