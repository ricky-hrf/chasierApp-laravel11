<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class dataAwal extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@kasir.com';
        $user->password = bcrypt('11111111');
        $user->peran = 'admin';
        $user->save();
    }
}
