<?php

namespace App\Model;

abstract class Weapon extends Equipment
{
    protected int $damage;
    protected bool $isEquipped;

    /**
     * Get the value of damage
     *
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * Set the value of damage
     *
     * @param int $damage
     *
     * @return static
     */
    public function setDamage(int $damage): static
    {
        $this->damage = $damage;

        return $this;
    }

    /**
     * Get the value of isEquipped
     *
     * @return bool
     */
    public function getIsEquipped(): bool
    {
        return $this->isEquipped;
    }

    /**
     * Set the value of isEquipped
     *
     * @param bool $isEquipped
     *
     * @return static
     */
    public function setIsEquipped(bool $isEquipped): static
    {
        $this->isEquipped = $isEquipped;

        return $this;
    }
}

