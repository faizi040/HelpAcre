<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\payment;
use App\Models\project;
use App\Models\team;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;           //using auth for authentication check

class AdminController extends Controller
{
    function dash()
    {
        if (Auth::User()->role == 0) {
            return back();
        }
        $users = User::paginate(5);
        $userCount = User::all()->count();
        $eventCount = event::all()->count();
        $projectCount = project::all()->count();
        $teamCount = team::all()->count();
        $donorCount = payment::all()->count();
        $payments = payment::all();
        return view('admin.dash', compact('users', 'userCount', 'eventCount','projectCount','teamCount','donorCount','payments'));
    }
    // updating single field without form data
    function role(User $user)
    {
        if ($user->role == 0) {
            $newRole = $user->update(['role' => 1]);

            if ($newRole) {

                return to_route('admin.dash')->with('success', 'Role Updated  Sucessfully');
            } else {
                return to_route('admin.dash')->with('Fail', 'An error occured');
            }
        }
        if ($user->role == 1) {
            if ($user->id == 2) {
                return to_route('admin.dash')->with('Fail','You cannot delete the main Admin');
            } else {


                $newRole = $user->update(['role' => 0]);
                if ($newRole) {

                    return to_route('admin.dash')->with('success', 'Role Updated  Sucessfully');
                } else {
                    return to_route('admin.dash')->with('Fail', 'An error occured');
                }
            }
        }
    }
}
