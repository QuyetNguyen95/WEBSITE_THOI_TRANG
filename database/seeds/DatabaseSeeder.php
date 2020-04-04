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
            'name'  => "Quyết Nguyễn",
            'email' => "nguyencuongquyet96@gmail.com",
            'password' => bcrypt('123456')
        ]);
    }
}
