@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <x-heading label="Earnings"></x-heading>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earning</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                C$ {{ $earnings->sum('total_earning') }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-table>
        @slot('header')
            <th>Player ID</th>
            <th>Earning</th>
            <th>Amount</th>
            <th>Total Earning</th>
        @endslot
        @forelse ($earnings as $earning)
            <tr>
                <td data-title="ID">
                    {{ $earning->player_id }}
                    <br>
                    <small class="text-secondary">
                        {{ $earning->player_name ?? 'No name' }}
                    </small>
                </td>
                <td data-title="Earning ">
                    C$ {{ $earning->earning }}
                </td>
                <td data-title="Amount ">$ {{ $earning->amount }}</td>
                <td data-title="Total " @class(['font-weight-bold', 'text-danger' => $earning->earning <= 0])>
                    C$ {{ $earning->total_earning }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No data</td>
            </tr>
        @endforelse
    </x-table>
@endsection
