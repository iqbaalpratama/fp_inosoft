<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;

    protected $table = 'instructions';


    protected $fillable = [
        'instruction_id',
        'instruction_type',
        'vendor_name',
        'vendor_addres',
        'attention_of',
        'quatation_no',
        'invoice.name',
        'invoice.status',
        'customer_contract',
        'customer_po_no',
        'desc',
        'qty',
        'uom',
        'unit_price',
        'disc',
        'tax',
        'curenncy',
        'invoice.total',
        'charge',
        'notes',
        'attachtment',
        'link'

    ];

    
}