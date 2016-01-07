<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('categories')->insert([
        	'name' => 'Computer',
        	'description' => 'Some description about computer',
        	'slug' => 'computer',
        	'status' => 1,
        	'created_at' => \Carbon\Carbon::now(),
        	'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
