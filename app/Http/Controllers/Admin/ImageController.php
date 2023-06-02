<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\image;

class ImageController extends Controller
{
    function image()
    {
        if (Auth::User()->role == 0) {
            return back();
        } else {
            //selelct query
            $gallery = image::paginate(5);
            $data = compact('gallery');
            return view('admin.image')->with($data);
        }
    }

    //insert Query
    function AddImage(Request $request)
    {
        $request->validate([     //image validation

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $input = $request->all();
        //storing image into laravel folder
        $fileNameWithExtention = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
        $fileExtention = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
        $request->image->move(public_path('Gallery-images/'), $fileNameToStore);

        //saving image-name into databse

        // $gallery = new image;
        $input['image'] = $fileNameToStore;
        $add = image::create($input);
        // $gallery->image=$fileNameToStore;
        // $gallery->save();
        if ($add) {

            return back()->with('success', 'New Image added added Sucessfully');
        } else {
            return back()->with('Fail', 'an error occured');
        }
    }
    function editImage($id)
    {
        $editimage = image::find($id);
        if (is_null($editimage)) {
            return back();
        } else {
            return view('admin.imageUpdate', compact('editimage'));
        }
    }
    function updateImage(Request $request, $id)
    {
        $request->validate([     //image validation

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $updateImage = image::find($id);
        if (!is_null($updateImage)) {
            $input = $request->all();
            $fileNameWithExtention = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
            $fileExtention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
            $request->image->move(public_path('Gallery-images/'), $fileNameToStore);
            $input['image'] = $fileNameToStore;
        } else {
            unset($input['image']);
        }

        $update = $updateImage->update($input);
        if ($update) {

            return redirect('/image')->with('success', 'Image Updated Sucessfully');
        } else {
            return redirect('/image')->with('Fail', 'An error occured');
        }
    }

    function deleteImage($id)
    {
        $deleteImage = image::find($id);
        if (!is_null($deleteImage)) {
            $delete = $deleteImage->delete();
            if ($delete) {

                return redirect('/image')->with('success', 'Image deleted Sucessfully');
            } else {
                return redirect('/image')->with('Fail', 'An error occured');
            }
        }
    }
}
