<?php

namespace App;

use Illuminate\Datebase\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false;

    protected $fillable =['email','password'];


}