<?php

namespace App\Http\Livewire\Patients\BasePatients;

use App\helpers\basepatients\BasePatientsLivewireHelpers;
use App\Http\Controllers\Patients\getNumberOfAllPatientsController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BasePatientsTableLivewire extends Component
{
    use withPagination;

    public string $search = '';

    /**
     * @param BasePatientsLivewireHelpers $helpers
     * @return Factory|View|Application
     */
    public function render(BasePatientsLivewireHelpers $helpers): Factory|View|Application
    {

        $this->assignPeselFromURL();
        $helpers->basicQuery($this->search);

        return view('livewire.patients.base-patients.base-patients-table-livewire',
            [
                'numberOfPatients' => getNumberOfAllPatientsController::getNumberOfAllPatients(),
                'patients' => $helpers->query->paginate(10),
                'patientsGroup' => $helpers->getPatientsGroup()
            ]);
    }


    /**
     * @return void
     * Assign PESEL to search model from url if exist /patients?phone=600300...
     */
    private function assignPeselFromURL() :void{

        if (request()->has('phone') && request()->input('phone') !== null) {
            $this->search = request()->input('phone');
        }
    }


}
