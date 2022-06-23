<?php

namespace App\Services;

use App\Repositories\AssociateRepository;

class AssociateServices
{
    protected $associateRepository;

    public function __construct(AssociateRepository $associateRepository)
    {
        $this->associateRepository = $associateRepository;
    }

    public function getVendor()
    {
        return $this->associateRepository->getVendor();
    }
}