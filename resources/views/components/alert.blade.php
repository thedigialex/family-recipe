@if ($message = Session::get($type))
    <div class="alert alert-{{ $type }} mb-4">
        {{ $message }}
    </div>
@endif
