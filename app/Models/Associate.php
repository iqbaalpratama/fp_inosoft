<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Associate extends Model
{
    use HasFactory;

    protected $table = 'associates';

    protected $fillable = [
        'vendor_name',
        'vendor_address',
        'customer_contract',
    ];

}
