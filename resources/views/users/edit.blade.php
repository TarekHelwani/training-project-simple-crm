@extends('dashboard.layout')

@section('content')
    <div class="card">
        <div class="card-header">Edit user</div>

        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <x-input-field name="first_name" label="First Name" oldValue="{{ old('first_name', $user->first_name) }}"/>
                <x-input-field name="last_name" label="Last Name" oldValue="{{ old('last_name', $user->last_name) }}"/>
                <x-input-field name="email" label="Email" oldValue="{{ old('email', $user->email) }}"/>
                <div class="form-group">
                    <label
                            for="password"
                            class="required"
                    >Password</label>
                    <input
                            type="password"
                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} my-2 border border-light"
                            name="password"
                            id="password"
                            value="{{ old('password') }}"
                            required
                    >
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label
                            for="password_confirmation"
                            class="required"
                    >Password Confirm</label>
                    <input
                            type="password"
                            class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }} my-2 border border-light"
                            name="password_confirmation"
                            id="password_confirmation"
                            value="{{ old('password_confirmation') }}"
                            required
                    >
                    @if($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @endif
                    <span class="help-block"></span>
                </div>
                <x-input-field name="address" label="Address" oldValue="{{ old('address', $user->address) }}"/>
                <x-input-field name="phone_number" label="Phone Number" oldValue="{{ old('phone_number', $user->phone_number) }}"/>
                <div class="form-group">
                    <button class="btn btn-primary mt-4" type="submit">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
