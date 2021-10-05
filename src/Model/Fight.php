<?php

namespace App\Model;

use App\Model\Entity;

class Fight {
    
    // Singleton
    private static Fight $instance;

    protected Entity $opponent1;
    protected Entity $opponent2;
    protected bool $isItOpponent1Turn = True;
    protected int $turn = 1;

    // Il ne doit pas y avoir de constructeur pour un Singleton !
    // public function __construct(
    //     Entity $opponent1,
    //     Entity $opponent2,
    //     bool $isItOpponent1Turn = True,
    //     int $turn = 1
    // ) {
    //     $this->opponent1 = $opponent1;
    //     $this->opponent2 = $opponent2;
    //     $this->isItOpponent1Turn = $isItOpponent1Turn;
    //     $this->turn = $turn;
    // }

    public function nextTurn() {
        $this->turn++;
        $this->isItOpponent1Turn = !$this->isItOpponent1Turn;
        return;
    }

    public function whoIsWinning() {
        if ($this->opponent1->getHealth() <= 0) {
            return 2;
        } else if ($this->opponent2->getHealth() <= 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function endFight() {
        // Todo?
        return;
    }

    // Singleton
    public static function getInstance(): Fight
    {
        return self::$instance ?? self::$instance = new Fight();
    }


    /**
     * Get the value of opponent1
     *
     * @return Entity
     */
    public function getOpponent1(): Entity
    {
        return $this->opponent1;
    }

    /**
     * Set the value of opponent1
     *
     * @param Entity $opponent1
     *
     * @return static
     */
    public function setOpponent1(Entity $opponent1): static
    {
        $this->opponent1 = $opponent1;

        return $this;
    }

    /**
     * Get the value of opponent2
     *
     * @return Entity
     */
    public function getOpponent2(): Entity
    {
        return $this->opponent2;
    }

    /**
     * Set the value of opponent2
     *
     * @param Entity $opponent2
     *
     * @return static
     */
    public function setOpponent2(Entity $opponent2): static
    {
        $this->opponent2 = $opponent2;

        return $this;
    }

    /**
     * Get the value of isItOpponent1Turn
     *
     * @return bool
     */
    public function getIsItOpponent1Turn(): bool
    {
        return $this->isItOpponent1Turn;
    }

    /**
     * Set the value of isItOpponent1Turn
     *
     * @param bool $isItOpponent1Turn
     *
     * @return static
     */
    public function setIsItOpponent1Turn(bool $isItOpponent1Turn): static
    {
        $this->isItOpponent1Turn = $isItOpponent1Turn;

        return $this;
    }

    /**
     * Get the value of turn
     *
     * @return int
     */
    public function getTurn(): int
    {
        return $this->turn;
    }

    /**
     * Set the value of turn
     *
     * @param int $turn
     *
     * @return static
     */
    public function setTurn(int $turn): static
    {
        $this->turn = $turn;

        return $this;
    }
}
