@extends('dashboard.layout')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">Contact information</div>
        <div class="card-body">
            <form
                    action="{{ route('profile.update') }}"
                    method="POST"
            >
                @csrf

                <x-input-field name="first_name" label="First Name" oldValue="{{ auth()->user()->first_name }}"/>
                <x-input-field name="last_name" label="Last Name" oldValue="{{ auth()->user()->last_name }}"/>
                <x-input-field name="address" label="Address" oldValue="{{ auth()->user()->address }}"/>
                <x-input-field name="phone_number" label="Phone Number" oldValue="{{ auth()->user()->phone_number }}"/>

                <button
                        class="btn btn-primary mt-3"
                        type="submit"
                >
                    Save
                </button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">Change password</div>
        <div class="card-body">
            <form
                    action="{{ route('profile.changePassword') }}"
                    method="POST"
            >
                @csrf

                <x-input-field name="old_password" label="Old Password"/>
                <x-input-field name="new_password" label="New Password"/>
                <x-input-field name="new_password_confirmation" label="Confirm New Password"/>

                <button
                        class="btn btn-primary mt-3"
                        type="submit"
                >
                    Save
                </button>
            </form>
        </div>
    </div>

@endsection



