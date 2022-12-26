@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <x-heading label="Requests"></x-heading>

    <x-form action="requests.store" cancel="requests.index">
        <x-input name="player_id" label="ID" type="number"></x-input>
        <x-input name="player_name" label="Name (Optional)"></x-input>
        <x-input name="amount" type="number"></x-input>
    </x-form>
@endsection
