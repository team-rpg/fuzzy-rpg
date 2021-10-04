<?php

namespace App\Model;

abstract class Armor extends Equipment
{
    protected int $defense;
    protected bool $isEquipped;

    /**
     * Get the value of defense
     *
     * @return int
     */
    public function getDefense(): int
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     *
     * @param int $defense
     *
     * @return static
     */
    public function setDefense(int $defense): static
    {
        $this->defense = $defense;

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




