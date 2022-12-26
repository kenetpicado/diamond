@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <x-heading label="Users" route="users.create"></x-heading>

    <x-table>
        @slot('header')
            <th>Name</th>
            <th>Email</th>
            <th>Dollar Price</th>
            <th>Commision</th>
            <th>Total</th>
            <th>Actions</th>
        @endslot
        @forelse ($users as $user)
            <tr>
                <td>
                    {{ $user->name }}
                    <br>
                    @foreach ($user->roles_array as $role)
                        <small class="text-primary">{{ $role }}</small>
                    @endforeach
                </td>
                <td class="text-primary">{{ $user->email }}</td>
                <td>C$ {{ $user->dollar_price }}</td>
                <td>C$ {{ $user->commission }}</td>
                <td>C$ {{ $user->dollar_total }}</td>
                <td class="text-center"><a href="{{ route('users.edit', $user->id) }}"><i class="fas fa-fw fa-edit"></i></a>
                </td>
            </tr>
        @empty
            <tr>
                <td>No data</td>
            </tr>
        @endforelse
    </x-table>
@endsection
