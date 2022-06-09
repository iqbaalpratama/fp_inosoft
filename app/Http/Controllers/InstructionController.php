<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Services\InstructionServices;
use Exception;
use Illuminate\Http\Request;


class InstructionController extends Controller
{
    protected $instructionServices;

    public function __construct(InstructionServices $instructionServices)
    {
        $this->instructionServices = $instructionServices;
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

    public function store(Request $request)
    {
        $data = $request->all();

        // function isJson($data) {
        //     json_decode($data);
        //     return json_last_error() === JSON_ERROR_NONE;
        //  }
         
        // dd(isJson($data));

        if ($file = $request->file('attachtment')) 
        $path = $file->store('public/files'); 
        $name = $file->getClientOriginalName();
        
        
        
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
    
        if ($file = $request->file('attachtment')) 
        $path = $file->store('public/files'); 
        $name = $file->getClientOriginalName();
        $save = new Instruction();
        $save->$name = $file;
        $save-> store_path = $path;
        $save->save();
                     
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
}
