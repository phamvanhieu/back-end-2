<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'username'=>'admin',
            'password'=>bcrypt('123456')
        ];
        DB::table('admins')->insert($data);
    }
}