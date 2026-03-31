<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ['patient_name'];

    /**
     * Many-to-Many Relationship
     * A prescription can contain many medicines.
     */
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class);
    }
}