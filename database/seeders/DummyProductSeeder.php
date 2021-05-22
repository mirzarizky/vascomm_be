<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DummyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Http::acceptJson()
            ->get('https://fakestoreapi.com/products')
            ->json();

        foreach ($products as $product) {
            $productCategory = ProductCategory::firstOrCreate(['name' => $product['category']]);

            tap(Product::firstOrCreate([
                'category_id' => $productCategory->id,
                'title' => $product['title'],
                'price' => $product['price'] * 15000, // to IDR
                'description' => $product['description']
            ]), function (Product $newProduct) use ($product) {
                $newProduct->addMediaFromUrl($product['image'])
                    ->toMediaCollection('products');
            });
        }
    }
}
