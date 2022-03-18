<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $primaryKey = "candidate_id";
    protected $casts = [
        'skills' => 'array',
        'social_links' => 'array'
    ];
}
