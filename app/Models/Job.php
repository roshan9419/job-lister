<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $casts = [
        'job_locations' => 'array',
        'skills_required' => 'array',
        'applicants' => 'array'
    ];
}
