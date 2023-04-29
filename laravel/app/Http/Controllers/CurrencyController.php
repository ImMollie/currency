<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurrencyController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Currency::class);
        $currency = Currency::get();        
        return Inertia::render('Dashboard',[
            'currencies' => $currency
        ]);
    }
    public function add(Request $request)
    { 
        $this->authorize('viewAny', Currency::class);
        $todayCurrencies = Currency::getTodayCurrencies($request->abbreviation); 
        if($todayCurrencies->count() == 0){
            Currency::create($request->abbreviation, $request->amount);        
        }
    } 
    public function search(Request $request)
    {
        $this->authorize('viewAny', Currency::class);
        $dayCurrencies = Currency::search($request->date);
        // return $dayCurrencies->toArray(); do podstawowego widoku
        return Inertia::render('SearchPage',[
            'dayCurrencies' => $dayCurrencies
        ]);
    }  
    public function searchWithCurrency(Request $request)
    {
        $this->authorize('viewAny', Currency::class);
        $currencies = Currency::searchWithCurrency($request->date,$request->abbreviation);
        // return $currencies->toArray(); do podstawowego widoku
        return Inertia::render('SearchPage',[
            'currencies' => $currencies
        ]);
    }     
}