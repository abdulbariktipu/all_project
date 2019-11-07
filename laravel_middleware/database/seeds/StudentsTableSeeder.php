<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
        	[
        		'name' => 'ABC',
        		'email' =>'abc@gmail.com',
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],

        	[
        		'name' => 'ert',
        		'email' =>'ert@gmail.com',
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],

        	[
        		'name' => 'yui',
        		'email' =>'yui@gmail.com',
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],

        	[
        		'name' => 'ssa',
        		'email' =>'abwc@gmail.com',
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],

        	[
        		'name' => 'cde',
        		'email' =>'cde@gmail.com',
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]
        ]);
    }
}
