<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Add this line:
    protected $fillable = ['name', 'email', 'phone'];

    public function prescriptions() {
        return $this->hasMany(Prescription::class);
    }
}
