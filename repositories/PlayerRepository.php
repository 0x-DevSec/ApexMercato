<?php

require_once __DIR__ . '/../db_connect.php';
require_once __DIR__ . '/../classes/Player.php';
require_once 'RepositoryInterface.php';

class PlayerRepository implements RepositoryInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function findById(int $id): ?Player
    {
        $stmt = $this->pdo->prepare("SELECT * FROM players WHERE id = ?");
        $stmt->execute([$id]);
        $p = $stmt->fetch();

        if (!$p) return null;

        return new Player(
            $p['id'],
            $p['pseudo'],
            $p['role'],
            (float)$p['market_value'],
            $p['email'],
            $p['nationality'],
            $p['team_id']
        );
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM players");
        $players = [];

        while ($row = $stmt->fetch()) {
            $players[] = new Player(
                $row['id'],
                $row['pseudo'],
                $row['role'],
                (float)$row['market_value'],
                $row['email'],
                $row['nationality'],
                $row['team_id']
            );
        }

        return $players;
    }

    public function save(object $entity): bool
    {
        if (!$entity instanceof Player) {
            throw new InvalidArgumentException("Player expected");
        }

        $stmt = $this->pdo->prepare(
            "INSERT INTO players (pseudo, role, market_value, nationality, email, team_id)
             VALUES (?, ?, ?, ?, ?, ?)"
        );

        return $stmt->execute([
            $entity->pseudo,
            $entity->role,
            $entity->marketValue,
            $entity->nationality,
            $entity->email,
            $entity->teamId
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM players WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
