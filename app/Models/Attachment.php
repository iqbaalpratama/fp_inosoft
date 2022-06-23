<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'attachment_id',
        'user_id',
        'type',
        'name',
        'path',
        'mime',
        'size',
        'options',
    ];
}
