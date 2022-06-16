<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Instruction;

class UpdateInstructionRepository
{

    protected $instruction;

    public function __construct(Instruction $instruction)
    {
        $this->instruction = $instruction;
        // $this->path = storage_path('app/public/file');
        // $this->dimension = 500;
    }

    public function update($id,$data)
    {
        $instruction = $this->instruction->find($id);
        $instruction->vendor_name = $data['associates_vendor_name'];   
        $instruction->vendor_addres = $data['associates_vendor_address'];
        $instruction->attention_of = $data['attention_of'];
        $instruction->quatation_no = $data['quatation_no'];
        $instruction->invoice_name = $data['invoice_name'];
        $instruction->invoice_status = 'progress';
        $instruction->customer_contract = $data['associates_customer_contract'];
        $instruction->customer_po_no = $data['associates_customer_po_no'];
        $instruction->desc = $data['desc'];
        $instruction->qty = $data['qty'];
        $instruction->uom = $data['uom'];
        $instruction->unit_price = $data['unit_price'];
        $instruction->disc = $data['disc'];
        $instruction->tax = $data['tax'];
        $instruction->invoice_total =$data['invoice_total'];
        $instruction->charge = $data['charge'];
        $instruction->notes = $data['notes'];
        $instruction->attachtment = $data['attachtment'];
        $instruction->link = $data['link'];
        // if ($file = $data->file('attachtment')) 
        // $path = $file->store('public/files'); 
        // $name = $file->getClientOriginalName();
        // $instruction->$name = $file;
        // $instruction-> store_path = $path;
        $instruction->update();
        return $instruction;
    }

    
}

