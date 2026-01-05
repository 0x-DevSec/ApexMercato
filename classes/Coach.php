
<?php

require_once 'Person.php';

class Coach extends Person
{
    private float $monthlySalary;
    private float $travelFees;

    public function __construct(
        string $name,
        string $email,
        string $nationality,
        float $monthlySalary,
        float $travelFees
    ) {
        parent::__construct($name, $email, $nationality);
        $this->monthlySalary = $monthlySalary;
        $this->travelFees = $travelFees;
    }

    public function getAnnualCost(): float
    {
        return ($this->monthlySalary * 12) + $this->travelFees;
    }
}
