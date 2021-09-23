@extends('dashboard.layout')

@section('content')
    <div class="card">
        <div class="card-header">Accept terms</div>

        <div class="card-body">
            Hey, no terms here :) just check the checkbox to proceed!

            <form
                    action="{{ route('terms.store') }}"
                    method="POST"
                    class="mt-4"
            >
                @csrf

            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input {{ $errors->has('accept_terms') ? 'is-invalid' : '' }}" type="checkbox" id="accept_terms" name="accept_terms" value="1">
                    <label class="form-check-label" for="accept_terms">Accept terms</label>
                </div>
                @if($errors->has('accept_terms'))
                    <div class="invalid-feedback" style="display: block">
                        {{ $errors->first('accept_terms') }}
                    </div>
                @endif
                <div>
                    <button
                            class="btn btn-primary mt-4"
                            type="submit"
                    >
                        Save
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection