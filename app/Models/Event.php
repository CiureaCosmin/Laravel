<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'location',
        'date',
        'user_id',
        'lista_invitati',
        'images',
    ];
}
