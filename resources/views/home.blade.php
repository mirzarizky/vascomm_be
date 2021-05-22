<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>

            <div class="inline-flex my-10 space-x-5">
                <div class="w-1/4 min-w-max">
                    <div class="w-64 p-2 bg-white rounded">
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
                <div class="3/4">
                    <div class="grid grid-cols-3 gap-3">
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

</x-app-layout>
