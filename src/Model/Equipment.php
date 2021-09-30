<?php

namespace App\Model\Equipment;

/**
 * An abstract class for all of the equipment
 */
abstract class Equipment {

    /**
     * The name of the equipment
     */
    protected string $name;

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}

