<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'title',
        'year',
        'description',
        'type',
        'thumbnail',
        'course_id',
        'program_id',
        'semester_id',
        'question_file',
        'exam',
        'is_active'
    ];

    public function course() {
        return $this->belongsTo('Course::class');
    }

    public function semester() {
        return $this->belongsTo('Semester::class');
    }

    public function program() {
        return $this->belongsTo('Program::class');
    }
}
