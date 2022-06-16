<?php

namespace App\Services;

use App\Repositories as Repository;
use App\Traits\Instruction;

class InstructionServices
{
    protected $instructionRepository;
    protected $updateInstructionRepository;
    protected $createInstructionRepository;
    use Instruction;

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
        $this->validate($data);
        $result = $this->createInstructionRepository->create($data);

        return $result;
    }

    public function editInstruction($id,$data)
    {
        $this->validate($data);
        $result = $this->updateInstructionRepository->update($id, $data);

        return $result;
    }

    public function getAll()
    {
        return $this->instructionRepository->getAll();
    }

    public function reciveInvoice()
    {
        # code...
    }

}