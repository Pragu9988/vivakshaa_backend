<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'name', 'code', 'program_id', 'semester_id', 'description'
    ];

    public function semester() {
        return $this->belongsTo(Semester::class);
    }

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
