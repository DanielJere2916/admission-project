<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'program_name',
        'program_acronym',
        'program_status',
    ];

    /**
     * Define the relationship: A program belongs to a department.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}