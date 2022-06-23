<?php

namespace App\Repositories;

use App\Models\Attachment;

class AttachmentRepository
{

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

    public function createMany($data, $type)
    {  
        $id = Attachment::all()->count();
        if ( $files = $data['attachment']) {        
            $filenameWithExt = $files->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $files->getClientOriginalExtension();
            $filenameToSave = $filename.'_'.time().'.'.$extension;
            $path = $files->storeAs('public/'.$type, $filenameToSave);
            $attachment = new Attachment();
            $attachment->attachment_id = ++$id ;
            $attachment->path = $path;
            $attachment->name = $filenameToSave;
            $attachment->type = $this->checkTypeFile($extension);
            $attachment->mime = $extension;
            $attachment->size = $files->getSize();
            $attachment->save();
        }
    }

}

