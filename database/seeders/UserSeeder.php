<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = "Manuhssj";
        $user->email = "manu@gmail.com";
        $user->password = bcrypt("manu12345");
        $user->save();

        $user = new User();
        $user->username = "El Viejon";
        $user->email = "abdiel@gmail.com";
        $user->password = bcrypt("abdiel12345");
        $user->save();

        $user = new User();
        $user->username = "Gato con Atole";
        $user->email = "jona@gmail.com";
        $user->password = bcrypt("jona12345");
        $user->save();

        $user = new User();
        $user->username = "Licenciado Gallardo";
        $user->email = "angel@gmail.com";
        $user->password = bcrypt("angel12345");
        $user->save();
    }
}