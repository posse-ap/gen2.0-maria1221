<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  
        $param = [
            'name' => 'posse',
            'email' => 'posse@gmail.com',
            'password' => Hash::make('password'),
        ];
        DB::table('users')->insert($param);
    }
}
