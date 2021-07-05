<?php

namespace App\Http\Controllers\Api;

use App\Program;
use App\Http\Resources\ProgramResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index() {
        return ProgramResource::collection(Program::all());
    }
}
