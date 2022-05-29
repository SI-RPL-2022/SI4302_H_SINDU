<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "admin";
        $user->email = "admin@mail.com";
        $user->level = "admin";
        $user->foto_profile = "admin.jpg";
        $user->password = bcrypt('12345678');
        
        $relawan = new User;
        $relawan->name = "relawan";
        $relawan->email = "relawan@mail.com";
        $relawan->level = "relawan";
        $relawan->foto_profile = "relawan.jpg";
        $relawan->password = bcrypt('12345678');
        $user->save();
        $relawan->save();
    }
}
