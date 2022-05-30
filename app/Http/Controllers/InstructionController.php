<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Services\InstructionServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstructionController extends Controller
{
    protected $instructionServices;

        public function __construct(InstructionServices $instructionServices)
        {
            $this->instructionServices = $instructionServices;
        }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'instruction_type' => 'required',
            'associates.vendor_name' => 'required',
            'associates.vendor_addres' => 'required',
            'attention_of' => 'required',
            'quatation_of' => 'required',
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



        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        //membuat data instructions

        $instruction = Instruction::create([
            'instruction_type' => $request->instruction_type,
            'associates.vendor_name' => $request->vendor_name,
            'associates.vendor_addres' => $request->vendor_addres,
            'attention_of' => $request->attention_of,
            'quatation_no' => $request->quatation_no,
            'invoice.name' => $request->invoice_name,
            'invoice.status' => "progress",
            'associates.customer_contract'=>$request->customer_contract,
            'associates.customer_po_no'=>$request->customer_po_no,
            'desc' => $request->desc,
            'qty' => $request->qty,
            'uom' => $request->uom,
            'unit_price' => $request->unit_price,
            'disc' => $request->disc,
            'tax' => $request->tax,
            'invoice.total' => ($total = $request->qty*$request->unit_price)+($total*$request->tax/100)-($total*$request->disc/100),
            'charge' => $request->charge,
            'notes' => $request->notes,
            'attachtment' => $request->attachtment,
            'link' => $request->link

         ]);

         if ($file = $request->file('attachtment')) 
            $path = $file->store('public/files'); 
            $name = $file->getClientOriginalName();
            $save = new Instruction();
            $save->$name = $file;
            $save-> store_path = $path;
            $save->save();
        
            
            return response()->json(["created instruction succses",$instruction]);    
        }
}
