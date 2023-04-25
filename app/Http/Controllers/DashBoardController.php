<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashBoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Projects = Project::all();
        $userProjects = array();
        foreach ($Projects as $project) {
            if (Auth::id() == $project->uid) {
                $userProjects[] = $project;
            }
        }
        return view('dashboard', ["userProjects" => $userProjects]);
    }
}
