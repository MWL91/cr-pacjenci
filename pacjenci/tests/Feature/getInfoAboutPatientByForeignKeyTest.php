<?php

namespace Tests\Feature;

use App\Models\Operations;
use App\Models\Patients;
use App\Models\PatientsGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class getInfoAboutPatientByForeignKeyTest extends TestCase
{

    use RefreshDatabase;

    private string $patientName = 'Bartek';
    private int $patientPhone = 600100000;

    public function test_get_info_about_patient(): void
    {
        $this->createPatient();
        $this->createPatientGroup();
        $this->assignPatientToOperation();

        $patient = Patients::query()->join('operations', 'patients.phone', '=', 'operations.phone')->first(['patients.fullname']);

        $this->assertEquals($this->patientName, $patient->fullname);

    }

    private function createPatient() :void {
        Patients::query()->create([
            'fullname' => $this->patientName,
            'phone' => $this->patientPhone,
        ]);
    }

    private function createPatientGroup() :void {
        PatientsGroup::query()->create([
            'name' => 'Grupa 1',
            'color' => '#000',
        ]);
    }

    private function assignPatientToOperation() :void {

        $today = date('Y-m-d');

        Operations::query()->create([
            'group_id' => 1,
            'date_start' => $today,
            'date_end' => date('Y-m-d', strtotime($today . ' +1 day')),
            'phone' => $this->patientPhone,
            'extrainfo' => '',
            'priority' => 1,
            'operationsPerformed' => 'oczekująca',
        ]);
    }

}
