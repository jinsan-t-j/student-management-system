<?php

namespace App\Http\Controllers\Mark;

use App\Http\Controllers\Controller;
use App\Models\Mark;
use Illuminate\Http\Request;

use App\Repositories\Mark\MarkRepository;
use App\Repositories\Student\StudentRepository;

use App\Http\Controllers\Mark\Includes\MarkAdd;
use App\Http\Controllers\Mark\Includes\MarkDefine;
use App\Http\Controllers\Mark\Includes\MarkManage;
use DataTables;

class MarkController extends Controller
{
    use MarkAdd;
    use MarkManage;

    protected $studentRepo;
    protected $markRepo;

    public function __construct(StudentRepository $studentRepository, MarkRepository $markRepository)
    {
        $this->studentRepo = $studentRepository;
        $this->markRepo = $markRepository;
    }

    /**
     *  @author Jinsan T J
     * Display a listing of the Marks.
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $marks = $this->markRepo->index();
            return Datatables::of($marks)
                ->addIndexColumn()
                ->addColumn('Name', function ($mark) {
                    return ($mark->student) ? $mark->student->name : 'Does not exist';
                })
                ->addColumn('Maths', function ($mark) {
                    return $mark->maths;
                })
                ->addColumn('Science', function ($mark) {
                    return $mark->science;
                })
                ->addColumn('History', function ($mark) {
                    return $mark->history;
                })
                ->addColumn('Term', function ($mark) {
                    return $mark->term;
                })
                ->addColumn('Total Marks', function ($mark) {
                    return $mark->total;
                })
                ->addColumn('Created On', function ($mark) {
                    return $mark->created_at->format('M d, Y h:i A');
                })
                ->addColumn('Action', function($mark){
                    $data['edit_url'] = route('marks.edit', ['mark' => $mark->id]);
                    $data['delete_url'] = route('marks.delete', ['mark' => $mark->id]);
                    $data['id'] = $mark->id;
                    return view('datatable.action', compact('data',));
                })
                ->rawColumns(['Action'])
                ->make(true);
        }
        return view('mark.index');
    }
}
