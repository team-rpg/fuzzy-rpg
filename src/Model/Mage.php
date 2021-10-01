<?php

namespace App\Model\Entity;

class Mage extends Character
{
    public int $mana;

    public function __construct(
        string $name,
        int $health,
        int $level,
        array $equipment,
        int $money,
        int $mana
    ) {
        $this->name = $name;
        $this->health = $health;
        $this->level = $level;
        $this->equipment = $equipment;
        $this->money = $money;
        $this->mana = $mana;
    }

    /**
     * Get the value of mana
     *
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * Set the value of mana
     *
     * @param int $mana
     *
     * @return self
     */
    public function setMana(int $mana): self
    {
        $this->mana = $mana;

        return $this;
    }
}
