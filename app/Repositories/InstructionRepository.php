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

    public function getAll(){
        $instruction = Instruction::all();

        $allProducts = $instruction->map(function ($instruction)  {
            return [
                'instruction_id'=> $instruction->instruction_id,
                'link' => $instruction->link,
                'intruction_type' => $instruction->instruction_type,
                'assigned_vendor' => $instruction->vendor_name,
                'attention_of' => $instruction->attention_of,
                'quotation_no' => $instruction->quatation_no,
                'customer_po_no' => $instruction->customer_po_no,
                'status'=> $instruction->invoice_status
            ];
        });
        
        
        return($allProducts);
    }

    public function getCompleted()
    {
        $instruction = Instruction::where('invoice_status','completed')->get();

        $allProducts = $instruction->map(function ($instruction)  {
            return [
                'instruction_id'=> $instruction->instruction_id,
                'link' => $instruction->link,
                'intruction_type' => $instruction->instruction_type,
                'assigned_vendor' => $instruction->vendor_name,
                'attention_of' => $instruction->attention_of,
                'quotation_no' => $instruction->quatation_no,
                'customer_po_no' => $instruction->customer_po_no,
                'status'=> $instruction->invoice_status
            ];
        });
        return($allProducts);
    }

    public function getById($id)
    {
        $instruction = Instruction::where('_id', $id)->get();

        $allProducts = $instruction->map(function ($instruction)  {
            return [
                'id' => $instruction->id,
                'instruction_id'=> $instruction->instruction_id,
                'intruction_type' => $instruction->instruction_type,
                'assigned_vendor' => $instruction->vendor_name,
                'attention_of' => $instruction->attention_of,
                'quotation_no' => $instruction->quatation_no,
                'invoice_to' =>	$instruction->invoice_name,
                'vendor_address' =>	$instruction->vendor_addres,
                'customer_contract' => $instruction->customer_contract,
                'customer_po_no' => $instruction->customer_po_no,
                'cost_detail'=>[
                    'description' => $instruction->desc,
                    'quantity' => $instruction->qty,
                    'uom' => $instruction->uom,
                    'unit_price' => $instruction->unit_price,
                    'discount' => $instruction->disc,
                    'gst_vat' => $instruction->tax,
                    'currency' => $instruction->curenncy,
                    'vat_amount' => $instruction->invoice_total*$instruction->tax/100,
                    'sub_total' => $instruction->qty*$instruction->unit_price,
                    'total' => $instruction->invoice_total,
                    'charge_to' => $instruction->charge,
                ],
                'notes' => $instruction->notes,
                'attachtment' => $instruction->attachtment,
                'link' => $instruction->link,
                'invoice_status' => $instruction->invoice_status,
            ];
        });
        
        
        return($allProducts);
    }

    public function addInstruction($data)
    {
        $id = Instruction::count();
        $idcount = ++$id;
        
        $instruction = new $this->instruction;     
        $instruction->instruction_type = $data['instruction_type'];
        $instruction->instruction_id = $instruction->instruction_type.("-").date("Y").("-").str_pad($idcount, 4, "0", STR_PAD_LEFT);
        $instruction->vendor_name = $data['associates_vendor_name'];
        $instruction->vendor_addres = $data['associates_vendor_addres'];
        $instruction->attention_of = $data['attention_of'];
        $instruction->quatation_no = $data['quatation_no'];
        $instruction->invoice_name = $data['invoice_name'];
        $instruction->invoice_status = 'canceled';
        $instruction->customer_contract = $data['associates_customer_contract'];
        $instruction->customer_po_no = $data['associates_customer_po_no'];
        $instruction->desc = $data['desc'];
        $instruction->qty = $data['qty'];
        $instruction->uom = $data['uom'];
        $instruction->unit_price = $data['unit_price'];
        $instruction->disc = $data['disc'];
        $instruction->tax = $data['tax'];
        $instruction->curenncy = $data['curenncy'];
        $instruction->invoice_total =( $instruction->curenncy == 'usd'|| $instruction->curenncy == "USD") ? ($total=$instruction->qty*$instruction->unit_price)+($total*$instruction->tax/100)-($total*$instruction->disc/100) : (($total=$instruction->qty*$instruction->unit_price)+($total*$instruction->tax/100)-($total*$instruction->disc/100))*3.67 ;
        $instruction->charge = $data['charge'];
        $instruction->notes = $data['notes'];
        $instruction->attachtment = $data['attachtment'];
        $instruction->link = $data['link'];

        $instruction->save();

        

        return $instruction->fresh();
    }

    public function update($id,$data){
        // $count = Instruction::count();
        // $idcount = ++$count;
        
        $instruction = $this->instruction->find($id);

        $instruction->instruction_type = $data['instruction_type'];
        $instruction->vendor_name = $data['associates_vendor_name'];   
        $instruction->vendor_addres = $data['associates_vendor_addres'];
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
        $instruction->curenncy = $data['curenncy'];
        $instruction->invoice_total =( $instruction->curenncy == "usd" || "USD") ? ($total=$instruction->qty*$instruction->unit_price)+($total*$instruction->tax/100)-($total*$instruction->disc/100) : (($total=$instruction->qty*$instruction->unit_price)+($total*$instruction->tax/100)-($total*$instruction->disc/100))*3.67 ;
        $instruction->charge = $data['charge'];
        $instruction->notes = $data['notes'];
        $instruction->attachtment = $data['attachtment'];
        $instruction->link = $data['link'];
        $instruction->update();
        return $instruction;
    }

    
}

