@extends('dashboard.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: #FEFCFB;">Client</div>

                <div class="card-body d-flex justify-content-between">
                    <div>
                        <div class="text-primary">{{ $project->client->contact_name }}</div>
                        <p class="mb-0">{{ $project->client->contact_email }} </p>
                        <p>{{ $project->client->contact_phone_number }} </p>
                    </div>

                    <div>
                        <p class="mb-0">{{ $project->client->company_name }}</p>
                        <p class="mb-0">{{ $project->client->company_address }} </p>
                        <p class="mb-0">{{ $project->client->company_city }}, {{ $project->client->company_zip }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: #FEFCFB;">Assigned user</div>

                <div class="card-body">
                    <p class="mb-0">{{ $project->user->first_name . ' ' . $project->user->last_name }}</p>
                    <p class="mb-0">{{ $project->user->email }}</p>
                    <p class="mb-0">{{ $project->user->phone_number }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card border-top-primary">
                <div class="card-header" style="background-color: #FEFCFB;">
                    {{ $project->title }}
                </div>

                <div class="card-body">
                    <p>{{ $project->description }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4 border-top-danger">
            <div class="card border-top-primary">
                <div class="card-header" style="background-color: #FEFCFB;">Information</div>

                <div class="card-body">
                    <p class="mb-0">Deadline {{ $project->deadline }}</p>
                    <p class="mb-0">Created at {{ $project->created_at->format('M d, Y') }}</p>
                    <p class="mb-0">Status {{ ucfirst($project->status) }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card border-top-primary">
                <div class="card-header">Tasks</div>
                <div class="card-body">
                    @if($project->tasks->count())
                        <table class="table table-sm table-responsive-sm">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Assigned to</th>
                                <th>Client</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project->tasks as $task)
                                <tr>
                                    <td>
                                        <a style="text-decoration: none" href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
                                    </td>
                                    <td>{{ $task->user->first_name }}</td>
                                    <td>{{ $task->client->company_name }}</td>
                                    <td>{{ $task->deadline }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>
                                        <a
                                                class="btn btn-sm btn-info"
                                                href="{{ route('tasks.edit', $task) }}"
                                        >
                                            Edit
                                        </a>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div
                                class="alert alert-info"
                                role="alert"
                        >
                            No tasks added to this project.
                            <a href="{{ route('tasks.create') }}">Create task now.</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection