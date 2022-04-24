<?php

namespace App\Http\Controllers\Mark\Includes;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Http\Requests\Mark\MarkStoreRequest;

trait MarkAdd
{
    /**
     * Show the form for creating a new mark.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = $this->studentRepo->index();
        return view('mark.create', compact('students'));
    }

    /**
     *  @author Jinsan T J
     * Store a newly created mark.
     *
     * @param  \App\Http\Requests\Mark\MarkStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkStoreRequest $request)
    {
        $data['student_id'] = $request->student_id;
        $data['maths'] = $request->maths;
        $data['science'] = $request->science;
        $data['history'] = $request->history;
        if($request->maths || $request->science || $request->history) {
            $data['total'] = (int) ($data['maths']) + (int) ($data['science']) + (int) ($data['history']);
        }
        $data['term'] = $request->term;
        $action = $this->markRepo->store($data);

        if($action) {
            return redirect()->route('marks.index')->with('success', 'Student added successfully');
        } else {
            return redirect()->route('marks.index')->with('error', 'Failed to student');
        }
    }
}