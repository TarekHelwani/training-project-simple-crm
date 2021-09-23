<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Mail\TaskAssgined;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskAssigned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['user', 'client', 'project'])->FilterStatus(request('status'))->paginate(20);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::all('id', 'first_name', 'last_name');
        $clients = Client::all()->pluck('company_name', 'id');
        $projects = Project::all()->pluck('title', 'id');

        return view('tasks.create', compact( 'users', 'clients', 'projects'));
    }

    public function store(CreateTaskRequest $request)
    {
        $task = Task::create($request->validated());

        $user = User::find($request->user_id);

        $user->notify(new TaskAssigned($task));

        Mail::to($user->email)->send(new TaskAssgined($task));

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
       $task->load('user', 'client');

        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $users = User::all('id', 'first_name', 'last_name');
        $clients = Client::all()->pluck('company_name', 'id');
        $projects = Project::all()->pluck('title', 'id');

        return view('tasks.edit', compact('task', 'users', 'clients', 'projects'));
    }

    public function update(EditTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        try {
            $task->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if($e->getCode() === '23000') {
                return redirect()->back()->with('status', 'Task belongs to project. Cannot delete.');
            }
        }

        return redirect()->route('tasks.index');
    }
}
