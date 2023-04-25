<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return view('projects', ["projects" => $projects]);
    }

    public function getProject($pid)
    {
        $project = Project::find($pid);
        if ($project == null ) {
            return $this::index();
        }
        $user = User::find($project->uid);
        if ($user == null ) {
            return $this::index();
        }
        return view('project', ["project" => $project, "user" => $user]);
    }
}
