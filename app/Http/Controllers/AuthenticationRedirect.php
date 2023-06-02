<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\payment;
use App\Models\project;
use App\Models\team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticationRedirect extends Controller
{
    function Authentication()
    {
        if (Auth::check()) {
            if (Auth::User()->role == 0) {
                $projects = project::paginate(3);
                $donorCount = payment::all()->count();
                $payments = payment::all();
        return view('user.index',compact('projects','donorCount','payments'));
            } else {
                $users = User::paginate(5);
                $userCount = User::all()->count();
                $eventCount = event::all()->count();
                $projectCount = project::all()->count();
                $teamCount = team::all()->count();
                $donorCount = payment::all()->count();
                $payments = payment::all();
                return view('admin.dash', compact('users', 'userCount', 'eventCount', 'projectCount','teamCount','donorCount','payments'));
            }
        } else {
            return redirect('/login');
        }
    }
}
