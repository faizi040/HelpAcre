<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

class ProjectController extends Controller
{
    function index()
    {
        if (Auth::User()->role == 0) {
            return back();
        } else {
            //selelct query
            $projects = project::paginate(5);
            return view('admin.AddProject', compact('projects'));
        }
    }
    function AddProject(Request $request)
    {


        $request->validate([     //Event form validation validation

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'description'=>'required',
            'target' => 'required',
            'timeline'=>'required'


        ]);
        $input = $request->all();
        //storing image into laravel folder
        $fileNameWithExtention = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
        $fileExtention = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
        $request->image->move(public_path('Project-images/'), $fileNameToStore);
        // $gallery = new image;
        $input['image'] = $fileNameToStore;
        $add = project::create($input);

        if ($add) {

            return back()->with('success', 'New Project  added Sucessfully');
        } else {
            return back()->with('Fail', 'An error occured');
        }
    }
    function EditProject(project $project)    // using model to directly find that record
    {

        if (is_null($project)) {
            return back();
        } else {
            return view('admin.UpdateProject', compact('project'));
        }
    }
    function UpdateProject(Request $request, project $project)
    {

        $request->validate([

            'title' => 'required',
            'target' => 'required',
            'description'=>'required',
            'timeline'=>'required'


        ]);
        // $UpdateEvent = event::find($id);
        if (!is_null($project)) {
            $input = $request->all();
            if ($image = $request->file('image')) {
                $fileNameWithExtention = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
                $fileExtention = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
                $request->image->move(public_path('Project-images/'), $fileNameToStore);
                $input['image'] = $fileNameToStore;
            } else {
                unset($input['image']);
            }
        }

        $update = $project->update($input);
        if ($update) {

            return redirect('/AdminProject')->with('success', 'Project Updated  Sucessfully');
        } else {
            return redirect('/AdminProject')->with('Fail', 'An error occured');
        }
    }
    function DeleteProject(project $project)
    {
        if (!is_null($project)) {
            $delete = $project->delete();
            if ($delete) {
                return redirect('/AdminProject')->with('success', 'Project deleted Sucessfully');
            } else {
                return redirect('/AdminProject')->with('Fail', 'An error occured');
            }
        }
    }
}
