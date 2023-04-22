<?php

namespace Database\Seeders\patients;

use App\Models\Patients;
use Carbon\Carbon;
use Faker\Provider\pl_PL\Person as Faker;
use Illuminate\Database\Seeder;

class patientsTableSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {

            $fullname = Faker::randomElement([
                Faker::firstNameMale().' '.Faker::lastNameMale(),
                Faker::firstNameFemale().' '.Faker::lastNameFemale()
            ]);


            Patients::query()->create([
                'fullname' => $fullname,
                'phone' => '486'.rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9),
            ]);
        }
    }
}
