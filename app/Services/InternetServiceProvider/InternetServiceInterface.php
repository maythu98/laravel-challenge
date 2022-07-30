<?php

namespace App\Services\InternetServiceProvider;

interface InternetServiceInterface
{
    public function setMonth(int $month);
    
    public function calculateTotalAmount();  
}