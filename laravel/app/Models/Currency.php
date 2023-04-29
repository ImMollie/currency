<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\Traits\Date;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function getTodayCurrencies(String $abbreviation)
    {
        return Currency::whereDate('created_at',Carbon::today())->where('abbreviation',$abbreviation)->get();
    }
    public static function create(String $abbreviation, float $amount)
    {
        Currency::create([
            'abbreviation' => $abbreviation,
            'amount' => $amount,
            'date' => Carbon::now()
        ]); 
    }
    public static function search(?String $date)
    {
        return Currency::whereDate('date',$date)->get();
    }
    public static function searchWithCurrency(?String $date, ?String $abbreviation)
    {
        return Currency::whereDate('date',$date)->where('abbreviation',$abbreviation)->get();
    }
}
