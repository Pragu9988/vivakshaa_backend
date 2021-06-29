<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code'
    ];

    public function semester() {
        return $this->belongsTo('Semester::class');
    }

    public function program() {
        return $this->belongsTo('Program::class');
    }
}
