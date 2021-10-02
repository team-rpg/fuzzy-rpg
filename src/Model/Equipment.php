<?php

namespace App\Model;

/**
 * An abstract class for all of the equipment
 */
abstract class Equipment {

    /**
     * The name of the equipment
     */
    protected string $name;
    protected string $type;
    protected string $subType;

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

    /**
     * Get the value of type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param string $type
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of subType
     *
     * @return string
     */
    public function getSubType(): string
    {
        return $this->subType;
    }

    /**
     * Set the value of subType
     *
     * @param string $subType
     *
     * @return static
     */
    public function setSubType(string $subType): static
    {
        $this->subType = $subType;

        return $this;
    }
}

