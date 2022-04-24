<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

use App\Repositories\Teacher\TeacherRepository;

use App\Http\Controllers\Teacher\Includes\TeacherAdd;
use App\Http\Controllers\Teacher\Includes\TeacherDefine;
use App\Http\Controllers\Teacher\Includes\TeacherManage;
use DataTables;

class TeacherController extends Controller
{
    use TeacherAdd;
    use TeacherManage;

    protected $teacherRepo;

    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepo = $teacherRepository;
    }

    /**
     *  @author Jinsan T J
     * Display a listing of the Teachers.
     * @param Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $teachers = $this->teacherRepo->index();
            return Datatables::of($teachers)
                ->addIndexColumn()
                ->addColumn('Name', function ($teacher) {
                    return $teacher->name;
                })
                ->addColumn('Action', function($teacher){
                    $data['edit_url'] = route('teachers.edit', ['teacher' => $teacher->slug]);
                    $data['delete_url'] = route('teachers.delete', ['teacher' => $teacher->slug]);
                    $data['id'] = $teacher->id;
                    return view('datatable.action', compact('data',));
                })
                ->rawColumns(['Action'])
                ->make(true);
        }
        return view('teacher.index');
    }
}
