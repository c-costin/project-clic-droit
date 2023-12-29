<?php

namespace App\Model;

use PDO;
use App\Utils\Database;

class ServiceWorksiteModel extends CoreModel
{
    private $value;
    private $month;

    /**
     * Get the value of value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     */
    public function setValue($value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of month
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set the value of month
     */
    public function setMonth($month): self
    {
        $this->month = $month;

        return $this;
    }

    /**
     * find method
     *
     * @return Service
     */
    public static function find(int $id)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `service_worksite` WHERE `id` = :id";

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
     * @return Service[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `service_worksite`";

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
            INSERT INTO `service` (value, month)
            VALUES (:value, :month)
        ";

        $query = $pdo->prepare($sql);

        $result = $query->execute([
            ":value" => $this->value,
            ":month" => $this->month,
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
            UPDATE `service_worksite`
            SET
                value = :value,
                month = :month,
                updated_at = NOW()
            WHERE id = :id
        ";

        $query = $pdo->prepare($sql);

        $result = $query->execute([
            ":value" => $this->value,
            ":month" => $this->month,
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
            DELETE FROM `service_worksite`
            WHERE id = :id
        ";

        $query = $pdo->prepare($sql);

        $result = $query->execute([
            ":id" => $this->id
        ]);

        return ($result > 0);
    }
}