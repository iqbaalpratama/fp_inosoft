<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;

    protected $fillable = [
        'instruction_type',
        'vendor_name',
        'vendor_addres',
        'attention_of',
        'quatation_no',
        'invoice.name',
        'invoice.status',
        'desc',
        'qty',
        'uom',
        'unit_price',
        'tax',
        'invoice.total',
        'charge',
        'notes',
        'attachtment',
        'link'

    ];
}
