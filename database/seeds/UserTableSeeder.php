<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'first_name' => 'Sarath',
        	'last_name' => 'K',
        	'type' =>'admin',
        	'email'=> 'sarath@moovooz.com',
        	'status' =>'active',
        	'password'=>bcrypt('123456'),
        	'created_at' => \Carbon\Carbon::now(),
        	'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
