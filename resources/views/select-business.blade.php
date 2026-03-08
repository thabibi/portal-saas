<x-app-layout>

    <h2 class="text-xl font-bold mb-4">
        Pilih Business
    </h2>

    <ul>
        @foreach($businesses as $business)

            <li class="mb-2">

                <a href="{{ route('business.switch', $business->id) }}">
                    {{ $business->name }} 
                </a>

            </li>

        @endforeach
    </ul>

</x-app-layout>