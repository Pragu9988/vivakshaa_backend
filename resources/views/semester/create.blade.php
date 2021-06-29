@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('semester.index') }}">Semester</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ isset($semester) ? $semester->name : "Add Semester"}}</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Create Semester</div>
                <form action="{{ isset($semester) ? route('semester.update', $semester->id) : route('semester.store') }}" method="POST">
                @csrf
                @if(isset($semester))
                    <input name="_method" value="put" hidden>
                @endif
                    <div class="form-group">
                        <label for="semesterName">Semester<span>*</span></label>
                        <input type="text" class="form-control" value="{{ isset($semester) ? $semester->name : old('name') }}" placeholder="Enter Semester" id="semesterName" name="name" required >
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
