<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function purchase(Request $request)
{
    $productsInSession = $request->session()->get("products");

    if (!$productsInSession || count($productsInSession) === 0) {
        return redirect()->route('cart.index');
    }

    $user = Auth::user();

    DB::beginTransaction();
    try {
        // Buat order baru
        $order = new Order();
        $order->setUserId($user->getId());
        $order->setTotal(0); // sementara 0
        $order->save();

        $total = 0;
        $productsInCart = Product::findMany(array_keys($productsInSession));

        foreach ($productsInCart as $product) {
            $quantity = $productsInSession[$product->getId()];

            $item = new Item();
            $item->setQuantity($quantity);
            $item->setPrice($product->getPrice());
            $item->setProductId($product->getId());
            $item->setOrderId($order->getId());
            $item->save();

            $total += $product->getPrice() * $quantity;
        }

        // Update total order
        $order->setTotal($total);
        $order->save();

        // Update balance user
        $user->setBalance($user->getBalance() - $total);
        $user->save();

        // Kosongkan cart
        $request->session()->forget('products');

        DB::commit();

        // Data untuk view
        $viewData = [];
        $viewData["title"] = "Purchase - Online Store";
        $viewData["subtitle"] = "Purchase Status";
        $viewData["order"] = $order;

        return view('cart.purchase')->with("viewData", $viewData);

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('cart.index')->with('error', 'Purchase failed. Please try again.');
    }
}
    public function index(Request $request)
    {
        $productsInSession = $request->session()->get('products', []);
        $productsInCart = [];
        $total = 0;

        if (!empty($productsInSession)) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }

        $viewData = [
            'title'    => 'Cart - Online Store',
            'subtitle' => 'Shopping Cart',
            'total'    => $total,
            'products' => $productsInCart,
        ];

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id)
    {
        $products = $request->session()->get('products', []);
        $quantity = max(1, (int) $request->input('quantity', 1));

        $products[$id] = $quantity;

        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');

        return back();
    }
}
