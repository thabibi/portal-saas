<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                Select Business
            </h2>
            <span class="text-sm text-gray-500">{{ count($businesses) }} businesses available</span>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="text-center mb-10">
                <h3 class="text-3xl font-bold text-gray-900 mb-2">Choose Your Business</h3>
                <p class="text-gray-600 max-w-2xl mx-auto">Select a business to manage and access your dashboard. Each business has its own settings and data.</p>
            </div>

            <!-- Grid Container -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                @foreach($businesses as $business)
                <div class="group relative bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden border border-gray-100">
                    
                    <!-- Decorative Top Bar -->
                    <div class="h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
                    
                    <div class="p-6">
                        <!-- Business Icon & Name -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center text-2xl shadow-inner">
                                    {{ substr($business->name, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-800 group-hover:text-indigo-600 transition-colors line-clamp-1">
                                        {{ $business->name }}
                                    </h4>
                                    <span class="text-xs font-medium text-gray-400 uppercase tracking-wider">Business</span>
                                </div>
                            </div>
                            
                            <!-- Role Badge -->
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $business->pivot->role === 'owner' ? 'bg-purple-100 text-purple-800' : 
                                   ($business->pivot->role === 'admin' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                                {{ ucfirst($business->pivot->role) }}
                            </span>
                        </div>

                        <!-- Stats or Info (Optional) -->
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Active</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Verified</span>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <form method="POST" action="/select-business/{{ $business->id }}">
                            @csrf
                            <button type="submit" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                <span class="relative z-10">Enter Business</span>
                                <svg class="w-4 h-4 relative z-10 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></div>
                            </button>
                        </form>
                    </div>

                    <!-- Hover Effect Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-indigo-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                </div>
                @endforeach

            </div>

            <!-- Empty State (if needed) -->
            @if(count($businesses) === 0)
            <div class="text-center py-20">
                <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-1">No businesses found</h3>
                <p class="text-gray-500">You don't have access to any businesses yet.</p>
            </div>
            @endif

        </div>
    </div>

</x-app-layout>