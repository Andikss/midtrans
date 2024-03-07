<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table      = 'master_course_category';
    protected $guarded    = ['id'];
}
