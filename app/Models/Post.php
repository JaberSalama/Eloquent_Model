<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes; 
     
    // اكون محدد افضل 

    protected $fillable = ['title' , 'body'] ; 
    // protected $guarded = [];  لا ينصح بها 
    // protected $guarded = ['user'];  الجميع عدا ل user 

    public function scopeJaber($query){

        return $query->where('body' , 'post two information');

    } 


}
