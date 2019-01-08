@foreach (['danger', 'warning', 'success', 'info'] as $key)
    @if(Session::has($key))
        <div class="alert alert-{{ $key }}">
            {{ Session::get($key) }}
        </div>
    @endif
@endforeach