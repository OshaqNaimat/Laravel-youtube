<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
     public function createComment(Request $req){

        //   if the user is not logged in
           $user =Auth::user();
           if(!$user){
            return false;
           }else{





        // if the user is logged in
             $formFields = [
                 "comment" =>$req->input('comment'),
                 "video_id"=>$req->input('video_id'),
                 "user_id" =>$req->input('user_id'),
             ];


             Comments::create($formFields);
             $allComments = Comments::where('video_id',$formFields['video_id'])->get();

         return response()->json([
            'message'=>'Comment Added Successfully!!',
            'comments'=>$allComments,
            ]);

         }
     }
}
