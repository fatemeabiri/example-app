<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Validator;

class UploaderController extends BaseController
{
    //
public function upload(Request $request)
{

    $validator = Validator::make($request->all(), [
//        'file' => 'required|mimes:doc,docx,pdf,txt,csv|max:2048',
      //  'file' => 'required|mimes:png,jpg,jpeg,gif',//|max:2305',
        'file'          =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required',

    ]);

    if ($validator->fails()) {

        return $this->sendError('Validation Error.', $validator->errors());
    }
    if ($file = $request->file('file')) {
        $path = $file->store('public/files');
        $name = $file->getClientOriginalName();

        //store your file into directory and db
        $save = new File();
        $save->name = $file;
        $save->path = $path;
        $save->save();

        $success['file'] = $file;

        return $this->sendResponse($success, 'File successfully uploaded');


    }
}
}
