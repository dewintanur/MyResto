<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $tableNumber = $request->query('meja');
        if ($tableNumber) {
            Session::put('table_number', $tableNumber);
        }

        $items = Item::where('is_active', 1)->orderBy('name', 'asc')->get();
        return view('customer.menu', compact('items'));
    }

    public function cart()
    {
        $cart = Session::get('cart', []);

        return view('customer.cart', compact('cart'));
    }

    public function addToCart(Request $request, $itemId)
    {
        $menuId = $request->query('menu_id');
        $menu = Item::find($itemId);
        if (!$menu) {
            return response()->json(['status' => 'error', 'message' => 'menu not found.']);
        }

        $cart = Session::get('cart');
        if (isset($cart[$menuId])) {
            $cart[$menuId]['qty'] += 1;
        } else {
            $cart[$menuId] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $menu->price,
                'img' => $menu->img,
                'qty' => 1,
            ];
        }

        Session::put('cart', $cart);

        return response()->json(['status' => 'success', 'message' => 'menu added to cart.', 'cart' => $cart]);
    }
}
