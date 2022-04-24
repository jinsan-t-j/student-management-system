<?php

namespace App\Http\Controllers\Teacher\Includes;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Http\Requests\Teacher\TeacherStoreRequest;

trait TeacherAdd
{
    /**
     * Show the form for creating a new teacher.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     *  @author Jinsan T J
     * Store a newly created Teacher.
     *
     * @param  \App\Http\Requests\Teacher\TeacherStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherStoreRequest $request)
    {
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name);
        $action = $this->teacherRepo->store($data);

        return redirect()->route('teachers.index');
    }
}