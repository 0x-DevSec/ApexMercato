<?php

require_once 'Person.php';

class Player extends Person
{
    private float $monthlySalary;
    private float $signingBonus;

    public function __construct(
        string $name,
        string $email,
        string $nationality,
        float $monthlySalary,
        float $signingBonus
    ) {
        parent::__construct($name, $email, $nationality);
        $this->monthlySalary = $monthlySalary;
        $this->signingBonus = $signingBonus;
    }

    public function getAnnualCost(): float
    {
        return ($this->monthlySalary * 12) + $this->signingBonus;
    }
}
