<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'department_name',
        'department_acronym',
        'department_status',
    ];

    /**
     * Define the relationship: A department belongs to a faculty.
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * Define the relationship: A department has many programs.
     */
    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    /**
     * Define the relationship: A department has many users.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}