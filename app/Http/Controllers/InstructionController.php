<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Services\AssociateServices;
use App\Services\AttachmentServices;
use App\Services\InstructionServices;
use Exception;
use Illuminate\Http\Request;


class InstructionController extends Controller
{
    protected $instructionServices;
    protected $attachmentServices;
    protected $associateServices;

    public function __construct(InstructionServices $instructionServices, AttachmentServices $attachmentServices, AssociateServices $associateServices)
    {
        $this->instructionServices = $instructionServices;
        $this->attachmentServices = $attachmentServices;
        $this->associateServices = $associateServices;
    }

    public function getAll()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->instructionServices->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }

    public function getDetail($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->instructionServices->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function receieveInvoice($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->instructionServices->receieveInvoice($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }


    public function getVendor()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->associateServices->getVendor();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }

    public function store(Request $request)
    {
        $data = $request->all();

        // function isJson($data) {
        //     json_decode($data);
        //     return json_last_error() === JSON_ERROR_NONE;
        //  }
         
        // dd(isJson($data));
        
        
        try {
            $result = ['status' => 200];
            $result['data'] = $this->instructionServices->saveInstruction($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        // dd($result);

        return response()->json($result, $result['status']);        
    }

    public function update(Request $request,$id)
    {
        $data = $request->all();
        
    
        try {
            $result = ['status' => 200];
            $result['data'] = $this->instructionServices->editInstruction($id,$data);
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
            'attachment',
            'cancel_reason', 
        ]);

        try {
            $result = ['status' => 200];
            $result['data'] = $this->instructionServices->terminateInstruction($id,$data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

}
