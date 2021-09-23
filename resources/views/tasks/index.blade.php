@extends('dashboard.layout')

@section('content')
    <div
            style="margin-bottom: 10px"
            class="row"
    >
        <div class="col-lg-12">
            <a
                    href="{{ route('tasks.create') }}"
                    class="btn btn-success text-white"
            >Create Task
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Tasks list
        </div>

        <div class="card-body">
            @if (session('status'))
                <div
                        class="alert alert-danger"
                        role="alert"
                >
                    {{ session('status') }}
                </div>
            @endif
            <div class="d-flex justify-content-end">
                <form action="{{ route('projects.index') }}" method="GET">
                    <div class="form-group row">
                        <label for="status" class="col-form-label">Status:</label>
                        <div class="col-sm-8">
                            <select
                                    name="status"
                                    id="status"
                                    class="form-control"
                                    onchange="this.form.submit()"
                            >
                                <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>All</option>
                                @foreach(\App\Models\Project::STATUS as $status)
                                    <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <hr class="solid">
            <table class="table table-responsive-sm table-striped">
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
                @foreach($tasks as $task)
                    <tr>
                        <td>
                            <a style="text-decoration: none" href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></td>
                        <td>{{ $task->user->first_name . ' ' . $task->user->last_name }}</td>
                        <td>{{ $task->client->company_name }}</td>
                        <td>{{ $task->deadline }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <a class="btn btn-sm btn-info text-white" href="{{ route('tasks.edit', $task) }}">
                                Edit
                            </a>
                        </td>
                        @can('delete')
                            <td>
                                <form
                                        action="{{ route('tasks.destroy', $task) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are your sure?');"
                                        style="display: inline-block;"
                                >
                                    @method('DELETE')
                                    <input
                                            type="hidden"
                                            name="_method"
                                            value="DELETE"
                                    >
                                    <input
                                            type="hidden"
                                            name="_token"
                                            value="{{ csrf_token() }}"
                                    >
                                    <input
                                            type="submit"
                                            class="btn btn-sm btn-danger text-white"
                                            value="Delete"
                                    >
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $tasks->withQueryString()->links() }}
        </div>

    </div>

@endsection