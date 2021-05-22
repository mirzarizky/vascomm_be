<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">


            <div class="my-10 space-y-2 lg:space-x-5 lg:space-y-0 lg:inline-flex">
                <div class="w-full lg:w-1/4">
                    <div class="w-full p-2 bg-white rounded lg:w-64">
                        <div class="pl-1 mb-3 font-bold">Categories ({{ $categories->count() }})</div>
                        <div class="flex flex-col space-y-1">
                            @foreach ($categories as $category)
                                <a href="{{ url('/?category=') . $category->id }}"
                                    class="capitalize rounded py-1 pl-2 hover:bg-gray-100 transition duration-150 ease-in-out {{ $categoryId ? ($categoryId == $category->id ? 'font-bold bg-gray-100' : '') : '' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-3/4">
                    <div class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($products as $product)
                            <div class="bg-white rounded shadow-sm">
                                <div class="aspect-w-4 aspect-h-4">
                                    <img class="object-contain p-2 rounded"
                                        src="{{ $product->getFirstMediaUrl('products') }}"
                                        alt="{{ $product->title }}">
                                </div>
                                <div class="flex flex-col p-2 space-y-2">
                                    <div class="line-clamp-1" title="{{ $product->title }}">
                                        <div class="text-sm">{{ $product->title }}</div>
                                    </div>
                                    <div class="text-lg font-bold">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <x-slot name="scripts">
        <script>


        </script>
    </x-slot> --}}
</x-app-layout>
