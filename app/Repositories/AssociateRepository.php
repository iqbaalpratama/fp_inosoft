<?php
namespace App\Repositories;

use App\Models\Associate;

class AssociateRepository
{
    protected $associate;

    public function __construct(Associate $associate)
    {
        $this->associate = $associate;
    }

    public function getVendor()
    {
        $vendor = $this->associate::all();
        return $vendor->map(function ($vendor)  {
            return[
                'id' => $vendor->id,
                'vendor_name' => $vendor->vendor_name,
                'vendor_address' => $vendor->vendor_address
            ];
        });
    }
}