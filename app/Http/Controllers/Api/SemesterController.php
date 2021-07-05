<?php

namespace App\Http\Controllers\Api;

use App\Semester;
use App\Http\Resources\SemesterResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index() {
        return SemesterResource::collection(Semester::all());
    }
}
