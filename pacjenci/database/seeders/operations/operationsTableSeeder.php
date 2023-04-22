<?php

namespace Database\Seeders\operations;

use App\Models\Operations;
use App\Models\Patients;
use App\Models\PatientsGroup;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\pl_PL\Person as Faker;
use Illuminate\Database\Seeder;

class operationsTableSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $operations = Operations::query();
        $operations->count() > 0 ?: $this->CreateFirstOperation($operations);
    }

    private function CreateFirstOperation($operations): void
    {
        $randomPatient = Patients::query()->inRandomOrder()->first();
        $randomPatientGroup = PatientsGroup::query()->inRandomOrder()->first();

        $operations->create([
            'phone' => $randomPatient->phone,
            'group_id' => $randomPatientGroup->id,
            'priority' => rand(0,1),
            'extrainfo' => 'Brak dodatkowych informacji',
            'operationsPerformed' => 'oczekująca',
            'date_start' => Carbon::now()->format('Y-m-d'),
            'date_end' => Carbon::now()->addDay()->format('Y-m-d')
        ]);
    }


    }
