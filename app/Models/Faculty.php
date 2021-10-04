<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculties';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'nama_fakultas'
    ];
}
