<?php

namespace App\Model;

use PDO;
use App\Utils\Database;

/**
 * Category Class
 * 
 * Manage table "worksite" in DB
 * 
 * Herited at CoreModel
 */
class Worksite extends CoreModel
{
    private $name;

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * find method
     *
     * @return Worksite
     */
    public static function find(int $id)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `worksite` WHERE `id` = :id";

        $query = $pdo->prepare($sql);

        $result = $query->execute([
            ":id" => $id
        ]);

        $category = $query->fetchObject(__CLASS__);

        return $category;
    }

    /**
     * find all method
     *
     * @return Worksite[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `worksite`";

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, __CLASS__);

        return $results;
    }

    /**
     * insert method
     *
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "
            INSERT INTO `worksite` (name)
            VALUES (:name)
        ";

        $query = $pdo->prepare($sql);

        $result = $query->execute([
            ":name" => $this->name,
        ]);

        if ($result) {
            $this->id = $pdo->lastInsertId();
            return true;
        }
        return false;
    }


    /**
     * update method
     *
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();

        $sql = "
            UPDATE `worksite`
            SET
                name = :name,
                updated_at = NOW()
            WHERE id = :id
        ";

        $query = $pdo->prepare($sql);

        $result = $query->execute([
            ":name" => $this->name,
            ":id" => $this->id
        ]);

        return ($result > 0);
    }


    /**
     * delete method
     * 
     * @return bool
     */
    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "
            DELETE FROM `worksite`
            WHERE id = :id
        ";

        $query = $pdo->prepare($sql);

        $result = $query->execute([
            ":id" => $this->id
        ]);

        return ($result > 0);
    }
}
