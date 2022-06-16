<?php
namespace App\Repositories;

use App\Models\Instruction;


class InstructionRepository
{
    public string $path;
    public string $dimension;
    protected $instruction;

    public function __construct(Instruction $instruction)
    {
        $this->instruction = $instruction;
        // $this->path = storage_path('app/public/file');
        // $this->dimension = 500;
    }

    public function getAll()
    {
        $instruction = $this->instruction::all();
       
        return $instruction->map(function ($instruction,$i)  {
            return [
                'instruction_id'=> $instruction->instruction_type.("-").date("Y").("-").str_pad( $i+=1, 4, "0", STR_PAD_LEFT),
                'link' => $instruction->link,
                'intruction_type' => $instruction->instruction_type,
                'assigned_vendor' => $instruction->associates_vendor_name,
                'attention_of' => $instruction->attention_of,
                'quotation_no' => $instruction->quatation_no,
                'customer_po_no' => $instruction->associates_customer_po_no,
                'status'=> $instruction->invoice_status
            ];
        });
    }

    public function getById($id)
    {
        $instruction = $this->instruction::where('_id', $id)->get();

        return $instruction->map(function ($instruction)  {
            return [
                    'id' => $instruction->_id,
                    'intruction_type' => $instruction->instruction_type,
                    'assigned_vendor' => $instruction->associates_vendor_name,
                    'attention_of' => $instruction->attention_of,
                    'quotation_no' => $instruction->quatation_no,
                    'invoice_to' =>	$instruction->invoice_name,
                    'vendor_address' =>	$instruction->associates_vendor_addres,
                    'customer_contract' => $instruction->associates_customer_contract,
                    'customer_po_no' => $instruction->associates_customer_po_no,
                    'cost_detail'=>[
                        'description' => $instruction->desc,
                        'quantity' => $instruction->qty,
                        'uom' => $instruction->uom,
                        'unit_price' => $instruction->unit_price,
                        'discount' => $instruction->disc,
                        'gst_vat' => $instruction->tax,
                        'currency' => $instruction->curenncy,
                        'vat_amount' => intval($instruction->invoice_total)*intval($instruction->tax)/100,
                        'sub_total' => intval($instruction->qty)*intval($instruction->unit_price),
                        'total' => $instruction->invoice_total,
                        'charge_to' => $instruction->charge,
                    ],
                    'notes' => $instruction->notes,
                    // 'attachtment' => $instruction->attachtment,
                    'link' => $instruction->link,
                    'invoice_status' => $instruction->invoice_status,
            ];
        });
        
    }

    public function reciveInvoice($id)
    {
        
        $instruction = $this->instruction->find($id);
        $instruction->invoice_status = "Completed";
        $instruction->update();
        return $instruction;
    }
    
}

