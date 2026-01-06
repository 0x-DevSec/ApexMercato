<?php

require_once __DIR__ . '/../db_connect.php';
require_once __DIR__ . '/../classes/Team.php';
require_once __DIR__ . '/RepositoryInterface.php';

class TeamRepository implements RepositoryInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function findById(int $id): ?object
    {
        $stmt = $this->pdo->prepare("SELECT * FROM teams WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        if (!$row) return null;

        return new Team(
            $row['id'],
            $row['name'],
            (float)$row['budget'],
            $row['manager_name']
        );
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM teams ORDER BY name");
        $teams = [];

        while ($row = $stmt->fetch()) {
            $teams[] = new Team(
                $row['id'],
                $row['name'],
                (float)$row['budget'],
                $row['manager_name']
            );
        }

        return $teams;
    }

    public function save(object $entity): bool
    {
        if (!$entity instanceof Team) {
            throw new InvalidArgumentException("Team expected");
        }

        $stmt = $this->pdo->prepare(
            "INSERT INTO teams (name, budget, manager_name)
             VALUES (:name, :budget, :manager)"
        );

        return $stmt->execute([
            'name' => $entity->getName(),
            'budget' => $entity->getBudget(),
            'manager' => $entity->getManagerName()
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM teams WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
