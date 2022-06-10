<?php

namespace App\Repositories;

use App\Models\Attachment;

class AttachmentRepository
{

    protected $attachment;

    public function __construct(Attachment $attachment)
    {
        $this->attachment = $attachment;
    }


    public function create($data)
    {
        $attachment = new $this->attachment;
        $attachment->save();
        return $attachment->fresh();
    }
    
}

