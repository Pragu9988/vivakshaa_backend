<?php

namespace App\Http\Controllers\Api;

use App\Question;
use App\Http\Resources\QuestionResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {
        return QuestionResource::collection(Question::all());
    }
}
