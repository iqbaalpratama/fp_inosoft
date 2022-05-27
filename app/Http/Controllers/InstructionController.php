<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstructionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'instruction_type' => 'required',
            'vendor_name' => 'required',
            'vendor_addres' => 'required',
            'attention_of' => 'required',
            'quatation_of' => 'required',
            'invoice.name' => 'required',
            'invoice.status',
            'desc' => 'required',
            'qty' => 'required',
            'uom' => 'required',
            'unit_price' => 'required',
            'tax',
            'invoice.total',
            'charge' => 'required',
            'notes',
            // 'attachtment' => 'required|mimes:doc,docx,pdf,txt,csv|max:2048',
            'link' => 'required'

        ]);



        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $instruction = Instruction::create([
            'instruction_type' => $request->instruction_type,
            'vendor_name' => $request->vendor_name,
            'vendor_addres' => $request->vendor_addres,
            'attention_of' => $request->quatation_no,
            'quatation_of' => $request->customer_addres,
            'invoice.name' => $request->invoice_name,
            'invoice.status' => "progress",
            'desc' => $request->desc,
            'qty' => $request->qty,
            'uom' => $request->uom,
            'unit_price' => $request->unit_price,
            'tax' => $request->tax,
            'invoice.total' => $request->qty*$request->unit_price,
            'charge' => $request->charge,
            'notes' => $request->notes,
            // 'attachtment' => $request->attachtment,
            'link' => $request->link

         ]);

        //  if ($file = $request->file('attachtment')) 
        //     $path = $file->store('public/files'); 
        //     $name = $file->getClientOriginalName();
        //     //store your file into directory and db
        //     $save = new Instruction();
        //     $save->$name = $file;
        //     $save-> store_path = $path;
        //     $save->save();
        
            
            return response()->json(["created succses",$instruction]);    
        }
}
