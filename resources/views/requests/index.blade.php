@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <x-heading label="Requests" route="requests.create"></x-heading>

    <p class="mb-4">
        Dollar: C$ {{ auth()->user()->dollar_price }}, Commission: C$ {{ auth()->user()->commission }}; Total: C$
        {{ auth()->user()->commission + auth()->user()->dollar_price }}
    </p>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Pay</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                C$ {{ number_format($requests->sum('total_pay')) }}
                                <small>(${{ $requests->sum('amount') }})</small>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Commission</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                C$ {{ $requests->sum('total_commission') }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $requests->where('is_sent', false)->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-table>
        @slot('header')
            <th>Player ID</th>
            <th>Amount</th>
            <th>Total Pay</th>
            <th>Commission</th>
            <th>Total Sent</th>
            <th>Status</th>
            <th>Actions</th>
        @endslot
        @forelse ($requests as $request)
            <tr>
                <td data-title="ID">
                    <label  class="text-primary">
                        {{ $request->player_id }}
                    </label>
                    <br>
                    <small class="text-secondary">
                        {{ $request->player_name ?? 'No name' }}
                    </small>
                </td>
                <td data-title="Amount ">$ {{ $request->amount }}</td>
                <td data-title="Pay ">C$ {{ $request->total_pay_format }}</td>
                <td data-title="Commission " class="text-success">C$ {{ $request->total_commission }}</td>
                <td data-title="Total " class="font-weight-bold">C$ {{ $request->total_sent_format }}</td>
                <td>
                    @if ($request->is_sent)
                        <i class="fas fa-fw fa-check text-success"></i>
                        Sent
                    @else
                        <i class="fas fa-fw fa-exclamation text-warning"></i>
                        Pending
                    @endif
                    <br>
                    <small>{{ $request->sent_at?->diffForHumans() }}</small>
                </td>
                <td data-title="Edit " class="text-center">
                    <a href="{{ route('requests.edit', $request->id) }}">
                        <i class="fas fa-fw fa-edit"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No data</td>
            </tr>
        @endforelse
    </x-table>
@endsection
