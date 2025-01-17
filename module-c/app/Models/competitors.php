<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competitors extends Model
{
    /** @use HasFactory<\Database\Factories\CompetitorsFactory> */
    use HasFactory;
    protected $table = 'competitors';
}
