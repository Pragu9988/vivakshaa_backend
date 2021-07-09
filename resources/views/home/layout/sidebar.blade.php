<div class="col-12 col-lg-4 col-xl-4 stretched-card">
    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Filters</h3>
            {{-- <form action="{{route('question.get-questions')}}" method="POST"> --}}
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="program">Program</label>
                            <select class="form-control dynamic" id="program_id" name="program_id" data-dependent = "course_id">
                                <option selected disable>Select a Program</option>
                                @foreach($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="semester">Semester</label>
                            <select name="semester_id" id="semester_id" class="form-control dynamic" data-dependent = "course_id">
                                <option selected disable>Select a Semester</option>
                                @foreach($semesters as $semester)
                                <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                @endforeach
                            </select>
                        </div>  
                    </div><!-- Col -->
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="course">Course</label>
                            <select name="course_id" id="course_id" class="form-control">
                                <option selected disable>Select a Course</option>
                            </select>
                        </div>  
                    </div><!-- Col -->
                </div><!-- Row -->
                {{ csrf_field() }}
                <button type="button" class="btn btn-success btn-icon-text btn-sm" id="btnFilter">
                    <i class="btn-icon-prepend" data-feather="filter"></i>
                    Filter
                </button>
            {{-- </form> --}}
                

            {{-- <h6 class="card-title mt-4">Program</h6>
            <div class="form-group border border-light p-2">
                @foreach($programs as $program)
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input program" id="program" name="{{ $program->name }}">
                        {{ $program->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <h6 class="card-title mt-4">Semester</h6>
            <div class="form-group border border-light p-2">
                @foreach($semesters as $semester)
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input semester" id="semester" name="{{ $semester->name }}">
                        {{ $semester->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <h6 class="card-title mt-4">Courses</h6>
            <div class="form-group border border-light p-2">
                @foreach($courses as $course)
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input course" id="course" name="{{ $course->name }}">
                        {{ $course->name }}
                        </label>
                    </div>
                @endforeach
            </div> --}}
        </div>
    </div>
</div>

