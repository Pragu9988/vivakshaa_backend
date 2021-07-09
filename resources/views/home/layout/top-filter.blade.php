<form action="{{ route('home.question') }}" method="GET">
    <div class="d-flex align-items-start flex-wrap text-nowrap">
    <div class="form-group mr-2">
    <select class="form-control form-control-sm mb-3" name="year" id="year">
        <option selected disabled hidden>Year All</option>
        @foreach(config('options.question.year') as $year)
        <option value="{{ $year }}" {{(isset($question) && $year== $question->year) || (old('year') == $year)?"selected":""}}>{{ $year }}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group  mr-2">
    <select class="form-control form-control-sm mb-3" name="type" id="type">
        <option selected disabled hidden>Semester Type</option>
        @foreach(config('options.question.type') as $type)
        <option value="{{ $type }}" 
        {{ (isset($question) && $type == $question->type) || (old('type') == $type)?"selected":"" }}
        >{{ $type }}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group  mr-2">
    <select class="form-control form-control-sm mb-3" name="exam" id="exam">
        <option selected disabled hidden>Exam Type</option>
        @foreach(config('options.question.exam') as $exam)
        <option value="{{ $exam }}" {{ (isset($question) && $exam == $question->exam) || (old('exam') == $exam)?"selected":"" }}>{{ $exam }}</option>
        @endforeach
    </select>
    </div>
    <button type="submit" class="btn btn-success btn-icon-text btn-sm">
    <i class="btn-icon-prepend" data-feather="filter"></i>
    Filter
    </button>
</div>
</form>