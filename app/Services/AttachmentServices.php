<?php

namespace App\Services;

use App\Repositories\AttachmentRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class AttachmentServices
{
    protected $attachmentRepository;

    public function __construct(AttachmentRepository $attachmentRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
    }

    public function saveAttachment($data,$type){
        // dd($data);
        $validator = Validator::make($data,[
            'attachment.*' => 'required|mimes:doc,docx,pdf,txt,csv,jpg,mp4,png|max:2048',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $this->attachmentRepository->createMany($data,$type);
    }

}