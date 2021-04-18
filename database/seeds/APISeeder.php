<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Brand;
use App\Category;
use App\Type;
use App\Product;
use App\Tag;

class APISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('http://makeup-api.herokuapp.com/api/v1/products.json');

        $brands = [];
        $categories = [];
        $types = [];
        $tags = [];
        $colors = [];

        foreach ($response->json() as $product) {
            if ($product['brand'] != null && $product['brand'] != "" && (in_array($product['brand'], $brands) === false)) {
                $brands[] = $product['brand'];
            }

            if ($product['category'] != null && $product['category'] != "" && (in_array($product['category'], $categories) === false)) {
                $categories[] = $product['category'];
            }

            if ($product['product_type'] != null && $product['product_type'] != "" && (in_array($product['product_type'], $types) === false)) {
                $types[] = $product['product_type'];
            }

            if ($product['tag_list'] != null && $product['tag_list'] != "") {
                 foreach($product['tag_list'] as $tag) {
                     if(in_array($tag, $tags) === false){
                         $tags[] = $tag;
                     }
                 }
            }

            if ($product['product_colors'] != null && $product['product_colors'] != "" && (in_array($product['product_colors'], $colors) === false)) {
                foreach ($product['product_colors'] as $color) {
                    $color['product_name'] = $product['name'];
                    $colors[] = $color;
                }
            }


        }

        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                'name' => $brand
            ]);
        }

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }

        foreach ($types as $type) {
            DB::table('types')->insert([
                'name' => $type
            ]);
        }

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag
            ]);
        }


        foreach ($response->json() as $product)  {
            $name = $product['name'];
            if ($product['price'] == null) {
                $price = 0;
            } else {
                $price = $product['price'];
            }

            $image = $product['image_link'];

            if ($product['description'] == null) {
                $description = "n.d.";
            } else {
                $description = $product['description'];
            }

            $brand = $product['brand'];
            if($brand == null) {
                $brand_id = Brand::all()->first()['id'];
            } else {
                $brand_id = Brand::where('name', $product['brand'])->first()['id'];
            }

            $category = Category::where('name', $product['category'])->first();
            $category_id = null;
            if ($category != null) {
                $category_id = $category['id'];
            }
            $product_type_id = Type::where('name', $product['product_type'])->first()['id'];


             {
                DB::table('products')->insert([
                    'name' => $name,
                    'price' => $price,
                    'image' => $image,
                    'description' => $description,
                    'brand_id' => $brand_id,
                    'category_id' => $category_id,
                    'type_id' => $product_type_id,
                ]);
            }

        }

        foreach ($colors as $color) {
            DB::table('colors')->insert([
                'name' => $color['colour_name'],
                'hex_code' => $color['hex_value'],
                'product_id' => Product::where('name', $color['product_name'])->first()['id']
            ]);
        }


        //product_tag table
        foreach ($response->json() as $product){
            $product_id = Product::where('name', $product['name'])->first()['id'];

            foreach ($product['tag_list'] as $tag) {
                if ($tag != null && $tag != "") {
                    $tag_id = Tag::where('name', $tag)->first()['id'];

                    DB::table('product_tag')->insert([
                        'product_id' => $product_id,
                        'tag_id' => $tag_id
                    ]);
                }
            }
        }

    }
}
