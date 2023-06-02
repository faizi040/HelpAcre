<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\event;

class EventController extends Controller
{
    function AdminEvent()
    {
        if (Auth::User()->role == 0) {
            return back();
        } else {
            //selelct query
            $eventlist = event::paginate(5);
            $data = compact('eventlist');
            return view('admin.AddEvent')->with($data);
        }
    }

    function AddEvent(Request $request)
    {

        $request->validate([     //Event form validation validation

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'location' => 'required',
            'datetime' =>   'required',
            

        ]);
        $input = $request->all();
        //storing image into laravel folder
        $fileNameWithExtention = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
        $fileExtention = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
        $request->image->move(public_path('Event-images/'), $fileNameToStore);
        // $gallery = new image;
        $input['image'] = $fileNameToStore;
        $add = event::create($input);

        if ($add) {

            return back()->with('success', 'New Event added added Sucessfully');
        } else {
            return back()->with('Fail', 'An error occured');
        }
    }
    function EditEvent($id)
    {
        $EditEvent = event::find($id);
        if (is_null($EditEvent)) {
            return back();
        } else {
            return view('admin.UpdateEvent', compact('EditEvent'));
        }
    }

    function UpdateEvent(Request $request, $id)
    {

        $request->validate([

            'title' => 'required',
            'location' => 'required',
            'datetime' =>   'required',
            
        ]);
        $UpdateEvent = event::find($id);
        if (!is_null($UpdateEvent)) {
            $input = $request->all();
            if ($image = $request->file('image')) {
                $fileNameWithExtention = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
                $fileExtention = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
                $request->image->move(public_path('Event-images/'), $fileNameToStore);
                $input['image'] = $fileNameToStore;
            } else {
                unset($input['image']);
            }
        }

        $update = $UpdateEvent->update($input);
        if ($update) {

            return redirect('/AdminEvent')->with('success', 'Event Updated  Sucessfully');
        } else {
            return redirect('/AdminEvent')->with('Fail', 'An error occured');
        }
    }


    function DeleteEvent($id)
    {
        $DeleteEvent = event::find($id);
        if (!is_null($DeleteEvent)) {
            $delete = $DeleteEvent->delete();
            if ($delete) {

                return redirect('/AdminEvent')->with('success', 'New Event deleted Sucessfully');
            } else {
                return redirect('/AdminEvent')->with('Fail', 'An error occured');
            }
        }
    }
}
