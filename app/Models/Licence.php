<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    public function pharmacist()
    {
        return $this->belongsTo(Pharmacist::class);
    }
}