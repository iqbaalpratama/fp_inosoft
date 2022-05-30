<?php

namespace App\Services;

use App\Repositories\InstructionRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class InstructionServices
{
    protected $instructionRepository;

    public function __construct(InstructionRepository $instructionRepository)
    {
        $this->instructionRepository = $instructionRepository;
    }

    public function saveInstruction($data)
    {

        $validator = Validator::make($data,[
            'instruction_type' => 'required',
            'associates.vendor_name' => 'required',
            'associates.vendor_addres' => 'required',
            'attention_of' => 'required',
            'quatation_no' => 'required',
            'invoice.name' => 'required',
            'invoice.status',
            'associates.customer_contract'=>'required',
            'associates.customer_po_no'=>'required',
            'desc' => 'required',
            'qty' => 'required',
            'uom' => 'required',
            'unit_price' => 'required',
            'disc',
            'tax',
            'invoice.total',
            'charge' => 'required',
            'notes',
            'attachtment' => 'required|mimes:doc,docx,pdf,txt,csv|max:2048',
            'link' => 'required'

        ]);
        

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }


        $result = $this->instructionRepository->addInstruction($data);

        return $result;
    }
}