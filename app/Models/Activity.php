<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','icon'];

    public function getIconAttribute($value)
    {
        return 'images/activities/'.$value;
    }

    public static function rules()
    {
        return [
            'title' => 'required|min:5',
            'slug'  => 'required|min:5'
        ];
    }

    public static function deleteRules()
    {
        return [
            'activity_id' => 'required|exists:activities,id'
        ];
    }
}
