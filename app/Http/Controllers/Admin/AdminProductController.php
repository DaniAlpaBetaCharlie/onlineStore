<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminProductController extends Controller
{
    public function store(Request $request)
{
    // 🔹 Validasi input dari form
    

    // 🔹 Membuat produk baru
    $newProduct = new Product();
    $newProduct->setName($request->input('name'));
    $newProduct->setDescription($request->input('description'));
    $newProduct->setPrice($request->input('price'));

    // Default image sementara
    $newProduct->setImage("game.png");

    // 🔹 Simpan ke database
    $newProduct->save();
    // Simpan produk dulu agar dapat ID
$newProduct->save();

if ($request->hasFile('image')) {
    $imageName = $newProduct->getId() . "." . $request->file('image')->extension();

    Storage::disk('public')->put(
        $imageName,
        file_get_contents($request->file('image')->getRealPath())
    );

    $newProduct->setImage($imageName);
    $newProduct->save(); // update dengan nama file
}

    // 🔹 Kembali ke halaman sebelumnya
    return back();
}
public function edit($id)
{
    $viewData = [];
    $viewData["title"]   = "Admin Page - Edit Product - Online Store";
    $viewData["product"] = Product::findOrFail($id);

    return view('admin.product.edit')->with("viewData", $viewData);
}

public function update(Request $request, $id)
{
    // 🔹 Validasi input
   

    // 🔹 Cari produk
    $product = Product::findOrFail($id);

    // 🔹 Update field
    $product->setName($request->input('name'));
    $product->setDescription($request->input('description'));
    $product->setPrice($request->input('price'));

    // 🔹 Upload gambar jika ada
    if ($request->hasFile('image')) {
        $imageName = $product->getId() . "." . $request->file('image')->extension();

        Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
        );

        $product->setImage($imageName);
    }

    // 🔹 Simpan perubahan
    $product->save();

    // 🔹 Redirect kembali ke daftar produk
    return redirect()->route('admin.product.index');
}

public function delete($id)
{
Product::destroy($id);
return back();
}
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();

        return view('admin.product.index')->with("viewData", $viewData);
    }
}
