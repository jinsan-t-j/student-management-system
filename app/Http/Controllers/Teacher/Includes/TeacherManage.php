<?php

namespace App\Http\Controllers\Teacher\Includes;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\Teacher;
use App\Http\Requests\Teacher\TeacherUpdateRequest;

trait TeacherManage
{
    /**
     *  @author Jinsan T J
     * Edit form for the specified Teacher.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', compact('teacher'));
    }

    /**
     *  @author Jinsan T J
     * Update the specified Teacher.
     *
     * @param  \App\Http\Requests\Teacher\TeacherUpdateRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherUpdateRequest $request, Teacher $teacher)
    {
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name);

        $teacher = $this->teacherRepo->update($data, $teacher);
        if ($teacher) {
            return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully');
        }
        return redirect()->route('teachers.index')->with('error', 'Failed to update');
    }

    /**
     *  @author Jinsan T J
     * Remove the specified Teacher.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher = $this->teacherRepo->destroy($teacher);
        if ($teacher) {
            return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully');
        }
        return redirect()->route('teachers.index')->with('error', 'Failed to delete');
    }
}