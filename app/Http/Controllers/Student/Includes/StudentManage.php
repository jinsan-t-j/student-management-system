<?php

namespace App\Http\Controllers\Student\Includes;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\Student;
use App\Http\Requests\Student\StudentUpdateRequest;

trait StudentManage
{
    /**
     *  @author Jinsan T J
     * Edit form for the specified Student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Student $student)
    {
        $teachers = $this->teacherRepo->index();
        return view('student.edit', compact('student', 'teachers'));
    }

    /**
     *  @author Jinsan T J
     * Update the specified Student.
     *
     * @param  \App\Http\Requests\Student\StudentUpdateRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name);
        $data['age'] = $request->age;
        $data['gender'] = $request->gender;
        $data['teacher_id'] = $request->teacher_id;

        $student = $this->studentRepo->update($data, $student);
        if ($student) {
            return redirect()->route('students.index')->with('success', 'Student updated successfully');
        }
        return redirect()->route('students.index')->with('error', 'Failed to update');
    }

    /**
     *  @author Jinsan T J
     * Remove the specified Student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student = $this->studentRepo->destroy($student);
        if ($student) {
            return redirect()->route('students.index')->with('success', 'Student deleted successfully');
        }
        return redirect()->route('students.index')->with('error', 'Failed to delete');
    }
}