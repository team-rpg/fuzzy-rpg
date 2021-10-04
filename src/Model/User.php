<?php

namespace App\Model;

class User
{
    private int     $user_id;
    private string  $user_firstname;
    private string  $user_lastname;
    private string  $user_email;
    private string  $user_password;
    private string  $user_created_at;
    private bool    $is_admin;

    /**
     * Get the value of user_id
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @param int $user_id
     *
     * @return static // Sert à retourner un objet de la classe en elle même et pas d'une instance de classe
     */
    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of user_firstname
     *
     * @return string
     */
    public function getUserFirstname(): string
    {
        return $this->user_firstname;
    }

    /**
     * Set the value of user_firstname
     *
     * @param string $user_firstname
     *
     * @return static
     */
    public function setUserFirstname(string $user_firstname): static
    {
        $this->user_firstname = $user_firstname;

        return $this;
    }

    /**
     * Get the value of user_lastname
     *
     * @return string
     */
    public function getUserLastname(): string
    {
        return $this->user_lastname;
    }

    /**
     * Set the value of user_lastname
     *
     * @param string $user_lastname
     *
     * @return static
     */
    public function setUserLastname(string $user_lastname): static
    {
        $this->user_lastname = $user_lastname;

        return $this;
    }

    /**
     * Get the value of user_email
     *
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->user_email;
    }

    /**
     * Set the value of user_email
     *
     * @param string $user_email
     *
     * @return static
     */
    public function setUserEmail(string $user_email): static
    {
        $this->user_email = $user_email;

        return $this;
    }

    /**
     * Get the value of user_password
     *
     * @return string
     */
    public function getUserPassword(): string
    {
        return $this->user_password;
    }

    /**
     * Set the value of user_password
     *
     * @param string $user_password
     *
     * @return static
     */
    public function setUserPassword(string $user_password): static
    {
        $this->user_password = $user_password;

        return $this;
    }

    /**
     * Get the value of user_created_at
     *
     * @return string
     */
    public function getUserCreatedAt(): string
    {
        return $this->user_created_at;
    }

    /**
     * Set the value of user_created_at
     *
     * @param string $user_created_at
     *
     * @return static
     */
    public function setUserCreatedAt(string $user_created_at): static
    {
        $this->user_created_at = $user_created_at;

        return $this;
    }

    /**
     * Get the value of is_admin
     *
     * @return bool
     */
    public function getIsAdmin(): bool
    {
        return $this->is_admin;
    }

    /**
     * Set the value of is_admin
     *
     * @param bool $is_admin
     *
     * @return static
     */
    public function setIsAdmin(bool $is_admin): static
    {
        $this->is_admin = $is_admin;

        return $this;
    }
}
