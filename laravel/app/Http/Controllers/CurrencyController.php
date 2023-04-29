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
        $todayCurrencies = Currency::whereDate('created_at',Carbon::today())->where('abbreviation',$request->abbreviation)->get(); 
        if($todayCurrencies->count() == 0){
                Currency::create([
                    'abbreviation' => $request->abbreviation,
                    'amount' => $request->amount,
                    'date' => Carbon::now()
                ]);        
            }
    } 
    public function search(Request $request)
    {
        $this->authorize('viewAny', Currency::class);
        $dayCurrencies = Currency::whereDate('date',$request->date)->get();
        // return $dayCurrencies->toArray();
        return Inertia::render('SearchPage',[
            'dayCurrencies' => $dayCurrencies
        ]);
    }  
    public function searchWithCurrency(Request $request)
    {
        $this->authorize('viewAny', Currency::class);
        $currencies = Currency::whereDate('date',$request->date)->where('abbreviation',$request->abbreviation)->get();
        // return $currencies->toArray();
        return Inertia::render('SearchPage',[
            'currencies' => $currencies
        ]);
    }     
}
    

