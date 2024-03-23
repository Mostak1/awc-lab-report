<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// class Report extends Model
// {
//     use HasFactory,SoftDeletes;
// }

class Report extends Model
{
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
