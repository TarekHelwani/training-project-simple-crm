@extends('dashboard.layout')

@section('content')
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-header">
                Contact information
            </div>
            <div class="card-body">
                <x-input-field name="contact_name" label="Name"/>
                <x-input-field name="contact_email" label="Email"/>
                <x-input-field name="contact_phone_number" label="Phone Number"/>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                Company information
            </div>
            <div class="card-body">
                <x-input-field name="company_name" label="Company name"/>
                <x-input-field name="company_vat" label="Company vat"/>
                <x-input-field name="company_address" label="Company address"/>
                <x-input-field name="company_city" label="Company city"/>
                <x-input-field name="company_zip" label="Company zip"/>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary" type="submit">
                    Save
                </button>
            </div>
        </div>

    </form>
@endsection