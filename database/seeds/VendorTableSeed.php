<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VendorTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
        	'first_name' => 'Bill',
        	'last_name' => 'Gates',
        	'type' =>'user',
        	'email'=> 'bill@moovooz.com',
        	'status' =>'active',
        	'password'=>bcrypt('123456'),
        	'created_at' => \Carbon\Carbon::now(),
        	'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('vendors')->insert([

        	'user_id'=>2,
        	'vendor_name' => 'The Good Vendor',
        	'description' => 'The Good vendor is a major supplier of gold in middle east area',
        	'contact_number' => '123456789',
        	'mobile' => '1234647890',
        	'created_at' => \Carbon\Carbon::now(),
        	'updated_at' => \Carbon\Carbon::now()

        ]);
    }


}
