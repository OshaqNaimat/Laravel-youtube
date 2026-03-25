<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function uploadVideo(Request $req){
        $formFields = [
            'title'       =>$req->input('title'),
            'description' =>$req->input('description'),
             'video'      =>$req->input('video'),
             'thumbnail'  => $req->input('thumbnail'),
             'visibility' => $req->input('visibility')
        ];

       $formFields['video']= $req->file('video')->store('videos','public');
       $formFields['thumbnail']=$req->file('thumbnail')->store('thumbnail','public');

    //    store the data in the database

     Videos::create($formFields);

      return redirect('/');



        }



        public function getVideos(){
            $allData = Videos::all();
             return view('components.mainpage',compact('allData'));
        }
}
