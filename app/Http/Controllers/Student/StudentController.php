<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Repositories\Student\StudentRepository;
use App\Repositories\Teacher\TeacherRepository;

use App\Http\Controllers\Student\Includes\StudentAdd;
use App\Http\Controllers\Student\Includes\StudentDefine;
use App\Http\Controllers\Student\Includes\StudentManage;
use DataTables;

class StudentController extends Controller
{
    use StudentAdd;
    use StudentManage;

    protected $teacherRepo;
    protected $studentRepo;

    public function __construct(TeacherRepository $teacherRepository, StudentRepository $studentRepository)
    {
        $this->teacherRepo = $teacherRepository;
        $this->studentRepo = $studentRepository;
    }

    /**
     *  @author Jinsan T J
     * Display a listing of the Students.
     * 
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $students = $this->studentRepo->index();
            return Datatables::of($students)
                ->addIndexColumn()
                ->addColumn('Name', function ($student) {
                    return $student->name;
                })
                ->addColumn('Age', function ($student) {
                    return $student->age;
                })
                ->addColumn('Gender', function ($student) {
                    return $student->gender;
                })
                ->addColumn('Reporting Teacher', function ($student) {
                    return ($student->teacher) ? $student->teacher->name : 'Does not exist';
                })
                ->addColumn('Name', function ($student) {
                    return $student->name;
                })
                ->addColumn('Action', function($student){
                    $data['edit_url'] = route('students.edit', ['student' => $student->slug]);
                    $data['delete_url'] = route('students.delete', ['student' => $student->slug]);
                    $data['id'] = $student->id;
                    return view('datatable.action', compact('data',));
                })
                ->rawColumns(['Action'])
                ->make(true);
        }
        return view('student.index');
    }
}
