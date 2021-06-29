<?php

namespace App\Traits;

trait CourseFilter {
    public function scopeHasFilter($query, $request) {
        if (isset($request->program_id) && $request->program_id !== '' && $request->program_id !== []) {
            $this->scopeHasProgram($query, $request->program_id);
        }
        if (isset($request->search) && trim($request->search) !== '') {
            $this->scopeHasSearch($query, $request->search);
        }
        return $query;
    }

    public function scopeHasProgram($query, $program_id)
    {
        if(is_array($program_id)){
            return $query->whereIn('program_id', $program_id);
        }else{
            $program_id = trim($program_id);
            return $query->where('program_id', $program_id);
        }
    }

    public function scopeHasSearch($query, $search)
    {
        $search = trim($search);
        return $query->where('name', 'like', '%'.$search.'%');
    }
}