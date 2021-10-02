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
use App\Model\Helmet;

class CharacterDao extends AbstractDao {

    public function getAllUserCharacters(int $id): array {

        $reqCharacter = $this->pdo->prepare("SELECT * FROM `character` INNER JOIN classe ON classe.class_id = `character`.class_id WHERE user_id = :id");
        $reqCharacter->execute([
            ":id" => $id
        ]);

        $charactersData = $reqCharacter->fetchAll(PDO::FETCH_ASSOC);

        $characters = [];

        foreach ($charactersData as $key) {
            $reqArmor = $this->pdo->prepare("SELECT * FROM armor INNER JOIN character_armor ON character_armor.armor_id = armor.armor_id WHERE character_id = :id");
            $reqArmor->execute([
                ":id" => $key['character_id']
            ]);
    
            $reqWeapon = $this->pdo->prepare("SELECT * FROM weapon INNER JOIN character_weapon ON character_weapon.weapon_id = weapon.weapon_id WHERE character_id = :id");
            $reqWeapon->execute([
                ":id" => $key['character_id']
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
                    case '1':
                        $weapon = new Sword();
                        break;
                    case '2':
                        $weapon = new Staff();
                        break;
                    case '3':
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

            switch ($key['class_name']) {
                case 'Guerrier':
                    $character = new Warrior();
                    $character->setRage($key['character_secondary_stat']);
                    break;
                case 'Mage':
                    $character = new Mage();
                    $character->setMana($key['character_secondary_stat']);
                    break;
                case 'Archer':
                    $character = new Archer();
                    $character->setEnergy($key['character_secondary_stat']);
                    break;
                default:
                    # code...
                    break;
            }

            $character  ->setName($key['character_nickname'])
                        ->setHealth($key['character_health'])
                        ->setLevel($key['character_level'])
                        ->setMoney($key['character_money'])
                        ->setEquipment($characterEquipmentsArray)
                        // ->setSecondaryStat($key['character_secondary_stat'])
                        // ->setXp($key['character_xp'])
                        ->setClassName((string)$key['class_name']);
                        // ->setId($key['character_id'])

            array_push($characters, $character);
        }

        return $characters;
    }

    public function deleteUserCharacter(): void {}
}