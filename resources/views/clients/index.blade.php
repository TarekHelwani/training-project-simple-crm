@extends('dashboard.layout')

@section('content')
    <div
            style="margin-bottom: 10px"
            class="row"
    >
        <div class="col-lg-12">
            <a
                    href="{{ route('clients.create') }}"
                    class="btn btn-success text-white"
            >Create client
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Clients list
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
            <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>Company</th>
                    <th>VAT</th>
                    <th>Address</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->company_name }}</td>
                            <td>{{ $client->company_vat }}</td>
                            <td>{{ $client->company_address }}</td>
                            <td>
                                <a style="margin-right: 20px" class="btn btn-xs btn-info text-white" href="{{ route('clients.edit', $client) }}">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $clients->withQueryString()->links() }}
        </div>

    </div>

@endsection