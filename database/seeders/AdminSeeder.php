<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = User::where('email', '=', 'admin@prifunds.com')->first();
        if($admin === null){
            DB::table('users')->insert([
                'name' => 'Admin Panel',
                'username' => 'admin',
                'status' => 1,
                'admin' => 1,
                'currency' => "USD",
                'balance' => 500000,
                'profit' => 600000,
                'email' => 'admin@prifunds.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('PASSCODE123'),
            ]);
        }
    }


}
