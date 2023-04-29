<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generator = Factory::create(); 
        $abbreviation = [            
            1 => 'EUR',            
            2 => 'GBP',
            3 => 'USD',
        ];
        foreach($abbreviation as $abbreviation)
            DB::table('currencies')->insert([
                'abbreviation' => $abbreviation,
                'created_at' => $generator->dateTime(),
                'updated_at' => $generator->dateTime(),
            ]);
    }
}
