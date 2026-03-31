<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name'];

    /**
     * Inverse of One-to-Many
     * A medicine belongs to a specific category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Many-to-Many Relationship
     * A medicine can be part of many prescriptions.
     */
    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class);
    }
}