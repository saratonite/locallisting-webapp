<?php

use Illuminate\Database\Seeder;
class EnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enquiries')->insert([
        	'from_user' => 1,
        	'to_vendor' =>1,
        	'subject' => 'Example equiry title',
        	'message' => 'Example enquiry',
        	'created_at' => Carbon\Carbon::now(),
        	'updated_at' => Carbon\Carbon::now()
        ]);
    }
}
