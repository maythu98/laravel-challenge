<?php

namespace App\Services\EmployeeManagement;

class Applicant implements EmployeeApply
{
    public function applyJob(): bool
    {
        return true;
    }
}