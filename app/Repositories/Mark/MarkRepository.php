<?php

namespace App\Repositories\Mark;
use App\Repositories\BaseRepository;
use App\Models\Mark;

class MarkRepository extends BaseRepository
{
    public function index()
    {
        $marks = Mark::where('status', true)->latest()->get();
        if ($marks) {
            return $marks;
        }
    }
    
    public function show($slug)
    {
        $mark = Mark::where('slug', $slug)->firstOrFail();
        return $mark;
    }

    public function store(array $input)
    {
        return $action = Mark::create($input);
    }

    public function update(array $input, Mark $mark)
    {
        if ($mark->update($input)) {
            return $mark;
        }
        return false;
    }

    public function destroy(Mark $mark)
    {
        if ($mark->delete()) {
            return true;
        }
        return false;
    }
}