<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{
    public function licence()
    {
        return $this->hasOne(Licence::class); // One-to-One
    }
}