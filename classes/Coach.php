<?php

require_once 'Person.php';

class Coach extends Person
{
    private string $coachingStyle;
    private int $experienceYears;
    private float $monthlySalary;
    private float $travelFees;
    private ?int $teamId;

    public function __construct(
        string $name,
        string $email,
        string $nationality,
        string $coachingStyle,
        int $experienceYears,
        float $monthlySalary,
        float $travelFees,
        ?int $teamId = null
    ) {
        parent::__construct($name, $email, $nationality);
        $this->coachingStyle = $coachingStyle;
        $this->experienceYears = $experienceYears;
        $this->monthlySalary = $monthlySalary;
        $this->travelFees = $travelFees;
        $this->teamId = $teamId;
    }

    public function getCoachingStyle(): string
    {
        return $this->coachingStyle;
    }

    public function getExperienceYears(): int
    {
        return $this->experienceYears;
    }

    public function getMonthlySalary(): float
    {
        return $this->monthlySalary;
    }

    public function getTravelFees(): float
    {
        return $this->travelFees;
    }

    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    public function getAnnualCost(): float
    {
        return ($this->monthlySalary * 12) + $this->travelFees;
    }
}
