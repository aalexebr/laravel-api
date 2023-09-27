<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\User; 
// Helpers
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trailUser = [
            'name'=>'alex',
            'email'=>'alex@alex.alex',
            'password'=>'password'
        ];
        
        User::truncate();
        User::create([
            'name'=>$trailUser['name'],
            'email'=>$trailUser['email'],
            'password'=>Hash::make($trailUser['password']),
        ]);
    }
}
