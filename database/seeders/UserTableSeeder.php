<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'id' => 1,
            'mobile' => '01700000000',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'first_name' => 'Ringku',
            'last_name' => 'Islam',
            'status' => 1,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'deleted' => 0
        ]);
    }
}
