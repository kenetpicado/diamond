@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <x-heading label="Users"></x-heading>

    <x-form action="users.store" cancel="users.index">
        <x-input name="name"></x-input>
        <x-input name="email"></x-input>
        <hr>
        <x-input name="dollar_price" label="Dollar Price" type="number"></x-input>
        <x-input name="commission" type="number"></x-input>

        <h6>Select Roles</h6>
        @foreach ($roles as $key => $role)
            <div class="form-check mb-1 @error('roles') is-invalid @enderror">
                <input name="roles[]" class="form-check-input" type="checkbox" value="{{ $role->name }}"
                    id="defaultCheck1">
                <label class="form-check-label">
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
        @error('roles')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </x-form>
@endsection
