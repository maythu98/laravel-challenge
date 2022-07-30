<?php

namespace App\Services\InternetServiceProvider;

class Ooredoo implements InternetServiceInterface
{
    protected $operator = 'ooredoo';
        
    protected $monthlyFees = 150;

    protected $month  = 0;

    public function setMonth(int $month)
    {
        $this->month = $month;
    }
    
    public function calculateTotalAmount()
    {
        return $this->month * $this->monthlyFees;
    }
}