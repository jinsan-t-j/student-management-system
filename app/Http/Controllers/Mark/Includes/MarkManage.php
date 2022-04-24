<?php

namespace App\Http\Controllers\Mark\Includes;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\Mark;
use App\Http\Requests\Mark\MarkUpdateRequest;

trait MarkManage
{
    /**
     *  @author Jinsan T J
     * Edit form for the specified Mark.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Mark $mark)
    {
        $students = $this->studentRepo->index();
        return view('mark.edit', compact('mark', 'students'));
    }

    /**
     *  @author Jinsan T J
     * Update the specified Mark.
     *
     * @param  \App\Http\Requests\Mark\MarkUpdateRequest  $request
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(MarkUpdateRequest $request, Mark $mark)
    {
        $data['student_id'] = $request->student_id;
        $data['maths'] = $request->maths;
        $data['science'] = $request->science;
        $data['history'] = $request->history;
        if($request->maths || $request->science || $request->history) {
            $data['total'] = (int) ($data['maths']) + (int) ($data['science']) + (int) ($data['history']);
        }
        $data['term'] = $request->term;
        $mark = $this->markRepo->update($data, $mark);

        if ($mark) {
            return redirect()->route('marks.index')->with('success', 'Mark updated successfully');
        }
        return redirect()->route('marks.index')->with('error', 'Failed to update');
    }

    /**
     *  @author Jinsan T J
     * Remove the specified Mark.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        $action = $this->markRepo->destroy($mark);
        if ($action) {
            return redirect()->route('marks.index')->with('success', 'Mark deleted successfully');
        }
        return redirect()->route('marks.index')->with('error', 'Failed to update');
    }
}