<?php

namespace App\Factory;

use App\Services\InternetServiceProvider\Mpt;
use App\Services\InternetServiceProvider\Ooredoo;
use Carbon\Exceptions\InvalidTypeException;

class InternetServiceFactory
{
    public static function make($type, $token = null)
    {
        switch ($type) {
            case 'mpt':
                return new Mpt();

            case 'ooredoo':
                return new Ooredoo();
            
            default:
                throw new InvalidTypeException("Invalid type code.");
        }
    }
}
