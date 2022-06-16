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

    private function checkTypeFile($extension){
        $type = '';
        switch ($extension) {
            case 'doc':
            case 'docx':
            case 'pdf':
            case 'txt':
            case 'csv':
                $type = 'document';
                break;
            case 'jpg':
            case 'png':
                $type = 'image';
                break;
            case 'mp4':
                $type = 'video';
                break;
        }
        return $type;
    }

    public function createMany($data, $id, $type)
    {
        $files = $data['attachment'];
        foreach ($files as $file) {
            $path = 'Data/Attachment/'.$id.'/'.$type;
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $attachment = new $this->attachment;
            $attachment->attachment_id = $id;
            $attachment->path = $path;
            $attachment->name = $file->getClientOriginalName();;
            $attachment->type = $this->checkTypeFile($extension);
            $attachment->mime = $extension;
            $attachment->size = $file->getSize();
            $attachment->save();
            $file->move($path, $filename);
        }
    }

}

