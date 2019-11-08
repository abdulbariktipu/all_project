<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
        		'name' => 'John Doe',
        		'email' =>'admin@gmail.com',
        		'password' => bcrypt('12345678'),
        		'user_type' => '1',
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],

        	[
        		'name' => 'User',
        		'email' =>'user@gmail.com',
        		'password' => bcrypt('12345678'),
        		'user_type' => '0',
        		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]
        ]);
    }
}
