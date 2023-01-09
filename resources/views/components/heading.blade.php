@props(['label', 'route', 'btn' => 'Create'])

<div class="d-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800">{{$label}}</h1>

    @isset($route)
        <a href="{{ route($route) }}"
            class="btn btn-sm btn-primary shadow-sm">{{ $btn }}</a>
    @endisset
    @isset($slot)
        {{ $slot }}
    @endisset
</div>
