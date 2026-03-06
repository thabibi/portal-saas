<h2>Pilih Bisnis</h2>

@foreach ($businesses as $business)

<form method="POST" action="/select-business/{{ $business->id }}">
    @csrf
    <button type="submit">
        {{ $business->name }}
    </button>
</form>

@endforeach