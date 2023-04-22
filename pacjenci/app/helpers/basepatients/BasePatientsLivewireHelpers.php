<?php

namespace App\helpers\basepatients;

use App\Http\Livewire\Patients\BasePatients\BasePatientsTableLivewire;
use App\Models\Patients;
use App\Models\PatientsGroup;

class BasePatientsLivewireHelpers extends BasePatientsTableLivewire
{

    protected object $query;

    public function basicQuery($search): void
    {
        $this->query = Patients::query();

        if ($search) {
            $this->query->where(function ($query) use ($search) {
                $query->where('fullname', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

    }

    protected function getPatientsGroup(): \Illuminate\Database\Eloquent\Collection
    {
        return PatientsGroup::all();
    }


}
