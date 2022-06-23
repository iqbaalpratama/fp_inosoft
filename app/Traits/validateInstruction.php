<?php
namespace App\Traits;

use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;


trait validateInstruction {

    public function validateCreate($data)
    {
        $validator=Validator::make($data,[
            'instruction_type' => 'required',
            'associates_vendor_name' => 'required',
            'associates_vendor_address' => 'required',
            'attention_of' => 'required',
            'quatation_no' => 'required',
            'invoice_name' => 'required',
            'invoice_status',
            'associates_customer_contract'=>'required',
            'associates_customer_po_no'=>'required',
            'desc' => 'required',
            'qty' => 'required',
            'uom' => 'required',
            'unit_price' => 'required',
            'disc',
            'tax',
            'invoice.total',
            'charge' => 'required',
            'notes',
            'attachment'=>'mimes:doc,docx,pdf,txt,csv|max:2048',
            'link' => 'required'

        ]);


        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
    }

    public function validateUpdate($data)
    {
        $validator=Validator::make($data,[
            'associates_vendor_name' => 'required',
            'associates_vendor_address' => 'required',
            'attention_of' => 'required',
            'quatation_no' => 'required',
            'invoice_name' => 'required',
            'invoice_status',
            'associates_customer_contract'=>'required',
            'associates_customer_po_no'=>'required',
            'desc' => 'required',
            'qty' => 'required',
            'uom' => 'required',
            'unit_price' => 'required',
            'disc',
            'tax',
            'invoice.total',
            'charge' => 'required',
            'notes',
            'attachment'=>'mimes:doc,docx,pdf,txt,csv|max:2048',
            'link' => 'required'

        ]);


        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
    }
}
