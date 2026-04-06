<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       $formFields['user_id'] = Auth::id();
    //    store the data in the database

     Videos::create($formFields);

    //  redirection

      return back()->with('message','Video Published Successfully');



        }



        public function getVideos(){
            $allVideos = Videos::all();
             return view('welcome',compact('allVideos'));
        }

        public function getSinglePageVideos(){
            $allSingleVideos = Videos::all();
             return view('single-video',compact('allSingleVideos'));
        }


        public function getSingleVideo($id){
             $video = Videos::find($id);
             return view('single-video',compact('video'));
        }
}
