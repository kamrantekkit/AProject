<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EditorController extends Controller
{

    protected function validator(array $data) {
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'phase' => ['required', 'in:design,development,testing,deployment,complete'],
            'start_date' => ['required', 'date', 'after:today'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'description' => ['required', 'string']
        ]);

        return $validator;
    }

    protected function register(Request $request)
    {
        $data = $request->all();
        $userid = Auth::id();

        $validator = $this->validator($data);

        if (!$userid) {
            return;
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Project::create([
            'title' => $data['title'],
            'phase' => $data['phase'],
            'start_date' => date('Y-m-d', strtotime($data['start_date'])),
            'end_date' => date('Y-m-d', strtotime($data['end_date'])),
            'description' => $data['description'],
            'uid' => $userid
        ]);

        return app(DashBoardController::class)->index();
    }

    protected function getProject($pid)
    {
        $project = Project::find($pid);
        if ($project == null || Auth::id() != $project->uid) {
            return app(DashBoardController::class)->index();
        }
        return view("editor", ["project" => $project]);
    }

    protected function updateProject(Request $request, $pid)
    {
        $project = Project::find($pid);
        $validator = $this->validator($request->all());

        if ($project == null || Auth::id() != $project->uid) {
            return view("dashboard");
        }
        Log::info("Project updated:", $request->toArray());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->start_date = $request->input('start_date');
        $project->end_date = $request->input('end_date');
        $project->phase = $request->input('phase');
        $project->save();
        return app(DashBoardController::class)->index();
    }
}
