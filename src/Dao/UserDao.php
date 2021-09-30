<?php

namespace App\Dao;

use PDO;
use App\Model\User;

class UserDao
{
    public function getAllUsers(): array
    {
        // Récupération tous les users
        $request = $this->pdo->prepare("SELECT * FROM user");
        $request->execute();
        $users = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $key => $user) {
            $users[$key] = (new User())->setUserId($user['user_id'])
                ->setUserPassword($user['user_password'])
                ->setUserFirstname($user['user_firstname'])
                ->setUserLastname($user['user_lastname'])
                ->setUserEmail($user['user_email'])
                ->setUserCreatedAt($user['user_created_at']);
        }

        return $users;
    }

    public function getUserById(int $id): ?user
    {

        $request = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $request->execute([
            ":id" => $id
        ]);
        $user = $request->fetch(PDO::FETCH_ASSOC);

        // Parser les données récupérer
        // et instancier un nouvel Article
        // qu'on retourne avec les données récupérées
        if (!empty($user)) {
            return (new User())->setUserId($user['user_id'])
                ->setUserPassword($user['user_password'])
                ->setUserFirstname($user['user_firstname'])
                ->setUserLastname($user['user_lastname'])
                ->setUserEmail($user['user_email'])
                ->setUserCreatedAt($user['user_created_at']);
        } else {
            return null;
        }
    }

    public function newUser(User $user): int
    {
        $req = $this->pdo->prepare(
            "INSERT INTO user (user_password, user_firstname, user_lastname, user_email)
            VALUES (:user_password, :user_firstname, :user_lastname, user_email)"
        );
        $req->execute([
            ":user_password" => $user->getUserPassword(),
            ":user_firstname" => $user->getUserFirstname(),
            ":user_lastname" => $user->getUserLastname(),
            ":user_email" => $user->getUserEmail()
        ]);

        return $this->pdo->lastInsertId();
    }

    public function editUser(User $user): void
    {
        $req = $this->pdo->prepare("UPDATE user
                            SET user_password = :user_password, user_firstname = :user_firstname, user_lastname = :user_lastname, user_email = :user_email
                            WHERE id = :id");
        $req->execute([
            ":user_password" => $user->getUserPassword(),
            ":user_firstname" => $user->getUserFirstname(),
            ":user_lastname" => $user->getUserLastname(),
            ":user_email" => $user->getUserEmail()

        ]);
    }

    public function deleteUser(int $id): void
    {
        $req = $this->pdo->prepare("DELETE FROM user WHERE id = :id");
        $req->execute([
            ":id" => $id
        ]);
    }
}
