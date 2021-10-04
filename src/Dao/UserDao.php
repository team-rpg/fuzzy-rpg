<?php

namespace App\Dao;

use PDO;
use App\Model\User;

class UserDao extends AbstractDao
{
    public function getAllUsers(): array
    {
        // Récupération tous les users
        $request = $this->pdo->query("SELECT * FROM user");
        
        // Il faut que les arguments de classe aient les mêmes
        // noms que ceux dans la base de donnée !
        return $request->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public function getUserById(int $id): ?User
    {

        $request = $this->pdo->prepare("SELECT * FROM user WHERE user_id = :id");
        $request->execute([
            ":id" => $id
        ]);

        return $request->fetchObject(User::class);
    }

    public function getUserByEmail(string $email) : bool|User|null {

        $request = $this->pdo->prepare("SELECT * FROM user WHERE user_email = :email");
        $request->execute([
            ":email" => $email
        ]);
        return $request->fetchObject(User::class);
    }

    public function newUser(User $user): int
    {
        $req = $this->pdo->prepare("INSERT INTO user (user_firstname, user_lastname, user_email, user_password) 
        VALUES (:user_firstname, :user_lastname, :user_email, :user_password)");
        $req->execute([
            ":user_firstname" => $user->getUserFirstname(),
            ":user_lastname" => $user->getUserLastname(),
            ":user_email" => $user->getUserEmail(),
            ":user_password" => password_hash($user->getUserPassword(), PASSWORD_DEFAULT)
        ]);

        return $this->pdo->lastInsertId();
    }

    public function editUser(User $user): void
    {
        $req = $this->pdo->prepare("UPDATE user
                            SET user_firstname = :user_firstname, user_lastname = :user_lastname, user_email = :user_email, user_password = :user_password
                            WHERE id = :id");
        $req->execute([
            ":user_firstname" => $user->getUserFirstname(),
            ":user_lastname" => $user->getUserLastname(),
            ":user_email" => $user->getUserEmail(),
            ":user_password" => password_hash($user->getUserPassword(), PASSWORD_DEFAULT)

        ]);
    }

    // Requete delete user ?
    public function deleteUser(int $id): void
    {
        $req = $this->pdo->prepare("DELETE FROM user WHERE user_id = :id");
        $req->execute([
            ":id" => $id
        ]);
    }
}
