<?php

namespace App\Model;

use App\Model\Entity;

abstract class Character extends Entity
{

    protected string $id;
    protected int    $classId;
    protected string $className;
    protected string $secondaryStatName;
    protected string $secondaryStatValue;
    protected int $xp;

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
        return $this->secondaryStatName;
    }

    /**
     * Set the value of secondary_stat_name
     *
     * @param string $secondaryStatName
     *
     * @return static
     */
    public function setSecondaryStatName(string $secondaryStatName): static
    {
        $this->secondaryStatName = $secondaryStatName;

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
     * @return int
     */
    public function getXp(): string
    {
        return $this->xp;
    }

    /**
     * Set the value of xp
     *
     * @param int $xp
     *
     * @return static
     */
    public function setXp(int $xp): static
    {
        $this->xp = $xp;

        return $this;
    }

    /**
     * Get the value of secondaryStatValue
     *
     * @return string
     */
    public function getSecondaryStatValue(): string
    {
        return $this->secondaryStatValue;
    }

    /**
     * Set the value of secondaryStatValue
     *
     * @param string $secondaryStatValue
     *
     * @return static
     */
    public function setSecondaryStatValue(string $secondaryStatValue): static
    {
        $this->secondaryStatValue = $secondaryStatValue;

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
