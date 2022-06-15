<?php
declare(strict_types=1);
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

    public function getAll(){
        $instruction = Instruction::all();

        $data = $instruction->toArray()[0];
        return [
            'instruction_id'=> $data['instruction_id'],
            'link' => $data['link'],
            'intruction_type' => $data['instruction_type'],
            'assigned_vendor' => $data['associates_vendor_name'],
            'attention_of' => $data['attention_of'],
            'quotation_no' => $data['quatation_no'],
            'customer_po_no' => $data['associates_customer_po_no'],
            'status'=>$data['invoice_status'],
        ];                
    }

    public function getCompleted()
    {
        $instruction = Instruction::where('invoice_status','completed')->get();
        
        // $allProducts = $instruction->map(function ($instruction)  {
        //     return [
        //         'instruction_id'=> $instruction->instruction_id,
        //         'link' => $instruction->link,
        //         'intruction_type' => $instruction->instruction_type,
        //         'assigned_vendor' => $instruction->associates_vendor_name,
        //         'attention_of' => $instruction->attention_of,
        //         'quotation_no' => $instruction->quatation_no,
        //         'customer_po_no' => $instruction->associates_customer_po_no,
        //         'status'=> $instruction->invoice_status
        //     ];
        // });
        // return($allProducts);
    }

    public function getById($id)
    {
        $instruction = Instruction::where('_id', $id)->get();
        $data = $instruction->toArray()[0];
        return [
            'id' => $data['_id'],
            'instruction_id'=> $data['instruction_id'],
            'intruction_type' => $data['instruction_type'],
            'assigned_vendor' => $data['associates_vendor_name'],
            'attention_of' => $data['attention_of'],
            'quotation_no' => $data['quatation_no'],
            'invoice_to' =>	$data['invoice_name'],
            'vendor_address' =>	$data['associates_vendor_addres'],
            'customer_contract' => $data['associates_customer_contract'],
            'customer_po_no' => $data['associates_customer_po_no'],
            'cost_detail'=>[
                'description' => $data['desc'],
                'quantity' => $data['qty'],
                'uom' => $data['uom'],
                'unit_price' => $data['unit_price'],
                'discount' => $data['disc'],
                'gst_vat' => $data['tax'],
                'currency' => $data['curenncy'],
                'vat_amount' => intval($data['invoice_total'])*intval($data['tax'])/100,
                'sub_total' => intval($data['qty'])*intval($data['unit_price']),
                'total' => $data['invoice_total'],
                'charge_to' => $data['charge'],
            ],
            'notes' => $data['notes'],
            // 'attachtment' => $data['attachtment'],
            'link' => $data['link'],
            'invoice_status' => $data['invoice_status'],
        ];
        // dd($instruction);

        // $instruction->map(function ($instruction)  {
        //     return [
        //         'id' => $instruction->id,
        //         'instruction_id'=> $instruction->instruction_id,
        //         'intruction_type' => $instruction->instruction_type,
        //         'assigned_vendor' => $instruction->associates_vendor_name,
        //         'attention_of' => $instruction->attention_of,
        //         'quotation_no' => $instruction->quatation_no,
        //         'invoice_to' =>	$instruction->invoice_name,
        //         'vendor_address' =>	$instruction->associates_vendor_addres,
        //         'customer_contract' => $instruction->associates_customer_contract,
        //         'customer_po_no' => $instruction->associates_customer_po_no,
        //         'cost_detail'=>[
        //             'description' => $instruction->desc,
        //             'quantity' => $instruction->qty,
        //             'uom' => $instruction->uom,
        //             'unit_price' => $instruction->unit_price,
        //             'discount' => $instruction->disc,
        //             'gst_vat' => $instruction->tax,
        //             'currency' => $instruction->curenncy,
        //             'vat_amount' => $instruction->invoice_total*$instruction->tax/100,
        //             'sub_total' => $instruction->qty*$instruction->unit_price,
        //             'total' => $instruction->invoice_total,
        //             'charge_to' => $instruction->charge,
        //         ],
        //         'notes' => $instruction->notes,
        //         'attachtment' => $instruction->attachtment,
        //         'link' => $instruction->link,
        //         'invoice_status' => $instruction->invoice_status,
        //     ];
        // });
        
        // return ($allProducts);
    }

    public function addInstruction($data)
    {
        $id = Instruction::count();
        $idcount = ++$id;
        
        $instruction = new $this->instruction;     
        $instruction->instruction_type = $data['instruction_type'];
        $instruction->instruction_id = $instruction->instruction_type.("-").date("Y").("-").str_pad(strval($idcount), 4, "0", STR_PAD_LEFT);
        $instruction->associates_vendor_name = $data['associates_vendor_name'];
        $instruction->associates_vendor_addres = $data['associates_vendor_addres'];
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
        $instruction->curenncy = $data['curenncy'];
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
        // dd($instruction->fresh());

        return $instruction;
    }

    public function update($id,$data)
    {
        $instruction = $this->instruction->find($id);
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

    public function terminateInstruction($data, $id)
    {
        $instruction = $this->instruction->find($id);
        $instruction->status = "Cancelled";
        $instruction->cancel_reason = $data['reason'];
        $instruction->update();
        return $instruction;
    }   
}

