<?php

namespace App\Model;

use App\Model\Character;

class Warrior extends Character
{
    private int $rage;

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
     * @return static
     */
    public function setRage(int $rage): static
    {
        $this->rage = $rage;

        return $this;
    }
}
