<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Instruction;
use Illuminate\Support\Facades\DB;

class CreateInstructionRepository
{
    
    protected  $instruction;

    public function __construct(Instruction $instruction)
    {
        $this->instruction = $instruction;
    }

    public function create($data)
    {
        // $id = $this->instruction::latest()->first();
        // dd($id);
        
        $instruction = new $this->instruction;     
        $instruction->instruction_type = $data['instruction_type'];
        $instruction->associates_vendor_name = $data['associates_vendor_name'];
        $instruction->associates_vendor_addres = $data['associates_vendor_address'];
        $instruction->attention_of = $data['attention_of'];
        $instruction->quatation_no = $data['quatation_no'];
        $instruction->invoice_name = $data['invoice_name'];
        $instruction->invoice_status = "in proggres";
        $instruction->associates_customer_contract = $data['associates_customer_contract'];
        $instruction->associates_customer_po_no = $data['associates_customer_po_no'];
        $instruction->desc = $data['desc'];
        $instruction->qty = $data['qty'];
        $instruction->uom = $data['uom'];
        $instruction->unit_price = $data['unit_price'];
        $instruction->disc = $data['disc'];
        $instruction->tax = $data['tax'];
        $instruction->invoice_total = $data['invoice_total'];
        $instruction->charge = $data['charge'];
        $instruction->notes = $data['notes'];
        // $instruction->attachtment = $data['attachtment'];
        $instruction->link = $data['link'];
        // if ($file = $data['attachtment']->file()) 
        // $path = $file->store('public/files'); 
        // $name = $file->getClientOriginalName();
        // $instruction->$name = $file;
        // $instruction-> store_path = $path;
        $instruction->save();

        return $instruction;
    }

    
    
}

