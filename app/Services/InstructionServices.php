<?php

namespace App\Services;

use App\Repositories as Repository;
use App\Traits\validateInstruction;
use Illuminate\Support\Facades\Validator ;
use InvalidArgumentException;

class InstructionServices
{
    protected $instructionRepository;
    protected $updateInstructionRepository;
    protected $createInstructionRepository;
    use validateInstruction;

    public function __construct
    (
        Repository\InstructionRepository $instructionRepository,
        Repository\CreateInstructionRepository $createInstructionRepository,
        Repository\UpdateInstructionRepository $updateInstructionRepository 
    )
    {
        $this->instructionRepository = $instructionRepository;
        $this->createInstructionRepository = $createInstructionRepository;
        $this->updateInstructionRepository = $updateInstructionRepository;
    }

    public function getById($id)
    {
        return $this->instructionRepository->getById($id);
    }


    public function saveInstruction($data)
    {
        $this->validateCreate($data);
        $result = $this->createInstructionRepository->create($data);

        return $result;
    }

    public function editInstruction($id,$data)
    {
        $this->validateUpdate($data);
        $result = $this->updateInstructionRepository->update($id, $data);

        return $result;
    }

    public function getAll()
    {
        return $this->instructionRepository->getAll();
    }


    public function receieveInvoice($id,$data)
    {
        $result = $this->instructionRepository->receieveInvoice($id,$data);

        return $result;
    }

    public function terminateInstruction($data, $id){
        $validator = Validator::make($data,[
            'cancel_reason'
        ]);
        

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }


        $result = $this->instructionRepository->terminateInstruction($data, $id);

        return $result;
    }

}