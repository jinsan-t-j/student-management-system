<?php

namespace App\Repositories\Student;
use App\Repositories\BaseRepository;
use App\Models\Student;

class StudentRepository extends BaseRepository
{
    public function index()
    {
        $students = Student::where('status', true)->latest()->get();
        if ($students) {
            return $students;
        }
    }
    
    public function show($slug)
    {
        $student = Student::where('slug', $slug)->firstOrFail();
        return $student;
    }

    public function store(array $input)
    {
        return $action = Student::create($input);
    }

    public function update(array $input, Student $student)
    {
        if ($student->update($input)) {
            return $student;
        }
        return false;
    }

    public function destroy(Student $student)
    {
        if ($student->delete()) {
            return true;
        }
        return false;
    }
}