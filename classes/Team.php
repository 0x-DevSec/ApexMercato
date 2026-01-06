<?php

class Team
{
    private ?int $id;
    private string $name;
    private float $budget;
    private string $managerName;

    public function __construct(
        ?int $id,
        string $name,
        float $budget,
        string $managerName
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->budget = $budget;
        $this->managerName = $managerName;
    }

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBudget(): float
    {
        return $this->budget;
    }

    public function getManagerName(): string
    {
        return $this->managerName;
    }

 
    public function canAfford(float $amount): bool
    {
        return $this->budget >= $amount;
    }

    public function decreaseBudget(float $amount): void
    {
        if (!$this->canAfford($amount)) {
            throw new Exception("Budget insuffisant");
        }
        $this->budget -= $amount;
    }

    public function increaseBudget(float $amount): void
    {
        $this->budget += $amount;
    }
}
