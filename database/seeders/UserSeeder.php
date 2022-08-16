<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $admin = new User();
        $admin->name = "User Admin";
        $admin->email = "admin@email.com";
        $admin->password = Hash::make("admin1234");
        $admin->rol = "ADMIN";
        $admin->save();
    }
}
