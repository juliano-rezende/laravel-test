<?php

namespace Database\Seeders;

use App\Http\Controllers\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'description' => Str::random(10),
            'amount' => '10.00',
            'quantity' => Str::random(5),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
