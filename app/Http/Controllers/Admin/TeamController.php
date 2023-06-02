<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    
    function index()
    {
        if (Auth::User()->role == 0) {
            return back();
        } else {
            //selelct query
            $Members = team::paginate(5);
            return view('admin.AddMember', compact('Members'));
        }
    }

    function AddMember(Request $request)
    {


        $request->validate([     

            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'designation' => 'required',
            'description' => 'required'


        ]);
        $input = $request->all();
        //storing image into laravel folder
        $fileNameWithExtention = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
        $fileExtention = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
        $request->image->move(public_path('Team-images/'), $fileNameToStore);
        // $gallery = new image;
        $input['image'] = $fileNameToStore;
        $add = team::create($input);

        if ($add) {

            return back()->with('success', 'New Team Member  added Sucessfully');
        } else {
            return back()->with('Fail', 'An error occured');
        }
    }
    function EditMember(team $team)    // using model to directly find that record
    {

        if (is_null($team)) {
            return back();
        } else {
            return view('admin.UpdateMember', compact('team'));
        }
    }
    function UpdateMember(Request $request, team $team)
    {

        $request->validate([

            'name' => 'required',
            'designation' => 'required',
            'description' => 'required'


        ]);
        // $UpdateEvent = event::find($id);
        if (!is_null($team)) {
            $input = $request->all();
            if ($image = $request->file('image')) {
                $fileNameWithExtention = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
                $fileExtention = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
                $request->image->move(public_path('Team-images/'), $fileNameToStore);
                $input['image'] = $fileNameToStore;
            } else {
                unset($input['image']);
            }
        }

        $update = $team->update($input);
        if ($update) {

            return redirect('/team')->with('success', 'Team Member Updated  Sucessfully');
        } else {
            return redirect('/team')->with('Fail', 'An error occured');
        }
    }
    function DeleteMember(team $team)
    {
        if (!is_null($team)) {
            $delete = $team->delete();
            if ($delete) {
                return redirect('/team')->with('success', 'Team Member deleted Sucessfully');
            } else {
                return redirect('/team')->with('Fail', 'An error occured');
            }
        }
    }
}
