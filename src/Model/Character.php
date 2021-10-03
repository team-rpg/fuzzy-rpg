<?php

namespace App\Model;

use App\Model\Entity;

abstract class Character extends Entity
{

    protected string $id;
    protected int    $classId;
    protected string $className;
    protected string $secondary_stat_name;
    protected string $secondary_stat_value;
    protected string $xp;

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

    /**
     * Get the value of secondary_stat_name
     *
     * @return string
     */
    public function getSecondaryStatName(): string
    {
        return $this->secondary_stat_name;
    }

    /**
     * Set the value of secondary_stat_name
     *
     * @param string $secondary_stat_name
     *
     * @return static
     */
    public function setSecondaryStatName(string $secondary_stat_name): static
    {
        $this->secondary_stat_name = $secondary_stat_name;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param string $id
     *
     * @return static
     */
    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of xp
     *
     * @return string
     */
    public function getXp(): string
    {
        return $this->xp;
    }

    /**
     * Set the value of xp
     *
     * @param string $xp
     *
     * @return static
     */
    public function setXp(string $xp): static
    {
        $this->xp = $xp;

        return $this;
    }

    /**
     * Get the value of secondary_stat_value
     *
     * @return string
     */
    public function getSecondaryStatValue(): string
    {
        return $this->secondary_stat_value;
    }

    /**
     * Set the value of secondary_stat_value
     *
     * @param string $secondary_stat_value
     *
     * @return static
     */
    public function setSecondaryStatValue(string $secondary_stat_value): static
    {
        $this->secondary_stat_value = $secondary_stat_value;

        return $this;
    }

    /**
     * Get the value of classId
     *
     * @return int
     */
    public function getClassId(): int
    {
        return $this->classId;
    }

    /**
     * Set the value of classId
     *
     * @param int $classId
     *
     * @return static
     */
    public function setClassId(int $classId): static
    {
        $this->classId = $classId;

        return $this;
    }
}
