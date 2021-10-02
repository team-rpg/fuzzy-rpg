<?php

namespace App\Model;

use App\Model\Entity;

abstract class Character extends Entity
{

    protected string $className;

    public function skillAttack(): void
    {
    }

    /**
     * Get the value of className
     *
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * Set the value of className
     *
     * @param string $className
     *
     * @return static
     */
    public function setClassName(string $className): static
    {
        $this->className = $className;

        return $this;
    }
}
