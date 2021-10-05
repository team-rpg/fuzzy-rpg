<?php

namespace App\Model;

use App\Model\Equipment;

abstract class Entity implements EntityInterface
{
    const WEAPONCLASSNAME = "App\Model\Weapon";
    const ARMORCLASSNAME = "App\Model\Armor";
    protected string $name;
    protected int $health;
    protected int $level;
    protected array $equipment;
    protected int $money;

    public function attack(Entity $enemy): void
    {
        // var_dump($this);
        foreach ($this->equipment as $item) {
            // TODO: only if is equipped:  && $item->getIsEquipped()
            if (get_parent_class($item) == Entity::WEAPONCLASSNAME) {
                
                $enemy->takeDamage($item->getDamage());
                break;
            }
        }

        return;
    }
    public function takeDamage(int $damage): void
    {
        $armure = 0;
        foreach ($this->equipment as $item) {
            //TODO: only if is equipped:  && $item->getIsEquipped()
            if (get_parent_class($item) == Entity::ARMORCLASSNAME) {
                $armure = $armure + $item->getDefense();
                break;
            }
        }
        $this->health = $this->health - (max([$damage - $armure, 0]));
        $this->health = max([$this->health, 0]);
        return;
    }
    
    public function loot(): Equipment
    {
        $equipment = new Equipment();

        return $equipment;
    }

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
     * Get the value of health
     *
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * Set the value of health
     *
     * @param int $health
     *
     * @return static
     */
    public function setHealth(int $health): static
    {
        $this->health = $health;

        return $this;
    }

    /**
     * Get the value of level
     *
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * Set the value of level
     *
     * @param int $level
     *
     * @return static
     */
    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get the value of equipment
     *
     * @return array
     */
    public function getEquipment(): array
    {
        return $this->equipment;
    }

    /**
     * Set the value of equipment
     *
     * @param array $equipment
     *
     * @return static
     */
    public function setEquipment(array $equipment): static
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * Get the value of money
     *
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }

    /**
     * Set the value of money
     *
     * @param int $money
     *
     * @return static
     */
    public function setMoney(int $money): static
    {
        $this->money = $money;

        return $this;
    }
}
