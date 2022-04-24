<?php

namespace App\Http\Controllers\Student\Includes;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Http\Requests\Student\StudentStoreRequest;

trait StudentAdd
{
    /**
     * Show the form for creating a new student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = $this->teacherRepo->index();
        return view('student.create', compact('teachers'));
    }

    /**
     *  @author Jinsan T J
     * Store a newly created Student.
     *
     * @param  \App\Http\Requests\Student\StudentStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name);
        $data['age'] = $request->age;
        $data['gender'] = $request->gender;
        $data['teacher_id'] = $request->teacher_id;
        $action = $this->studentRepo->store($data);

        if($action) {
            return redirect()->route('students.index')->with('success', 'Student added successfully');
        } else {
            return redirect()->route('students.index')->with('error', 'Failed to student');
        }
    }
}