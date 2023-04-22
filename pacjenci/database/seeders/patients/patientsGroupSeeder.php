<?php

namespace Database\Seeders\patients;


use App\Models\PatientsGroup;
use Illuminate\Database\Seeder;

class patientsGroupSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $groups = PatientsGroup::query();
        PatientsGroup::query()->count() > 0 ?: $this->CreateGroups($groups);

    }

    private function CreateGroups($groups): void
    {

        $groupData =
            [
                ['name' => 'Grupa 1', 'color' => '#000'],
                ['name' => 'Grupa 2', 'color' => '#0328fc']
            ];

        foreach ($groupData as $data) {
            $groups->create($data);
        }

    }

}
