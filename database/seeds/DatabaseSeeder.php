<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'  => "Nhân Nguyễn",
            'email' => "nhan@gmail.com",
            'password' => bcrypt('123456')
        ]);
    }
}
