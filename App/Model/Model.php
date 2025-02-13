<?php

namespace App\Model;

use PDO;


abstract class Model
{
    protected $table;

    protected $errors = [];

    private Database $database;

    public function __construct()
    {
        $this->database = new Database(
            "localhost",
            "3306",
            "php2_asm",
            "root",
            "mysql"

        );
        $this->database->getConnection();
    }

    // public function findAll(): array
    // {
    //     $stmt = $this->database->getConnection()->prepare("SELECT * FROM {$this->table}");
    //     $stmt->execute();
    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }

    public function findAll()
    {
        $return = $this->database->getConnection()->query("SELECT * FROM {$this->table}")->fetchAll(\PDO::FETCH_ASSOC);
        if (sizeof($return) > 0) {
            return $return;
        }
        return [];
    }

    public function find(string $id)
    {
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getTable()
    {
        return $this->table;
    }

    protected function validate(array $data)
    {
        if (empty($data)) {
            $this->addErrors("data", "Name is required");
        }
    }

    protected function addErrors(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }


    public function getErrors(): array
    {
        return $this->errors;
    }

    public function insert(array $data)
    {
        $this->validate($data);

        if (!empty($this->errors)) {
            return false;
        }

        $columns = implode(", ", array_keys($data));
        $values = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";

        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);

        $i = 1;

        foreach ($data as $value) {
            $type = match (gettype($value)) {
                "integer" => PDO::PARAM_INT,
                "boolean" => PDO::PARAM_BOOL,
                "NULL" => PDO::PARAM_NULL,
                "string" => PDO::PARAM_STR,
                default => PDO::PARAM_STR
            };
            $stmt->bindValue($i++, $value, $type);
        }

        return $stmt->execute();
    }


    public function update(int $id, array $data): bool
    {
        $this->validate($data);

        if (!empty($this->errors)) {
            return false;
        }

        $sql = "UPDATE {$this->getTable()} ";

        unset($data["id"]);

        $assignment = array_keys($data);

        array_walk($assignment, function (&$value) {
            $value = "$value = ?";
        });

        $sql .= " SET " . implode(", ", $assignment);

        $sql .= " WHERE id = ?";

        $conn = $this->database->getConnection();

        $stmt = $conn->prepare($sql);
        $i = 1;
        foreach ($data as $value) {
            $type = match (gettype($value)) {
                "integer" => PDO::PARAM_INT,
                "boolean" => PDO::PARAM_BOOL,
                "NULL" => PDO::PARAM_NULL,
                "string" => PDO::PARAM_STR, 
                default => PDO::PARAM_STR
            };
            $stmt->bindValue($i++, $value, $type); 
        }
    
        $stmt->bindValue($i, $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }


    public function delete(int $id): bool
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";

        $conn = $this->database->getConnection();

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bindValue(1, $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getInsertID(): string
    {
        $conn = $this->database->getConnection();

        return $conn->lastInsertId();
    }
}
