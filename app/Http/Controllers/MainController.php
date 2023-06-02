<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\image;
use App\Models\event;
use App\Models\payment;
use App\Models\project;
use App\Models\team;

class MainController extends Controller
{
    function index()
    {
        $projects = project::paginate(6);
        $payments = payment::all();
        return view('user.index', compact('projects','payments'));
    }
    function about()
    {
        $members = team::paginate(6);
        return view('user.about', compact('members'));
    }
    function project()
    {
        $projects = project::paginate(6);
        $payments = payment::all();
        return view('user.project', compact('projects', 'payments'));
    }
    function event()
    {
        // $AllEvents = event::all();
        $AllEvents = event::paginate(3);
        $data = compact('AllEvents');
        return view('user.event')->with($data);
    }
    function gallery()
    {
        $AllImage = image::all();


        $data = compact('AllImage');
        return view('user.gallery')->with($data);
    }
    function contact()
    {
        return view('user.contact');
    }
    function success()
    {
        return view('user.success');
    }


    // payment
    public function payonline(Request $request, $id)
    {
        $request->validate([

            'amount' => 'required',
            // 'payProject' => 'required ',


        ]);
        $amount = $request->amount;
        $payProject = project::find($id);

        return view('user.payment', compact('amount', 'payProject'));
        // return view('user.payment');
    }
    function projectDetail($id)
    {
        $projectDetail = project::find($id);
        return view('user.project_detail', compact('projectDetail'));
    }
}
