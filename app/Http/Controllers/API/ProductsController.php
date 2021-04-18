<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
       $all_products = Product::limit(6)->get();

       $data = [];
        foreach ($all_products as $product) {
            $data[] = [
                'name' => $product->name,
                'brand' => $product->brand->name,
                'type' => $product->type->name,
                'category' => $product->category->name
            ];
        }


        return response()->json([ // restituisce un json con i vari prodotti
            'success' => true,
            'results' => $data
        ]);

    }
}
