<?php

namespace App\Model;

class User
{

    private int     $user_id;
    private string  $user_password;
    private string  $user_firstname;
    private string  $user_lastname;
    private string  $user_email;
    private string  $user_created_at;
    private bool    $is_admin;

    /**
     * Get the value of user_id
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId($user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of user_password
     */
    public function getUserPassword()
    {
        return $this->user_password;
    }

    /**
     * Set the value of user_password
     */
    public function setUserPassword($user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }

    /**
     * Get the value of user_firstname
     */
    public function getUserFirstname()
    {
        return $this->user_firstname;
    }

    /**
     * Set the value of user_firstname
     */
    public function setUserFirstname($user_firstname): self
    {
        $this->user_firstname = $user_firstname;

        return $this;
    }

    /**
     * Get the value of user_lastname
     */
    public function getUserLastname()
    {
        return $this->user_lastname;
    }

    /**
     * Set the value of user_lastname
     */
    public function setUserLastname($user_lastname): self
    {
        $this->user_lastname = $user_lastname;

        return $this;
    }

    /**
     * Get the value of user_email
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * Set the value of user_email
     */
    public function setUserEmail($user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }


    /**
     * Get the value of user_created_at
     */
    public function getUserCreatedAt()
    {
        return $this->user_created_at;
    }

    /**
     * Set the value of user_created_at
     */
    public function setUserCreatedAt($user_created_at): self
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
     * @return self
     */
    public function setIsAdmin(bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }
}
