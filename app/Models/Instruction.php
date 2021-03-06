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
        'associates_vendor_name',
        'associates_vendor_addres',
        'attention_of',
        'quatation_no',
        'invoice.name',
        'invoice.status',
        'associates_customer_contract',
        'associates_customer_po_no',
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

    public function attachments()
    {
        return $this->embedsOne(Attachment::class);
    }

    
}