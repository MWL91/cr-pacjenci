<?php

namespace Database\Seeders;

use App\Models\Patients;
use App\Models\User;
use Faker\Provider\pl_PL\Person as Faker;
use Illuminate\Database\Seeder;

class adminUserSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = User::query();
        User::query()->count() > 0 ?: $this->createAdmin($users);

    }


    private function createAdmin($users): void
    {

        $users->create([
            'name' => 'admin',
            'email' => 'admin@admin.pl',
            'password' => bcrypt('admin')
        ]);

    }
}
