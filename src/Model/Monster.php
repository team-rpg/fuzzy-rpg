<?php

namespace App\Model;

class Monster extends Entity
{
    protected int $monsterDmg;
    protected int $monsterDef;
    protected int $id;
    protected string $desc;
    protected int    $categoryId;
    protected string $picture;
    protected string $categoryName;
    protected string $categoryDesc;
    protected int $xp;

    public function attack(Entity $character): void {
        $character->takeDamage($this->monsterDmg);
    }

    public function takeDamage(int $damage): void {
        
        $this->health = $this->health - (max([$damage - ($this->monsterDef), 0]));
        $this->health = max([$this->health, 0]);
    }


    /**
     * Get the value of MonterDmg
     *
     * @return int
     */
    public function getMonsterDmg(): int
    {
        return $this->monsterDmg;
    }

    /**
     * Set the value of MonterDmg
     *
     * @param int $MonterDmg
     *
     * @return static
     */
    public function setMonsterDmg(int $monsterDmg): static
    {
        $this->monsterDmg = $monsterDmg;

        return $this;
    }

    /**
     * Get the value of MonsterDef
     *
     * @return int
     */
    public function getMonsterDef(): int
    {
        return $this->monsterDef;
    }

    /**
     * Set the value of MonsterDef
     *
     * @param int $MonsterDef
     *
     * @return static
     */
    public function setMonsterDef(int $monsterDef): static
    {
        $this->monsterDef = $monsterDef;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int
     *
     * @return static
     */
    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of desc
     *
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * Set the value of desc
     *
     * @param string $desc
     *
     * @return static
     */
    public function setDesc(string $desc): static
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get the value of categoryId
     *
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * Set the value of categoryId
     *
     * @param int 
     *
     * @return static
     */
    public function setCategoryId(int $categoryId): static
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get the value of picture
     *
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @param string $picture
     *
     * @return static
     */
    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }


    /**
     * Get the value of categoryDesc
     *
     * @return string
     */
    public function getCategoryDesc(): string
    {
        return $this->categoryDesc;
    }

    /**
     * Set the value of categoryDesc
     *
     * @param string $categoryDesc
     *
     * @return static
     */
    public function setCategoryDesc(string $categoryDesc): static
    {
        $this->categoryDesc = $categoryDesc;

        return $this;
    }

    /**
     * Get the value of categoryName
     *
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    /**
     * Set the value of categoryName
     *
     * @param string $categoryName
     *
     * @return static
     */
    public function setCategoryName(string $categoryName): static
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get the value of xp
     *
     * @return int
     */
    public function getXp(): int
    {
        return $this->xp;
    }

    /**
     * Set the value of xp
     *
     * @param int $xp
     *
     * @return self
     */
    public function setXp(int $xp): self
    {
        $this->xp = $xp;

        return $this;
    }
}
