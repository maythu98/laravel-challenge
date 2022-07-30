<?php

namespace App\Services\InternetServiceProvider;

class Mpt implements InternetServiceInterface
{
    protected $operator = 'mpt';

    protected $monthlyFees = 200;  

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