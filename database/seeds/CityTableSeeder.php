<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
        	'name' => 'Dubai',
        	'description' => 'Dubai description',
        	'slug' => 'dubai',
        	'status' => 1,
        	'created_at' => \Carbon\Carbon::now(),
        	'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
