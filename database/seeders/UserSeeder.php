<?php

namespace Database\Seeders;

use App\Models\Mentor;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'uuid' => Str::uuid()->toString(),
                'first_name' => 'Chet',
                'last_name' => 'Sovisoth',
                'name' => 'Chet Sovisoth',
                'password' => Hash::make('123123123'),
                'email' => 'chet.sovisoth@gmail.com',
                'role' => 'mentor'
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'first_name' => 'Seng',
                'last_name' => 'Vichet',
                'name' => 'Seng Vichet',
                'password' => Hash::make('123123123'),
                'email' => 'seng.vichet@gmail.com',
                'role' => 'student'
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'first_name' => 'Srun',
                'last_name' => 'Davith',
                'name' => 'Srun Davith',
                'password' => Hash::make('123123123'),
                'email' => 'srun.davith@gmail.com',
                'role' => 'mentor'
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'first_name' => 'Sok',
                'last_name' => 'Sousrun',
                'name' => 'Sok Sousrun',
                'password' => Hash::make('123123123'),
                'email' => 'sok.sousrun@gmail.com',
                'role' => 'student'
            ],
        ];

        foreach ($users as $user) {
            $newUser = User::create($user);
        
            if($user['role'] == 'mentor') {
                Mentor::create(['user_id' => $newUser->id]);
            }
            else {
                Student::create(['user_id' => $newUser->id]);
            }
        }
    }
}
