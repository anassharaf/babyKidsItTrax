<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','description','image'];

    public static function rules()
    {
        return [
            'name'          => 'required|min:5',
            'price'         => 'required|numeric',
            'description'   => 'required|min:5'
        ];
    }

    public static function deleteRules()
    {
        return [
            'course_id' => 'required|exists:courses,id'
        ];
    }

    public function getImageAttribute($value)
    {
        return 'images/courses/'. $value;
    }
}
