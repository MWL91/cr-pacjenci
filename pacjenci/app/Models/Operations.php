<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operations extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'group_id', 'extrainfo', 'priority', 'date_start', 'date_end', 'operationsPerformed'];

    public function PatientsGroup(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PatientsGroup::class);
    }


}
