<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = User::where('email', '=', 'user@prifunds.com')->first();
        if($admin === null){
            DB::table('users')->insert([
                'name' => 'User Panel',
                'username' => 'user',
                'status' => 1,
                'admin' => 0,
                'balance' => 500000,
                'profit' => 600000,
                'email' => 'user@prifunds.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('PASSCODE123'),
            ]);
        }
    }

}
