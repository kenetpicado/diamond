@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <x-heading label="Requests"></x-heading>

    <x-form action="requests.update" :param="$request->id" cancel="requests.index" btn="Update">
        @method('PUT')
        <x-input :value="$request->player_id" name="player_id" label="ID" type="number"></x-input>
        <x-input :value="$request->player_name" name="player_name" label="Name (Optional)"></x-input>

        @if (!$request->is_sent)
            <x-input :value="$request->amount" name="amount" type="number"></x-input>
        @endif

        @role('admin')
            <hr>
            <x-checkbox name="is_sent" checkIf="{{ $request->is_sent }}" label="Sent"></x-checkbox>
            <x-checkbox name="is_paid" checkIf="{{ $request->is_paid }}" label="Paid"></x-checkbox>
        @endrole
    </x-form>
@endsection
