<?php

namespace App\Repositories;

use App\Models\Instruction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class InstructionRepository
{

    protected $instruction;

    public function __construct(Instruction $instruction)
    {
        $this->instruction = $instruction;
    }

    public function getAll(){
        $instruction = Instruction::all();

        return($instruction);
    }

    public function getById($id)
    {
        $instruction = $this->instruction->find($id);
        
        return($instruction);
    }

    public function addInstruction($data)
    {
        $id = Instruction::count();
        $idcount = ++$id;

        $instruction = new $this->instruction;

        
        $instruction->instruction_type = $data['instruction_type'];
        $instruction->instruction_id = $instruction->instruction_type.("-").date("Y").("-").$idcount;
        $instruction->vendor_name = $data['vendor_name'];
        $instruction->vendor_addres = $data['vendor_addres'];
        $instruction->attention_of = $data['attention_of'];
        $instruction->quatation_no = $data['quatation_no'];
        $instruction->invoice_name = $data['invoice_name'];
        $instruction->invoice_status = 'progress';
        $instruction->customer_contract = $data['customer_contract'];
        $instruction->customer_po_no = $data['customer_po_no'];
        $instruction->desc = $data['desc'];
        $instruction->qty = $data['qty'];
        $instruction->uom = $data['uom'];
        $instruction->unit_price = $data['unit_price'];
        $instruction->disc = $data['disc'];
        $instruction->tax = $data['tax'];
        $instruction->invoice_total =($total=$instruction->qty*$instruction->unit_price)+($total*$instruction->tax/100)-($total*$instruction->disc/100);
        $instruction->charge = $data['charge'];
        $instruction->notes = $data['notes'];
        $instruction->attachtment = $data['attachtment'];
        $instruction->link = $data['link'];
        $instruction->save();


        return $instruction->fresh();
    }

    public function update($id,$data){
        $count = Instruction::count();
        $idcount = ++$count;
        
        $instruction = $this->instruction->find($id);

        $instruction->instruction_type = $data['instruction_type'];
        $instruction->instruction_id = $instruction->instruction_type.("-").date("Y").("-").$idcount;
        $instruction->vendor_name = $data['vendor_name'];   
        $instruction->vendor_addres = $data['vendor_addres'];
        $instruction->attention_of = $data['attention_of'];
        $instruction->quatation_no = $data['quatation_no'];
        $instruction->invoice_name = $data['invoice_name'];
        $instruction->invoice_status = 'progress';
        $instruction->customer_contract = $data['customer_contract'];
        $instruction->customer_po_no = $data['customer_po_no'];
        $instruction->desc = $data['desc'];
        $instruction->qty = $data['qty'];
        $instruction->uom = $data['uom'];
        $instruction->unit_price = $data['unit_price'];
        $instruction->disc = $data['disc'];
        $instruction->tax = $data['tax'];
        $instruction->invoice_total = ($total=$instruction->qty*$instruction->unit_price)+($total*$instruction->tax/100)-($total*$instruction->disc/100);
        $instruction->charge = $data['charge'];
        $instruction->notes = $data['notes'];
        $instruction->attachtment = $data['attachtment'];
        $instruction->link = $data['link'];
        $instruction->update();


        return $instruction;
    }

    
}

