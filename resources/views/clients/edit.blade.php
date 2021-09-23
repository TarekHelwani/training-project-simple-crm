@extends('dashboard.layout')

@section('content')
    <form action="{{ route('clients.update', $client) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card m-4">
            <div class="card-header">
                Contact information
            </div>
            <div class="card-body">
                <x-input-field name="contact_name" label="Name" oldValue="{{ $client->contact_name }}"/>
                <x-input-field name="contact_email" label="Email" oldValue="{{ $client->contact_email }}"/>
                <x-input-field name="contact_phone_number" label="Phone Number" oldValue="{{ $client->contact_phone_number }}"/>
            </div>
        </div>

        <div class="card m-4">
            <div class="card-header">
                Company information
            </div>
            <div class="card-body">
                <x-input-field name="company_name" label="Company name" oldValue="{{ $client->company_name }}"/>
                <x-input-field name="company_vat" label="Company vat" oldValue="{{ $client->company_vat }}"/>
                <x-input-field name="company_address" label="Company address" oldValue="{{ $client->company_address }}"/>
                <x-input-field name="company_city" label="Company city" oldValue="{{ $client->company_city }}"/>
                <x-input-field name="company_zip" label="Company zip" oldValue="{{ $client->company_zip }}"/>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary" type="submit">
                    Save
                </button>
            </div>
        </div>

    </form>
@endsection