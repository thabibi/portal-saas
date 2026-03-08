<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Select Business
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-bold mb-6">
                    Choose your business
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                    @foreach($businesses as $business)
                        <div class="border rounded-lg p-5 hover:shadow-lg transition-shadow duration-300">
                            <form method="GET" action="{{route('business.switch',$business)}}">
                                <button type="submit" class="w-full text-left">
                                    <h4 class="text-lg font-semibold text-gray-800 flex items-center gap-2 mb-2">
                                        🏪 {{ $business->name }}
                                    </h4>

                                    <p class="text-sm text-gray-500 mb-4">
                                        Role: {{ $business->pivot->role }}
                                    </p>

                                    <span class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-200">
                                        Enter Business
                                    </span>
                                </button>
                            </form>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>

</x-app-layout>