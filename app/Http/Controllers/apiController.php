<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use TesseractOCR;

use URL;

class apiController extends Controller
{
    public function fileUploadHandler(Request $request)
    {
    	//dd($request);
    	if($request->hasFile('file'))
        {
            $file = $request->file('file');

            $destinationPath = public_path().'/assets/images/';
            
            $filename = 'file_'.str_random(15);
            $extension = $file->getClientOriginalExtension();

            $destinationFilename = $filename.'.'.$extension;
            $upload_success = $file->move($destinationPath, $destinationFilename);

            $image = $destinationPath.$destinationFilename;
           

    		$tesseract = new TesseractOCR($image);
			$output = $tesseract->lang('eng', 'jpn', 'por')->run();

			return response()->json([
				'output'	=> $output,
				'token'		=> $request->_token
			]);
            
        } else {
        	return response()->json([
				'error'		=> "Can't process form",
				'message' 	=> "You have to select a file first"
			]);
        }
    }
}
