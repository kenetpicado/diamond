@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <x-heading label="Alerts"></x-heading>

    <p class="mb-4">
        Notificaciones de envio y pagos de solicitudes.
    </p>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-4">
            @foreach ($alerts as $alert)
            <div class="card border-left-primary shadow-sm my-3">
                <div class="card-body p-2">
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <div class="icon-circle bg-{{ $alert->type }}">
                                @php
                                echo $alert->icon;
                                @endphp
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">{{ $alert->created_at->diffForHumans() }}</div>
                            {{ $alert->message }}
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
         </div>
    </div>


@endsection
