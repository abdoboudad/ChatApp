<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['photo','about','user_id','gender','country'];
    public function aboutme(){
        return $this->belongsTo(Profile::class,'user_id');
    }
}
