@extends('dashboard.layout')

@section('content')
    <div class="card">
        <div class="card-header">Create user</div>

        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <x-input-field name="first_name" label="First Name"/>
                <x-input-field name="last_name" label="Last Name"/>
                <x-input-field name="email" label="Email"/>
                <x-input-field name="password" label="Password" type="password"/>
                <x-input-field name="password_confirmation" label="Password Confirm" type="password"/>
                <x-input-field name="address" label="Address"/>
                <x-input-field name="phone_number" label="Phone Number"/>
                <div class="form-group">
                    <button class="btn btn-primary mt-4" type="submit">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
