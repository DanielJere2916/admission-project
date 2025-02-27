<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_name',
        'faculty_status',
    ];

    /**
     * Define the relationship: A faculty has many departments.
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}