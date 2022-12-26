@props(['action', 'param' => '', 'method' => 'POST', 'cancel', 'btn' => 'Create'])

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $btn }}</h6>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form action="{{ route($action, $param) }}" method="{{ $method }}">
                    @csrf

                    {{ $slot }}

                    <div class="text-right">
                        <a href="{{ route($cancel) }}" class="btn btn-outline-primary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">{{ $btn }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
