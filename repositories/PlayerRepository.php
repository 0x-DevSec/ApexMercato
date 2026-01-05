<?php

require_once __DIR__ . '/../db_connect.php';
require_once __DIR__ . '/../classes/Player.php';
require_once __DIR__ . '/RepositoryInterface.php';

class PlayerRepository implements RepositoryInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function findById(int $id): ?object
    {
        $stmt = $this->pdo->prepare("SELECT * FROM players WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Player(
            $row['name'],
            $row['email'],
            $row['nationality'],
            (float) $row['monthly_salary'],
            (float) $row['signing_bonus']
        );
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM players");
        $players = [];

        while ($row = $stmt->fetch()) {
            $players[] = new Player(
                $row['name'],
                $row['email'],
                $row['nationality'],
                (float) $row['monthly_salary'],
                (float) $row['signing_bonus']
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
            "INSERT INTO players
            (name, email, nationality, monthly_salary, signing_bonus, pseudo, role, market_value, team_id)
            VALUES
            (:name, :email, :nationality, :monthly_salary, :signing_bonus, :pseudo, :role, :market_value, :team_id)"
        );

        return $stmt->execute([
            'name' => $entity->getName(),
            'email' => $entity->getEmail(),
            'nationality' => $entity->getNationality(),
            'monthly_salary' => $entity->getMonthlySalary(),
            'signing_bonus' => $entity->getSigningBonus(),

            // competitive metadata (from form / controller)
            'pseudo' => $_POST['pseudo'],
            'role' => $_POST['role'],
            'market_value' => $_POST['market_value'],
            'team_id' => $_POST['team_id'] ?: null
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM players WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
