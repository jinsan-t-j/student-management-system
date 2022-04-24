<?php

namespace App\Repositories\Teacher;
use App\Repositories\BaseRepository;
use App\Models\Teacher;

class TeacherRepository extends BaseRepository
{
    public function index()
    {
        $teachers = Teacher::where('status', true)->latest()->get();
        if ($teachers) {
            return $teachers;
        }
    }
    
    public function show($slug)
    {
        $teacher = Teacher::where('slug', $slug)->firstOrFail();
        return $teacher;
    }

    public function store(array $input)
    {
        return $action = Teacher::create($input);
    }

    public function update(array $input, Teacher $teacher)
    {
        if ($teacher->update($input)) {
            return $teacher;
        }
        return false;
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->delete()) {
            return true;
        }
        return false;
    }
}