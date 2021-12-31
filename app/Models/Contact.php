<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','message'];

    public static function rules()
    {
        return [
            'name'  => 'required|min:3',
            'email' => 'required|email',
            'message'=> 'required|min:10'
        ];
    }

    public static function deleteRules()
    {
        return [
            'contact_id' =>'required|exists:contacts,id'
        ];
    }
}
