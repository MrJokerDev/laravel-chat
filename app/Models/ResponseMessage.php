<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class ResponseMessage extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'user_id', 'message'];
}