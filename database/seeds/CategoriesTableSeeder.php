<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = array(
              					['name'=> 'FOOD MENU' , 'description' => 'This is FOOD MENU',],
                      	['name' => 'DESSERT MENU' , 'description' => 'This is DESSERT MENU',],
                      	['name' => 'DRIKING MENU' ,'description' => 'This is DRIKING MENU',],
                        );
        
        DB::table('categories')->insert($records);
    }
}
