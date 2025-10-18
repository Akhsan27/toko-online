<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\CartItem;
use App\Models\Promos;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        $user = Auth::user();

        $cart = Cart::firstOrCreate(
            [
                'user_id' => $user->id
            ]
        );

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->first();

        if ($item) {
            $item->quantity += $request->input('quantity', 1);
            $item->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $request->input('quantity', 1),
            ]);
        }
        $cart->load('items.product');
        $totalPrice = $cart->items->sum(fn($i) => $i->quantity * $i->product->price);
        $totalQuantity = $cart->items->sum('quantity');

        
       return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');

    }

    public function update(Request $request, $itemId)
    {
        $item = CartItem::findOrFail($itemId);
        $newQty = $request->input('quantity', $item->quantity);
        if ($newQty < 1) {
            $item->delete();
        } else {
            $item->quantity = $newQty;
            $item->save();
        }
        return redirect()->back()->with('success');
    }
    public function remove($itemId)
    {
        $item = CartItem::findOrFail($itemId);

        $item->delete();

        return redirect()->back()->with('success', 'produk berhasil di hapus');
    }

    public function index(Request $request)
    {

        $cart = Cart::with('items.product')
            ->where('user_id', Auth::id())
            ->first();

        $totalPrice = 0;

        if ($cart && $cart->items) {
            $totalPrice = $cart->items->sum(fn($item) => $item->product->price * $item->quantity);
        }

        // setelah di-forget, discount otomatis 0
        $discountData = session('cart_discount');
        $discount = is_array($discountData) && isset($discoountData['value'])
            ? $discountData['value']
            : 0;

        $totalBelanja = max(0, $totalPrice - $discount);
        return view('user.keranjang', compact('cart', 'totalPrice', 'totalBelanja', 'discount'));
    }


    public function getTotals()
    {
        $user = Auth::user();
        $cart = Cart::with('items.product')
            ->where('user_id', $user->id)
            ->first();

        $totalPrice = 0;
        $totalQuantity = 0;

        if ($cart && $cart->items) {
            foreach ($cart->items as $item) {
                $totalQuantity += $item->quantity;
                $totalPrice += $item->quantity * $item->product->price;
            }
        }

        // hitung diskon dari session (jika ada)
        $discountData = session('cart_discount');
        $discount = is_array($discountData) && isset($discountData['value'])
            ? $discountData['value']
            : 0;

        $totalBelanja = max(0, $totalPrice - $discount);

        return response()->json([
            'totalPrice' => $totalPrice,
            'totalQuantity' => $totalQuantity,
            'totalBelanja' => $totalBelanja,
        ]);
    }


    public function diskon(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();
        if (!$cart) {
            return response()->json(['success' => false, 'message' => 'Keranjang tidak ditemukan']);
        }

        $promoCode = $request->input('promo_code');
        if (empty($promoCode)) {
            return response()->json(['success' => false, 'message' => 'Kode promo diperlukan']);
        }

        $subtotal = $cart->items->sum(fn($item) => $item->quantity * $item->product->price);

        $result = Promos::getDiscountForCode($promoCode, $subtotal);
        if (!$result['valid']) {
            return response()->json(['success' => false, 'message' => $result['message']]);
        }

        $discountValue = $result['discountValue'];
        $promo = $result['promo'];

        // simpan di session dengan struktur yang konsisten
        Session::put('cart_discount', [
            'value' => $discountValue,
            'code' => $promoCode,
        ]);

        // update usage
        $promo->increment('usage_count');

        return response()->json([
            'success' => true,
            'message' => $result['message'],
            'discountValue' => $discountValue,
            'finalTotal' => max(0, $subtotal - $discountValue),
        ]);
    }

    public function totals()
    {
        $totalPrice = CartItem::sum('price');
        $totalQuantity = CartItem::sum('quantity');
        $totalBelanja = CartItem::sum(DB::raw('price * quantity'));

        return response()->json([
            'totalPrice' => $totalPrice,
            'totalQuantity' => $totalQuantity,
            'totalBelanja' => $totalBelanja,
        ]);
    }
}
