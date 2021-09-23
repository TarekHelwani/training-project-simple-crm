@extends('dashboard.layout')

@section('content')
    <div
            style="margin-bottom: 10px"
            class="row"
    >
        <div class="col-lg-12">
            <a
                    href="{{ route('projects.create') }}"
                    class="btn btn-success text-white"
            >Create project
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Projects list
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
                <form
                        action="{{ route('projects.index') }}"
                        method="GET"
                >
                    <div class="form-group row">
                        <label
                                for="status"
                                class="col-form-label"
                        >Status:</label>
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
                @foreach($projects as $project)
                    <tr>

                        <td>
                            <a
                                    style="text-decoration: none"
                                    href="{{ route('projects.show', $project) }}"
                            >{{ $project->title }}</a>
                        </td>
                        <td>{{ $project->user->first_name . ' ' . $project->user->last_name }}</td>
                        <td>{{ $project->client->company_name }}</td>
                        <td>{{ $project->deadline }}</td>
                        <td>{{ $project->status }}</td>
                        <td>
                            <a
                                    class="btn btn-sm btn-info text-white"
                                    href="{{ route('projects.edit', $project) }}"
                            >
                                Edit
                            </a>
                        </td>
                        @can('delete')
                            <td>
                                <form
                                        action="{{ route('projects.destroy', $project) }}"
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

            {{ $projects->withQueryString()->links() }}
        </div>

    </div>

@endsection