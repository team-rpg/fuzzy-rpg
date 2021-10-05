<?php

namespace App\Dao;

use PDO;
use App\Dao\AbstractDao;

use App\Model\Archer;
use App\Model\Mage;
use App\Model\Warrior;

use App\Model\Bow;
use App\Model\Staff;
use App\Model\Sword;

use App\Model\BodyArmor;
use App\Model\Character;
use App\Model\Helmet;

class CharacterDao extends AbstractDao {

    public function checkCharacterByName(string $name): bool {

        return false;
    }

    public function getAllCharacters(): array {

        $reqCharacter = $this->pdo->prepare("SELECT * FROM `character` INNER JOIN classe ON classe.class_id = `character`.class_id");
        $reqCharacter->execute([]);

        $charactersData = $reqCharacter->fetchAll(PDO::FETCH_ASSOC);

        $characters = [];

        foreach ($charactersData as $characterData) {
            $reqArmor = $this->pdo->prepare("SELECT * FROM armor INNER JOIN character_armor ON character_armor.armor_id = armor.armor_id WHERE character_id = :id");
            $reqArmor->execute([
                ":id" => $characterData['character_id']
            ]);
    
            $reqWeapon = $this->pdo->prepare("SELECT * FROM weapon INNER JOIN character_weapon ON character_weapon.weapon_id = weapon.weapon_id WHERE character_id = :id");
            $reqWeapon->execute([
                ":id" => $characterData['character_id']
            ]);

            $charactersArmorData = $reqArmor->fetchAll(PDO::FETCH_ASSOC);
            $charactersWeaponData = $reqWeapon->fetchAll(PDO::FETCH_ASSOC);

            $characterEquipmentsArray = [];
            
            foreach ($charactersArmorData as $characterArmor) {
                switch ($characterArmor['armor_type']) {
                    case 'Helmet':
                        $armor = new Helmet();
                        break;                    
                    case 'Body':
                        $armor = new BodyArmor();
                        break;
                    default:
                        # code...
                        break;
                }
                $armor  ->setName($characterArmor['armor_name'])
                        ->setDefense($characterArmor['armor_defense'])
                        ->setType("Armor")
                        ->setSubType($characterArmor['armor_type']);

                array_push($characterEquipmentsArray, $armor);
            }

            foreach ($charactersWeaponData as $characterWeapon) {
                
                switch ($characterWeapon['weapon_type']) {
                    case 'Sword':
                        $weapon = new Sword();
                        break;
                    case 'Staff':
                        $weapon = new Staff();
                        break;
                    case 'Bow':
                        $weapon = new Bow();
                        break;
                    default:
                        # code...
                        break;
                }
                $weapon ->setName($characterWeapon['weapon_name'])
                        ->setDamage((int)$characterWeapon['weapon_dmg'])
                        ->setType("Weapon")
                        ->setSubType($characterWeapon['weapon_type']);

                array_push($characterEquipmentsArray, $weapon);
            }

            switch ($characterData['class_name']) {
                case 'Guerrier':
                    $character = new Warrior();
                    $character->setRage($characterData['character_secondary_stat']);
                    break;
                case 'Mage':
                    $character = new Mage();
                    $character->setMana($characterData['character_secondary_stat']);
                    break;
                case 'Archer':
                    $character = new Archer();
                    $character->setEnergy($characterData['character_secondary_stat']);
                    break;
                default:
                    # code...
                    break;
            }

            $character  ->setName($characterData['character_nickname'])
                        ->setHealth($characterData['character_health'])
                        ->setLevel($characterData['character_level'])
                        ->setMoney($characterData['character_money'])
                        ->setEquipment($characterEquipmentsArray)
                        ->setSecondaryStatName($characterData['class_secondary_stat'])
                        ->setSecondaryStatValue($characterData['character_secondary_stat'])
                        ->setXp($characterData['character_xp'])
                        ->setClassName((string)$characterData['class_name'])
                        ->setId($characterData['character_id']);

            array_push($characters, $character);
        }
        return $characters;
    }

    public function getCharacterById(int $id): Character {


        $reqCharacter = $this->pdo->prepare("SELECT * FROM `character` INNER JOIN classe ON classe.class_id = `character`.class_id WHERE `character`.character_id = :id");
        $reqCharacter->execute([
            ":id" => $id
        ]);

        $characterData = $reqCharacter->fetch(PDO::FETCH_ASSOC);

            $reqArmor = $this->pdo->prepare("SELECT * FROM armor INNER JOIN character_armor ON character_armor.armor_id = armor.armor_id WHERE character_id = :id");
            $reqArmor->execute([
                ":id" => $characterData['character_id']
            ]);
    
            $reqWeapon = $this->pdo->prepare("SELECT * FROM weapon INNER JOIN character_weapon ON character_weapon.weapon_id = weapon.weapon_id WHERE character_id = :id");
            $reqWeapon->execute([
                ":id" => $characterData['character_id']
            ]);

            $charactersArmorData = $reqArmor->fetchAll(PDO::FETCH_ASSOC);
            $charactersWeaponData = $reqWeapon->fetchAll(PDO::FETCH_ASSOC);

            $characterEquipmentsArray = [];
            
            foreach ($charactersArmorData as $characterArmor) {
                switch ($characterArmor['armor_type']) {
                    case 'Helmet':
                        $armor = new Helmet();
                        break;                    
                    case 'Body':
                        $armor = new BodyArmor();
                        break;
                    default:
                        # code...
                        break;
                }
                $armor  ->setName($characterArmor['armor_name'])
                        ->setDefense($characterArmor['armor_defense'])
                        ->setType("Armor")
                        ->setSubType($characterArmor['armor_type']);

                array_push($characterEquipmentsArray, $armor);
            }

            foreach ($charactersWeaponData as $characterWeapon) {
                
                switch ($characterWeapon['weapon_type']) {
                    case 'Sword':
                        $weapon = new Sword();
                        break;
                    case 'Staff':
                        $weapon = new Staff();
                        break;
                    case 'Bow':
                        $weapon = new Bow();
                        break;
                    default:
                        # code...
                        break;
                }
                $weapon ->setName($characterWeapon['weapon_name'])
                        ->setDamage((int)$characterWeapon['weapon_dmg'])
                        ->setType("Weapon")
                        ->setSubType($characterWeapon['weapon_type']);

                array_push($characterEquipmentsArray, $weapon);
            }

            switch ($characterData['class_name']) {
                case 'Guerrier':
                    $character = new Warrior();
                    $character->setRage($characterData['character_secondary_stat']);
                    break;
                case 'Mage':
                    $character = new Mage();
                    $character->setMana($characterData['character_secondary_stat']);
                    break;
                case 'Archer':
                    $character = new Archer();
                    $character->setEnergy($characterData['character_secondary_stat']);
                    break;
                default:
                    # code...
                    break;
            }

            $character  ->setName($characterData['character_nickname'])
                        ->setHealth($characterData['character_health'])
                        ->setLevel($characterData['character_level'])
                        ->setMoney($characterData['character_money'])
                        ->setEquipment($characterEquipmentsArray)
                        ->setSecondaryStatName($characterData['class_secondary_stat'])
                        ->setSecondaryStatValue($characterData['character_secondary_stat'])
                        ->setXp($characterData['character_xp'])
                        ->setClassName((string)$characterData['class_name'])
                        ->setId($characterData['character_id']);

        return $character;
    }

    public function getAllCharactersName(): array {

        $charactersData = $this->pdo->query("SELECT character_nickname FROM `character`");

        return $charactersData->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllUserCharacters(int $id): array {

        $reqCharacter = $this->pdo->prepare("SELECT * FROM `character` INNER JOIN classe ON classe.class_id = `character`.class_id WHERE user_id = :id");
        $reqCharacter->execute([
            ":id" => $id
        ]);

        $charactersData = $reqCharacter->fetchAll(PDO::FETCH_ASSOC);

        $characters = [];

        foreach ($charactersData as $characterData) {
            $reqArmor = $this->pdo->prepare("SELECT * FROM armor INNER JOIN character_armor ON character_armor.armor_id = armor.armor_id WHERE character_id = :id");
            $reqArmor->execute([
                ":id" => $characterData['character_id']
            ]);
    
            $reqWeapon = $this->pdo->prepare("SELECT * FROM weapon INNER JOIN character_weapon ON character_weapon.weapon_id = weapon.weapon_id WHERE character_id = :id");
            $reqWeapon->execute([
                ":id" => $characterData['character_id']
            ]);

            $charactersArmorData = $reqArmor->fetchAll(PDO::FETCH_ASSOC);
            $charactersWeaponData = $reqWeapon->fetchAll(PDO::FETCH_ASSOC);

            $characterEquipmentsArray = [];
            
            foreach ($charactersArmorData as $characterArmor) {
                switch ($characterArmor['armor_type']) {
                    case 'Helmet':
                        $armor = new Helmet();
                        break;                    
                    case 'Body':
                        $armor = new BodyArmor();
                        break;
                    default:
                        # code...
                        break;
                }
                $armor  ->setName($characterArmor['armor_name'])
                        ->setDefense($characterArmor['armor_defense'])
                        ->setType("Armor")
                        ->setSubType($characterArmor['armor_type']);

                array_push($characterEquipmentsArray, $armor);
            }

            foreach ($charactersWeaponData as $characterWeapon) {
                
                switch ($characterWeapon['weapon_type']) {
                    case 'Sword':
                        $weapon = new Sword();
                        break;
                    case 'Staff':
                        $weapon = new Staff();
                        break;
                    case 'Bow':
                        $weapon = new Bow();
                        break;
                    default:
                        # code...
                        break;
                }
                $weapon ->setName($characterWeapon['weapon_name'])
                        ->setDamage((int)$characterWeapon['weapon_dmg'])
                        ->setType("Weapon")
                        ->setSubType($characterWeapon['weapon_type']);

                array_push($characterEquipmentsArray, $weapon);
            }

            switch ($characterData['class_name']) {
                case 'Guerrier':
                    $character = new Warrior();
                    $character->setRage($characterData['character_secondary_stat']);
                    break;
                case 'Mage':
                    $character = new Mage();
                    $character->setMana($characterData['character_secondary_stat']);
                    break;
                case 'Archer':
                    $character = new Archer();
                    $character->setEnergy($characterData['character_secondary_stat']);
                    break;
                default:
                    # code...
                    break;
            }

            $character  ->setName($characterData['character_nickname'])
                        ->setHealth($characterData['character_health'])
                        ->setLevel($characterData['character_level'])
                        ->setMoney($characterData['character_money'])
                        ->setEquipment($characterEquipmentsArray)
                        ->setSecondaryStatName($characterData['class_secondary_stat'])
                        ->setSecondaryStatValue($characterData['character_secondary_stat'])
                        ->setXp($characterData['character_xp'])
                        ->setClassName((string)$characterData['class_name'])
                        ->setId($characterData['character_id']);

            array_push($characters, $character);
        }
        return $characters;
    }

    public function getClassesName(): array {

        $classesData = $this->pdo->query("SELECT * from classe");

        return $classesData->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCharacter(string $character_nickname, int $class_id, int $user_id): void {

        $characterHealth = 0;

        switch ($class_id) {
            // Warrior
            case '1':
                $characterHealth = 100;
                break;
            
            // Mage
            case '2':
                $characterHealth = 80;
                break;

            // Archer
            case '3':
                $characterHealth = 90;
                break;

            default:
                # code...
                break;
        }

        $newCharacter = $this->pdo->prepare("INSERT INTO `character` (character_health, character_nickname, user_id, class_id) VALUES (:character_health, :character_nickname, :user_id, :class_id)");
        $newCharacter->execute(array(
            ":character_health" => $characterHealth,
            ":character_nickname" => $character_nickname,
            ":user_id" => $user_id,
            ":class_id" => $class_id
        ));
    }

    public function getCharacterArmors(int $characterId): array {

        $characterArmors = $this->pdo->prepare("SELECT * FROM character_armor WHERE character_id = :character_id");
        $characterArmors->execute(array(
            ":character_id" => $characterId
        ));

        return $characterArmors->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCharacterWeapons(int $characterId): array {

        $characterWeapons = $this->pdo->prepare("SELECT * FROM character_weapon WHERE character_id = :character_id");
        $characterWeapons->execute(array(
            ":character_id" => $characterId
        ));

        return $characterWeapons->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCharacter(int $characterId): bool {

        $characterArmors = (new CharacterDao())->getCharacterArmors($characterId);
        $characterWeapons = (new CharacterDao())->getCharacterWeapons($characterId);

        //array_key_exists($characterArmors) ou count($characterArmors);

        if(!empty($characterArmors)) {
            $req = $this->pdo->prepare("DELETE FROM character_armor WHERE character_id = :character_id");
            $req->execute(array(
                ":character_id" => $characterId
            ));
        }

        if(!empty($characterWeapons)) {
            $req = $this->pdo->prepare("DELETE FROM character_weapon WHERE character_id = :character_id");
            $req->execute(array(
                ":character_id" => $characterId
            ));
        }

        $req = $this->pdo->prepare("DELETE FROM `character` WHERE character_id = :character_id");
        $req->execute(array(
            ":character_id" => $characterId
        ));

        return true;
    }
}