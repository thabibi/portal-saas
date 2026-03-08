<x-app-layout>
<div class="max-w-7xl mx-auto py-6 px-4 rounded-base border border-default">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-extrabold text-gray-900">
            Products
        </h2>

        <a href="{{ route('products.create') }}"
           class="bg-blue-600 text-white px-5 py-2 rounded-md shadow hover:bg-blue-700 transition duration-300">
           + Add Product
        </a>
    </div>

    {{-- SEARCH --}}
    <form method="GET" class="mb-6 flex space-x-2">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search product..."
            class="border border-gray-300 rounded-md px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >

        <button
            type="submit"
            class="bg-gray-800 text-white px-5 py-2 rounded-md shadow hover:bg-gray-900 transition duration-300"
        >
            Search
        </button>

    </form>
<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-lg text-left rtl:text-right text-body">
        <thead class="text-slg text-body bg-neutral-secondary-medium border-b border-default-medium">
            <tr>
                <th scope="col" class="px-6 py-3 font-mediumtext-black px-5 py-2 font-medium rounded-md shadow">
                   ID
                </th>
                <th scope="col" class="text-black px-5 py-2 font-medium rounded-md shadow">
                    <div class="flex items-center">
                        Name
                        <a href="#">
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/></svg>
                        </a>
                    </div>
                </th>
                <th scope="col" class="text-black px-5 py-2 font-medium rounded-md shadow">
                    <div class="flex items-center">
                        Price
                        <a href="#">
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/></svg>
                        </a>
                    </div>
                </th>
                <th scope="col" class="text-black px-5 py-2 font-medium rounded-md shadow">
                    <div class="flex items-center">
                        Stock
                        <a href="#">
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/></svg>
                        </a>
                    </div>
                </th>
                <th scope="col" class="text-black px-5 py-2 font-medium rounded-md shadow">
                    <div class="flex items-center">
                        Aksi
                        
                    </div>
                </th>
                
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
             @forelse($products as $product)
            <tr class="bg-neutral-primary-soft border-b  border-default">
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{ $product->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $product->name }}
                </td>
                <td class="px-6 py-4">
                    Rp {{ number_format($product->price) }}
                </td>
                <td class="px-6 py-4">
                    {{ $product->stock }}
                </td>
                
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
    <div class="flex items-center justify-end space-x-3">
        {{-- Edit Link --}}
        <a href="{{ route('products.edit', $product) }}"
           class="bg-red-600 text-white px-5 py-2 rounded-md shadow hover:bg-red-700 transition duration-300"
           title="Edit Product">
            Edit
        </a>

        {{-- Separator --}}
        <span class="text-gray-300">|</span>

        {{-- Delete Form --}}
        <form
            action="{{ route('products.destroy', $product) }}"
            method="POST"
            class="inline"
            onsubmit="return confirm('Are you sure you want to delete this product?');"
        >
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded-md shadow hover:bg-blue-700 transition duration-300"
                title="Delete Product"
            >
                Delete
            </button>
        </form>
    </div>
</td>
            </tr>
                            @empty
            <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">
                        No products found
                    </td>
                </tr>
                @endforelse
        </tbody>
    </table>
</div>
 {{-- PAGINATION --}}
    <div class="mt-6">
        {{ $products->links() }}
    </div>

</div>
</x-app-layout>