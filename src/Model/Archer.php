<?php

namespace App\Model;

use App\Model\Character;

class Archer extends Character
{
    private int $energy;

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
     * @return static
     */
    public function setEnergy(int $energy): static
    {
        $this->energy = $energy;

        return $this;
    }
}
