<x-app-layout>

<x-slot name="header">
<h2 class="text-xl font-semibold">
Products
</h2>
</x-slot>

<div class="p-6">

<a href="{{ route('products.create') }}"
class="bg-blue-600 text-white px-4 py-2 rounded">

Add Product

</a>

<table class="mt-4 w-full border">

<thead>

<tr class="bg-gray-100">
<th class="p-2">Name</th>
<th class="p-2">Price</th>
<th class="p-2">Stock</th>
</tr>

</thead>

<tbody>

@foreach($products as $product)

<tr class="border-b">

<td class="p-2">{{ $product->name }}</td>
<td class="p-2">{{ $product->price }}</td>
<td class="p-2">{{ $product->stock }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</x-app-layout>