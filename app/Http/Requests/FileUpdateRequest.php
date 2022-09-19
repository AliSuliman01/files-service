<?php

namespace App\Http\Requests;

class FileUpdateRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'file' => 'required|file',
            'file_path' => 'required|string'
        ];
    }
}

