<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OcrController extends Controller
{
    public function showForm()
    {
    	$data = ['title'	=> "Upload File"];
    	return view('ocr.form', $data);
    }
}
