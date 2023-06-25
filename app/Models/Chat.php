<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [ 'id', 'message','file','audio','video','image', 'receiver_id', 'sender_id', 'created_at', 'updated_at'];
}
