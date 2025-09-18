<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
//     public static $products = [
// ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "image" => "game.png", "price"=>"1000"],
// ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "image" => "safe.png", "price"=>"999"],
// ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "image" => "submarine.png", "price"=>"30"],
// ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "image" => "game.png", "price"=>"100"]
// ];

    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = Product::all();

        return view('product.index')->with("viewData", $viewData);
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        // Ambil product dari database, otomatis 404 kalau tidak ada
        $product = Product::findOrFail($id);

        $viewData = [];
        $viewData["title"] = $product->getName() . " - Online Store";
        $viewData["subtitle"] = $product->getName() . " - Product information";
        $viewData["product"] = $product;

        return view('product.show')->with("viewData", $viewData);
    }
}
