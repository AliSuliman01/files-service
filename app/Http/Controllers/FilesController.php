<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function upload(FileUpdateRequest $request){

            $data = $request->validated();

            if(isset($data['file_name']))
                $fileNameWithExtension =  Carbon::now()->toDateTimeLocalString() . '_' . $data['file_name'].'.'.$data['file']->extension();
            else
                $fileNameWithExtension = $data['file']->getClientOriginalName();

            $access_path = "/{$data['file_path']}/$fileNameWithExtension" ;

            $request->file('file')->move(public_path($access_path));

            return response()->json(success($access_path));
    }
}
