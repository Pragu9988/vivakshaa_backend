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
        'is_active',
        'user_id',
        'file_size'
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

    public function user() {
        return $this->belongsTo('User::class');
    }

    public static function getQuesitons($year) {
        $questions = Question::all();

        if($year && $year != config('options.question.year')) {
            $questions = $questions->where('questions.year', $year);
        }
        return $users->paginate(10);
    }
}
