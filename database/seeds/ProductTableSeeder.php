<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'name'=>str_random(50),
        	'description'=>str_random(100),
        	'price'=>3000,
            'category_id'=>1,
        	'produced_on'=>Carbon::create('2000','08','04')
        ]);
    }
}
