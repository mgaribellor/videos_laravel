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

	
	$video = new Video();

	$video->user_id = \Auth::user()->id;
	
	$video->title = $request->input('title');
	$video->description = $request->input('description');

	//Subida de la imagen
		$image = $request->file('image');
		if($image){
			$image_path = time().'-'.$image->getClientOriginalName();
			\Storage::disk('images')->put($image_path, \File::get($image));

			$video->image=$image_path;

		}

	//Subida del video
	   $video_file = $request->file('video');
		if($video_file){
			$video_path = time().'-'.$video_file->getClientOriginalName();
			\Storage::disk('videos')->put($video_path, \File::get($video_file));

			$video->video_path=$video_path;

		}		


		//Guardado de video
	$video->save();


	return redirect()->route('Home')->with(array("message"=>'El video se cargo correctamente'));
/* 
	return view('Home')->with(array("message"=>'El video se cargo correctamente'));
*/
}

public function getImage($filename){

		$file= Storage::disk('images')->get($filename);
		return new Response($file,200);

}


}
