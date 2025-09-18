use App\Models\Order;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

public function purchase(Request $request)
{
    $productsInSession = $request->session()->get('products');
    if (!$productsInSession || count($productsInSession) === 0) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
    }

    // Hitung total
    $productsInCart = \App\Models\Product::findMany(array_keys($productsInSession));
    $total = \App\Models\Product::sumPricesByQuantities($productsInCart, $productsInSession);

    // Simpan Order
    $order = new Order();
    $order->setTotal($total);
    $order->setUserId(Auth::id());
    $order->save();

    // Simpan Items
    foreach ($productsInCart as $product) {
        $item = new Item();
        $item->setQuantity($productsInSession[$product->getId()]);
        $item->setPrice($product->getPrice());
        $item->setProductId($product->getId());
        $item->setOrderId($order->getId());
        $item->save();
    }

    // Hapus cart setelah purchase
    $request->session()->forget('products');

    // Kirim data ke view
    $viewData = [];
    $viewData["title"] = "Purchase - Online Store";
    $viewData["subtitle"] = "Purchase Completed";
    $viewData["order"] = $order;

    return view('cart.purchase')->with("viewData", $viewData);
}
