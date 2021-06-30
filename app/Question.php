<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $guarded = [];

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
