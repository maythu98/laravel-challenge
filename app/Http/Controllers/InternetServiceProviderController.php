<?php

namespace App\Http\Controllers;

use App\Factory\InternetServiceFactory;
use App\Services\InternetServiceProvider\Mpt;
use App\Services\InternetServiceProvider\Ooredoo;
use Illuminate\Http\Request;

class InternetServiceProviderController extends Controller
{
    public function getInvoiceAmount(Request $request, $service)
    {
        $provider = InternetServiceFactory::make($service);

        $provider->setMonth($request->get('month') ?: 1);
        
        return response()->json([
            'data' => $provider->calculateTotalAmount()
        ]);
    }
}
