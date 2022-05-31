<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;

    protected $table = 'instructions';


    protected $fillable = [
        'instruction_type',
        'associates.vendor_name',
        'associates.vendor_addres',
        'attention_of',
        'quatation_no',
        'invoice.name',
        'invoice.status',
        'associates.customer_contract',
        'associates.customer_po_no',
        'desc',
        'qty',
        'uom',
        'unit_price',
        'disc',
        'tax',
        'invoice.total',
        'charge',
        'notes',
        'attachtment',
        'link'

    ];

    
}