<?php

namespace App\Http\Controllers;
use App\Customer;
use Debugbar;
// use Illuminate\Http\Request;

class DebugController extends Controller
{
    public function debug()
    {
        // Debugbar::startMeasure('user_query', 'The Exec ution time of query');
        $customers = Customer::where('name', 'Admin')
                                ->orWhere('name', 'Amit')
                                ->get();
        // Debugbar::stopMeasure( 'user_query');

        

        return view('debug', compact('customers'));
    }
}
