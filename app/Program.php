<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'name', 'abbreviation', 'faculty', 'description'
    ];

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
