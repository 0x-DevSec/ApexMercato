<?php

require_once __DIR__ . '/../db_connect.php';
require_once __DIR__ . '/../classes/Team.php';
require_once 'RepositoryInterface.php';

class TeamRepository implements RepositoryInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function findById(int $id): ?Team
    {
        $stmt = $this->pdo->prepare("SELECT * FROM teams WHERE id = ?");
        $stmt->execute([$id]);
        $t = $stmt->fetch();

        if (!$t) return null;

        return new Team(
            $t['id'],
            $t['name'],
            (float)$t['budget'],
            $t['manager_name']
        );
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM teams");
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
            "INSERT INTO teams (name, budget, manager_name) VALUES (?, ?, ?)"
        );

        return $stmt->execute([
            $entity->name,
            $entity->getBudget(),
            $entity->managerName
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM teams WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
