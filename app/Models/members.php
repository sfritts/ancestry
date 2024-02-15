<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    use HasFactory;
    
    public $timestamps = FALSE;
    
    protected $fillable = ["id_number", "first_name", "last_name", "married", "spouse", "state_id", "city"];
}
