<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\operations\operationsTableSeeder;
use Database\Seeders\patients\patientsGroupSeeder;
use Database\Seeders\patients\patientsTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if(env('APP_ENV') == 'production'){ exit(); }

        $this->call(patientsTableSeeder::class);
        $this->call(patientsGroupSeeder::class);
        $this->call(adminUserSeeder::class);
        $this->call(operationsTableSeeder::class);

    }
}
