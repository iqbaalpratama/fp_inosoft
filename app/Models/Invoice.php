<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Invoice extends Model
{
    
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'name',
        'status',
        'total_bill',
        'invoices_detail'
    ];
}
