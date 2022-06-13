<?php

namespace App\Repositories;

use App\Models\Instruction;

class InstructionRepository
{

    protected $instruction;

    public function __construct(Instruction $instruction)
    {
        $this->instruction = $instruction;
    }

    public function addInstruction($data)
    {
        $instruction = new $this->instruction;

        $instruction->instruction_type = $data['instruction_type'];
        $instruction->vendor_name = $data['associates']['vendor_name'];
        $instruction->vendor_addres = $data['associates']['vendor_addres'];
        $instruction->attention_of = $data['attention_of'];
        $instruction->quatation_no = $data['quatation_no'];
        $instruction->invoice_name = $data['invoice']['name'];
        $instruction->invoice_status = 'progress';
        $instruction->customer_contract = $data['associates']['customer_contract'];
        $instruction->customer_po_no = $data['associates']['customer_po_no'];
        $instruction->desc = $data['desc'];
        $instruction->qty = $data['qty'];
        $instruction->uom = $data['uom'];
        $instruction->unit_price = $data['unit_price'];
        $instruction->disc = $data['disc'];
        $instruction->tax = $data['tax'];
        $instruction->invoice_total = ($total=$instruction->qty*$instruction->unit_price)+($total*$instruction->tax)-($total*$instruction->disc);
        $instruction->charge = $data['charge'];
        $instruction->notes = $data['notes'];
        $instruction->attachtment = $data['attachtment'];
        $instruction->link = $data['link'];
        $instruction->save();
        return $instruction->fresh();

    }

    public function terminateInstruction($data, $id)
    {
        $instruction = $this->instruction->find($id);
        $instruction->status = "Cancelled";
        $instruction->cancel_reason = $data['reason'];
        $instruction->update();
        return $instruction;
    }   
}

