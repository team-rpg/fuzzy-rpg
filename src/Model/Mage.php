<?php

namespace App\Model;

use App\Model\Character;

class Mage extends Character
{
    private int $mana;

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
     * @return static
     */
    public function setMana(int $mana): static
    {
        $this->mana = $mana;

        return $this;
    }
}
