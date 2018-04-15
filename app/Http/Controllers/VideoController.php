<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

use App\Video;
use App\Coment;


class VideoController extends Controller
{
    //

public function createVideo(){

	return view('Video.createVideo');
}

public function saveVideo(Request $request){

	$validatedData= $this->validate($request,[
		'title'=>'required|min:5',
		'description'=>'required',
		'video'=>'mimes:mp4'

	]);
}


}
