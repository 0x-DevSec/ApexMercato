<?php

require_once __DIR__ . '/../db_connect.php';
require_once __DIR__ . '/../classes/Coach.php';
require_once __DIR__ . '/RepositoryInterface.php';

class CoachRepository implements RepositoryInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function findById(int $id): ?object
    {
        $stmt = $this->pdo->prepare("SELECT * FROM coaches WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Coach(
            $row['name'],
            $row['email'],
            $row['nationality'],
            $row['coaching_style'],
            (int)$row['experience_years'],
            (float)$row['monthly_salary'],
            (float)$row['travel_fees'],
            $row['team_id']
        );
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM coaches");
        $coaches = [];

        while ($row = $stmt->fetch()) {
            $coaches[] = new Coach(
                $row['name'],
                $row['email'],
                $row['nationality'],
                $row['coaching_style'],
                (int)$row['experience_years'],
                (float)$row['monthly_salary'],
                (float)$row['travel_fees'],
                $row['team_id']
            );
        }

        return $coaches;
    }

    public function save(object $entity): bool
    {
        if (!$entity instanceof Coach) {
            throw new InvalidArgumentException('Coach expected');
        }

        $stmt = $this->pdo->prepare(
            "INSERT INTO coaches 
            (name, email, nationality, coaching_style, experience_years, monthly_salary, travel_fees, team_id)
            VALUES
            (:name, :email, :nationality, :coaching_style, :experience_years, :monthly_salary, :travel_fees, :team_id)"
        );

        return $stmt->execute([
            'name' => $entity->getName(),
            'email' => $entity->getEmail(),
            'nationality' => $entity->getNationality(),
            'coaching_style' => $entity->getCoachingStyle(),
            'experience_years' => $entity->getExperienceYears(),
            'monthly_salary' => $entity->getMonthlySalary(),
            'travel_fees' => $entity->getTravelFees(),
            'team_id' => $entity->getTeamId()
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM coaches WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
