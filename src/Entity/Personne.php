<?php

abstract class Person
{
    protected string $name;
    protected string $email;
    protected string $nationality;

    public function __construct(string $name, string $email, string $nationality)
    {
        $this->name = $name;
        $this->email = $email;
        $this->nationality = $nationality;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getNationality(): string
    {
        return $this->nationality;
    }

 
    abstract public function getAnnualCost(): float;
}
