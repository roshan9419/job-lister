<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $primaryKey = "job_id";

    protected $casts = [
        'skills_required' => 'array',
        'applicants' => 'array'
    ];
}
