<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * One-to-Many Relationship
     * A category has many medicines.
     */
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}