<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $table="routine";
    protected $primaryKey="id";
    use HasFactory;
}
