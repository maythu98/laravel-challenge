<?php

namespace App\Services\EmployeeManagement;

class Staff implements Employee
{
    public function applyJob()
    {
        // TODO: Implement applyJob() method.
        return true;
    }
    
    public function salary(): int
    {
        return 200;
    }
}