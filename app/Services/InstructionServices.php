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

    public function getById($id)
    {
        return $this->instructionRepository->getById($id);
    }


    public function saveInstruction($data)
    {

        $validator = Validator::make($data,[
            'instruction_id',
            'instruction_type' => 'required',
            'vendor_name' => 'required',
            'vendor_addres' => 'required',
            'attention_of' => 'required',
            'quatation_no' => 'required',
            'invoice_name' => 'required',
            'invoice_status',
            'customer_contract'=>'required',
            'customer_po_no'=>'required',
            'desc' => 'required',
            'qty' => 'required',
            'uom' => 'required',
            'unit_price' => 'required',
            'disc',
            'tax',
            'invoice.total',
            'charge' => 'required',
            'notes',
            'attachtment' => 'required|mimes:doc,docx,pdf,txt,csv|max:204',
            'link' => 'required'

        ]);
        

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }


        $result = $this->instructionRepository->addInstruction($data);

        return $result;
    }

    public function editInstruction($id,$data)
    {
        $validator = Validator::make($data,[
            'instruction_id',
            'instruction_type' => 'required',
            'vendor_name' => 'required',
            'vendor_addres' => 'required',
            'attention_of' => 'required',
            'quatation_no' => 'required',
            'invoice_name' => 'required',
            'invoice_status',
            'customer_contract'=>'required',
            'customer_po_no'=>'required',
            'desc' => 'required',
            'qty' => 'required',
            'uom' => 'required',
            'unit_price' => 'required',
            'disc',
            'tax',
            'invoice.total',
            'charge' => 'required',
            'notes',
            'attachtment' => 'required|mimes:doc,docx,pdf,txt,csv|max:204',
            'link' => 'required'

        ]);
        

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }


        $result = $this->instructionRepository->update($id,$data);

        return $result;
    }

    public function getAll()
    {
        return $this->instructionRepository->getAll();
    }

}