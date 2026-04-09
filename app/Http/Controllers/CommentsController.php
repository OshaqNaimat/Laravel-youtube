<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
     public function createComment(Request $req){
             $formFields = [
                 "comment"->$req->input('comment'),
                 "video_id"->$req->input('video_id'),
                 "user_id"->$req->input('user_id'),
             ];
     }
}
