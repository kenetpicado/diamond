@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <x-heading label="Requests"></x-heading>

    <x-form action="requests.store" cancel="requests.index">
        <x-input name="player_id" label="ID" type="number"></x-input>
        <x-input name="player_name" label="Name (Optional)"></x-input>
        <x-input name="amount" type="number"></x-input>

        @role('admin')
            <x-select name="user_id" label="Assign to User">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </x-select>
            <hr>
            <x-checkbox name="is_sent" label="Sent"></x-checkbox>
            <x-checkbox name="is_paid" label="Paid"></x-checkbox>
        @endrole
    </x-form>
@endsection
