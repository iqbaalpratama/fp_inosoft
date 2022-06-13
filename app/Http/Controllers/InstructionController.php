<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Services\AttachmentServices;
use App\Services\InstructionServices;
use Exception;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    protected $instructionServices;

        public function __construct(InstructionServices $instructionServices, AttachmentServices $attachmentServices)
        {
            $this->instructionServices = $instructionServices;
            $this->attachmentServices = $attachmentServices;
        }

    public function store(Request $request)
    {
        

        $data = $request->only([
            'instruction_type',
            'associates.vendor_name',
            'associates.vendor_addres',
            'attention_of',
            'quatation_no',
            'invoice.name',
            'invoice.status',
            'associates.customer_contract',
            'associates.customer_po_no',
            'desc',
            'qty',
            'uom',
            'unit_price',
            'disc',
            'tax',
            'invoice.total',
            'charge' ,
            'notes',
            'attachtment',
            'link' 

        ]);

        if ($file = $request->file('attachtment')) 
        $path = $file->store('public/files'); 
        $name = $file->getClientOriginalName();
        $save = new Instruction();
        $save->$name = $file;
        $save-> store_path = $path;
        $save->save();
        
        
        // dd ($data['associates']['vendor_name']);
        // dd($a);
        
        try {
            $result = ['status' => 200];
            $result['data'] = $this->instructionServices->saveInstruction($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
        
    }

    public function terminate(Request $request, $id){
        $data = $request->only([
            'attachtment',
            'cancel_reason', 
        ]);

        try {
            $result = ['status' => 200];
            $result['data'] = $this->instructionServices->terminateInstruction($data, $id);
            if($request->hasFile('attachment')){
                $this->attachmentServices->saveAttachment($data, $id, 'terminate');
            }
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
