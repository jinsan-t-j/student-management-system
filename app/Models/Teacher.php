<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     *  @author Jinsan T J
     * Assign route key name as slug value.
     *
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
