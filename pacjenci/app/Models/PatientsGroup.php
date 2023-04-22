<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color'];

    public function Patients(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Operations::class);
    }

}
