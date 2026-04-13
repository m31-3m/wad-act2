<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    // Update this line to include customer_id:
    protected $fillable = ['patient_name', 'customer_id'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function medicines() {
        return $this->belongsToMany(Medicine::class);
    }
}