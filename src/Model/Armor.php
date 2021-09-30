<?php

namespace App\Model\Equipment;

abstract class Armor extends Equipment
{
    protected int $defense;

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
}




