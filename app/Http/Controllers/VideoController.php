<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function upload(Request $req){
        $formFields = [
            'title'=>'required',
            'description'=>'required',
             'video' =>'required',
             'thumbnail' => 'nullable',
             'visibility' => ['required ']
        ];

       $formFields['video']= $req->file('video')->store('videos','public');
       $formFields['thumbnail']=$req->file('thumbnail')->store('thumbnail','public');

    //    store the data in the database

     Videos::create($formFields);




        }
}
