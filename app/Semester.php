<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';

    protected $fillable = [
        'name'
    ];

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
