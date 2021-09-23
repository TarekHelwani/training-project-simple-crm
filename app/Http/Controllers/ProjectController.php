<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\EditProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectAssigned;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['user', 'client'])->filterStatus(request('status'))->paginate(20);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::all('id', 'first_name', 'last_name');
        $clients = Client::all()->pluck('company_name', 'id');

        return view('projects.create', compact( 'users', 'clients'));
    }

    public function store(CreateProjectRequest $request)
    {
        $project = Project::create($request->validated());

        $user = User::find($request->user_id);

        $user->notify(new ProjectAssigned($project));

        return redirect()->route('projects.index');
    }


    public function show(Project $project)
    {
        $project->load('tasks', 'user', 'client');

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $users = User::all('id', 'first_name', 'last_name');
        $clients = Client::all()->pluck('company_name', 'id');

        return view('projects.edit', compact('project', 'users', 'clients'));
    }

    public function update(EditProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        try {
            $project->delete();
        } catch (QueryException $e) {
            if($e->getCode() === '23000') {
                return redirect()->back()->with('status', 'Project belong to task. Cannot delete.');
            }
        }

        return redirect()->route('projects.index');
    }
}
