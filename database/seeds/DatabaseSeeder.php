<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'user_name' => 'manager',
            'first_name' => 'Manager',
            'last_name' => 'Manager',
            'email' => str_random(5).'@gmail.com',
            'password' => bcrypt('secret'),
            'group_id' => 1,
            
        ]);
    }
}
