<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\comment;              //using comment model

class MessageController extends Controller
{
    //show data
    function comment()
    {
        if (Auth::User()->role == 0) {
            return back();
        } else {
            //selelct query
            $comment = comment::paginate(5);  //bring all data from employee model/table and put in varibale at start
            $data = compact('comment'); //make array of data inside it($employee object) no need $ sign
            return view('admin.comment')->with($data);
        }
    }


    //add data
    function AddComment(Request $request)
    {

        $save = comment::create($request->all());
        if ($save) {

            return back()->with('success', 'New comment added addedSucessfully');
        } else {
            return back()->with('Fail', 'an error occured');
        }
    }

    function DeleteComment($id)
    {
        $comment = comment::find($id);
        if (!is_null($comment)) {
            $comment->delete();
            return back()->with('success', 'Comment deleted successfully');
        } else {

            return back()->with("Fail", "We did't delete the required record");
        }
    }
}
