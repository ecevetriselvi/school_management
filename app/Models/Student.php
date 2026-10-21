<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'admission_no',
        'name',
        'gender',
        'date_of_birth',
        'phone',
        'password',
        'address',
        'class_id',
        'section_id',
        'parent_id',
        'admission_date',
        'status',
    ];
}